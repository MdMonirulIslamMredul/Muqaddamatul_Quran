<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\BannerAndTitle;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class NoticeFrontendController extends Controller
{
    /**
     * Display a listing of all active notices with filtering, search and pagination.
     */
    public function index(Request $request)
    {
        $query = Notice::active();

        // Filter by category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('notice_category', $request->category);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title_bn', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('title_ar', 'like', "%{$search}%")
                  ->orWhere('notice_no', 'like', "%{$search}%")
                  ->orWhere('short_des_bn', 'like', "%{$search}%")
                  ->orWhere('short_des', 'like', "%{$search}%");
            });
        }

        // Filter by Year
        if ($request->filled('year')) {
            $query->whereYear('publish_date', $request->year);
        }

        $notices = $query->orderBy('is_pinned', 'desc')
            ->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categoriesList = Notice::categoriesList();
        
        // Category counts for badges
        $categoryCounts = [];
        foreach ($categoriesList as $key => $catData) {
            $categoryCounts[$key] = Notice::active()->where('notice_category', $key)->count();
        }
        $totalActiveCount = Notice::active()->count();

        // Recent pinned/important notices
        $recentNotices = Notice::active()
            ->orderBy('is_pinned', 'desc')
            ->orderBy('publish_date', 'desc')
            ->take(5)
            ->get();

        $banner = BannerAndTitle::where('page', 'notice')
            ->orWhere('page', 'courses')
            ->latest()
            ->first();

        $availableYears = Notice::selectRaw('YEAR(publish_date) as year')
            ->whereNotNull('publish_date')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $departments = Department::where('status', 1)->get();

        return view('frontend.notice.index', compact(
            'notices',
            'categoriesList',
            'categoryCounts',
            'totalActiveCount',
            'recentNotices',
            'banner',
            'availableYears',
            'departments'
        ));
    }

    /**
     * Display the specified notice details page.
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);

        // Increment view count
        $notice->increment('views_count');

        $categoriesList = Notice::categoriesList();

        // Recent notices for sidebar
        $recentNotices = Notice::active()
            ->where('id', '!=', $notice->id)
            ->orderBy('is_pinned', 'desc')
            ->orderBy('publish_date', 'desc')
            ->take(5)
            ->get();

        $banner = BannerAndTitle::where('page', 'notice')
            ->orWhere('page', 'courses')
            ->latest()
            ->first();

        $departments = Department::where('status', 1)->get();

        return view('frontend.notice.show', compact(
            'notice',
            'categoriesList',
            'recentNotices',
            'banner',
            'departments'
        ));
    }

    /**
     * Download attached notice file.
     */
    public function download($id)
    {
        $notice = Notice::findOrFail($id);

        if (!$notice->pdf_file || !File::exists(public_path($notice->pdf_file))) {
            return back()->with('error', 'সংযুক্ত ফাইলটি পাওয়া যায়নি।');
        }

        $filePath = public_path($notice->pdf_file);
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $cleanTitle = preg_replace('/[^A-Za-z0-9_\-]/', '_', $notice->title ?: 'Notice_' . $notice->notice_no);
        $downloadName = $cleanTitle . '.' . $ext;

        return response()->download($filePath, $downloadName);
    }
}
