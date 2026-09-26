<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class NoticeController extends Controller
{
    /**
     * Display a listing of the notices.
     */
    public function index(Request $request)
    {
        $query = Notice::query();

        // Search by title, notice_no, description
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

        // Filter by category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('notice_category', $request->category);
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by pinned
        if ($request->filled('pinned') && $request->pinned !== '') {
            $query->where('is_pinned', $request->pinned);
        }

        // Filter by ticker
        if ($request->filled('ticker') && $request->ticker !== '') {
            $query->where('is_ticker', $request->ticker);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('publish_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('publish_date', '<=', $request->date_to);
        }

        $notices = $query->orderBy('is_pinned', 'desc')
            ->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        // Summary statistics
        $totalNotices   = Notice::count();
        $activeNotices  = Notice::where('status', 1)->count();
        $pinnedNotices  = Notice::where('is_pinned', 1)->count();
        $tickerNotices  = Notice::where('is_ticker', 1)->count();
        $categoriesList = Notice::categoriesList();

        return view('admin.notice.index', compact(
            'notices',
            'totalNotices',
            'activeNotices',
            'pinnedNotices',
            'tickerNotices',
            'categoriesList'
        ));
    }

    /**
     * Show the form for creating a new notice.
     */
    public function create()
    {
        $categoriesList = Notice::categoriesList();
        $nextNo = 'MQIA-NOT-' . date('Y') . '/' . str_pad((Notice::count() + 1), 2, '0', STR_PAD_LEFT);
        return view('admin.notice.create', compact('categoriesList', 'nextNo'));
    }

    /**
     * Store a newly created notice in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_bn'        => 'nullable|string|max:255',
            'title'           => 'nullable|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'notice_category' => 'required|string|max:50',
            'notice_no'       => 'nullable|string|max:100',
            'publish_date'    => 'required|date',
            'expire_date'     => 'nullable|date|after_or_equal:publish_date',
            'short_des_bn'    => 'nullable|string',
            'short_des'       => 'nullable|string',
            'long_des_bn'     => 'nullable|string',
            'long_des'        => 'nullable|string',
            'pdf_file'        => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:15360',
            'is_pinned'       => 'nullable|boolean',
            'is_ticker'       => 'nullable|boolean',
            'status'          => 'nullable|boolean',
        ]);

        if (empty($request->title_bn) && empty($request->title)) {
            return back()->withInput()->withErrors(['title_bn' => 'অনুগ্রহ করে নোটিশের বাংলা বা ইংরেজি শিরোনাম প্রদান করুন।']);
        }

        $filePath = null;
        $fileType = null;
        $fileSize = null;

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $ext = strtolower($file->getClientOriginalExtension());
            $fileName = 'notice_' . date('Ymd_His') . '_' . uniqid() . '.' . $ext;
            
            $destinationPath = public_path('uploads/notices');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            
            $sizeInBytes = $file->getSize();
            $fileSize = $this->formatBytes($sizeInBytes);
            $fileType = $ext;

            $file->move($destinationPath, $fileName);
            $filePath = 'uploads/notices/' . $fileName;
        }

        Notice::create([
            'title_bn'        => $request->title_bn ?: $request->title,
            'title'           => $request->title ?: $request->title_bn,
            'title_ar'        => $request->title_ar,
            'notice_category' => $request->notice_category,
            'notice_no'       => $request->notice_no ?: ('MQIA-NOT-' . date('Y') . '/' . rand(10, 99)),
            'publish_date'    => $request->publish_date ?: date('Y-m-d'),
            'expire_date'     => $request->expire_date,
            'short_des_bn'    => $request->short_des_bn,
            'short_des'       => $request->short_des,
            'long_des_bn'     => $request->long_des_bn,
            'long_des'        => $request->long_des,
            'pdf_file'        => $filePath,
            'file_type'       => $fileType,
            'file_size'       => $fileSize,
            'is_pinned'       => $request->has('is_pinned') ? 1 : 0,
            'is_ticker'       => $request->has('is_ticker') ? 1 : 0,
            'status'          => $request->has('status') ? 1 : 0,
            'views_count'     => 0,
        ]);

        return redirect()->route('notices.index')->with('message', 'নোটিশটি সফলভাবে প্রকাশ করা হয়েছে!');
    }

    /**
     * Display the specified notice in admin preview format.
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        $categoriesList = Notice::categoriesList();
        return view('admin.notice.show', compact('notice', 'categoriesList'));
    }

    /**
     * Show the form for editing the specified notice.
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        $categoriesList = Notice::categoriesList();
        return view('admin.notice.edit', compact('notice', 'categoriesList'));
    }

    /**
     * Update the specified notice in storage.
     */
    public function update(Request $request, $id)
    {
        $notice = Notice::findOrFail($id);

        $request->validate([
            'title_bn'        => 'nullable|string|max:255',
            'title'           => 'nullable|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'notice_category' => 'required|string|max:50',
            'notice_no'       => 'nullable|string|max:100',
            'publish_date'    => 'required|date',
            'expire_date'     => 'nullable|date|after_or_equal:publish_date',
            'short_des_bn'    => 'nullable|string',
            'short_des'       => 'nullable|string',
            'long_des_bn'     => 'nullable|string',
            'long_des'        => 'nullable|string',
            'pdf_file'        => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:15360',
            'is_pinned'       => 'nullable|boolean',
            'is_ticker'       => 'nullable|boolean',
            'status'          => 'nullable|boolean',
        ]);

        if (empty($request->title_bn) && empty($request->title)) {
            return back()->withInput()->withErrors(['title_bn' => 'অনুগ্রহ করে নোটিশের বাংলা বা ইংরেজি শিরোনাম প্রদান করুন।']);
        }

        $filePath = $notice->pdf_file;
        $fileType = $notice->file_type;
        $fileSize = $notice->file_size;

        if ($request->hasFile('pdf_file')) {
            // Delete old file if exists
            if ($notice->pdf_file && File::exists(public_path($notice->pdf_file))) {
                File::delete(public_path($notice->pdf_file));
            }

            $file = $request->file('pdf_file');
            $ext = strtolower($file->getClientOriginalExtension());
            $fileName = 'notice_' . date('Ymd_His') . '_' . uniqid() . '.' . $ext;
            
            $destinationPath = public_path('uploads/notices');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            
            $sizeInBytes = $file->getSize();
            $fileSize = $this->formatBytes($sizeInBytes);
            $fileType = $ext;

            $file->move($destinationPath, $fileName);
            $filePath = 'uploads/notices/' . $fileName;
        }

        $notice->update([
            'title_bn'        => $request->title_bn ?: $request->title,
            'title'           => $request->title ?: $request->title_bn,
            'title_ar'        => $request->title_ar,
            'notice_category' => $request->notice_category,
            'notice_no'       => $request->notice_no ?: $notice->notice_no,
            'publish_date'    => $request->publish_date,
            'expire_date'     => $request->expire_date,
            'short_des_bn'    => $request->short_des_bn,
            'short_des'       => $request->short_des,
            'long_des_bn'     => $request->long_des_bn,
            'long_des'        => $request->long_des,
            'pdf_file'        => $filePath,
            'file_type'       => $fileType,
            'file_size'       => $fileSize,
            'is_pinned'       => $request->has('is_pinned') ? 1 : 0,
            'is_ticker'       => $request->has('is_ticker') ? 1 : 0,
            'status'          => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('notices.index')->with('message', 'নোটিশটি সফলভাবে আপডেট করা হয়েছে!');
    }

    /**
     * Remove the specified notice from storage.
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        if ($notice->pdf_file && File::exists(public_path($notice->pdf_file))) {
            File::delete(public_path($notice->pdf_file));
        }

        $notice->delete();

        return redirect()->route('notices.index')->with('message', 'নোটিশটি সফলভাবে মুছে ফেলা হয়েছে!');
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->status = $notice->status ? 0 : 1;
        $notice->save();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'status'  => $notice->status,
                'message' => $notice->status ? 'নোটিশটি সক্রিয় করা হয়েছে' : 'নোটিশটি নিষ্ক্রিয় করা হয়েছে'
            ]);
        }

        return back()->with('message', $notice->status ? 'নোটিশটি সক্রিয় করা হয়েছে!' : 'নোটিশটি নিষ্ক্রিয় করা হয়েছে!');
    }

    /**
     * Toggle pinned status.
     */
    public function togglePinned($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->is_pinned = $notice->is_pinned ? 0 : 1;
        $notice->save();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success'   => true,
                'is_pinned' => $notice->is_pinned,
                'message'   => $notice->is_pinned ? 'নোটিশটি পিন করা হয়েছে' : 'পিন সরানো হয়েছে'
            ]);
        }

        return back()->with('message', $notice->is_pinned ? 'নোটিশটি সফলভাবে পিন করা হয়েছে!' : 'পিন স্ট্যাটাস বাতিল করা হয়েছে!');
    }

    /**
     * Toggle ticker visibility.
     */
    public function toggleTicker($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->is_ticker = $notice->is_ticker ? 0 : 1;
        $notice->save();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success'   => true,
                'is_ticker' => $notice->is_ticker,
                'message'   => $notice->is_ticker ? 'স্ক্রলিং টিকারে যুক্ত করা হয়েছে' : 'টিকিার থেকে সরানো হয়েছে'
            ]);
        }

        return back()->with('message', $notice->is_ticker ? 'নোটিশটি স্ক্রলিং টিকারে প্রদর্শন করা হবে!' : 'টিকারে প্রদর্শন বন্ধ করা হয়েছে!');
    }

    /**
     * Helper to format bytes to human readable format.
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
