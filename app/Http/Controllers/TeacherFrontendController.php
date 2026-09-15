<?php

namespace App\Http\Controllers;

use App\Models\BannerAndTitle;
use App\Models\Teacher;
use App\Models\TeacherCategory;
use Illuminate\Http\Request;

class TeacherFrontendController extends Controller
{
    /**
     * Display the Frontend Teachers Showcase with Category Filter Tabs.
     */
    public function index(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'instructor')->latest()->first()
            ?? BannerAndTitle::where('page', 'team')->latest()->first()
            ?? BannerAndTitle::first();

        $categories = TeacherCategory::where('status', 1)
            ->with(['activeTeachers' => function ($q) {
                $q->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
            }])
            ->whereHas('activeTeachers')
            ->orderBy('order_level', 'asc')
            ->get();

        $selectedCategorySlug = $request->query('category', 'all');
        $searchQuery = $request->query('search');

        $query = Teacher::with('category')->where('status', 1);

        if ($selectedCategorySlug !== 'all') {
            $query->whereHas('category', function ($q) use ($selectedCategorySlug) {
                $q->where('slug', $selectedCategorySlug);
            });
        }

        if (!empty($searchQuery)) {
            $s = trim($searchQuery);
            $query->where(function ($q) use ($s) {
                $q->where('name_bn', 'like', "%{$s}%")
                  ->orWhere('name_en', 'like', "%{$s}%")
                  ->orWhere('designation_bn', 'like', "%{$s}%")
                  ->orWhere('designation_en', 'like', "%{$s}%")
                  ->orWhere('subject_department_bn', 'like', "%{$s}%");
            });
        }

        $allTeachers = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.teachers.index', compact(
            'banner',
            'categories',
            'allTeachers',
            'selectedCategorySlug',
            'searchQuery'
        ));
    }

    /**
     * Display a single Teacher's Detailed Profile.
     */
    public function details($id)
    {
        $teacher = Teacher::with('category')->where('status', 1)->findOrFail($id);

        $banner = BannerAndTitle::where('page', 'instructor')->latest()->first()
            ?? BannerAndTitle::where('page', 'team')->latest()->first()
            ?? BannerAndTitle::first();

        // Related teachers in the same category
        $relatedTeachers = Teacher::where('status', 1)
            ->where('teacher_category_id', $teacher->teacher_category_id)
            ->where('id', '!=', $teacher->id)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        return view('frontend.teachers.details', compact('teacher', 'banner', 'relatedTeachers'));
    }
}
