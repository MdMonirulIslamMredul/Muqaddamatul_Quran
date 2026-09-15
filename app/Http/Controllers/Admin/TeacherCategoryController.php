<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherCategoryController extends Controller
{
    /**
     * Display a listing of teacher categories.
     */
    public function index()
    {
        $categories = TeacherCategory::withCount('teachers')
            ->orderBy('order_level', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15);

        return view('admin.teacher_category.index', compact('categories'));
    }

    /**
     * Store a newly created teacher category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_bn'     => 'required|string|max:150',
            'name_en'     => 'nullable|string|max:150',
            'name_ar'     => 'nullable|string|max:150',
            'order_level' => 'nullable|integer',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ], [
            'name_bn.required' => 'ক্যাটাগরির নাম (বাংলা) আবশ্যক।',
        ]);

        $slug = Str::slug($request->name_en ?: $request->name_bn);
        $originalSlug = $slug;
        $counter = 1;
        while (TeacherCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        TeacherCategory::create([
            'name_bn'     => $request->name_bn,
            'name_en'     => $request->name_en,
            'name_ar'     => $request->name_ar,
            'slug'        => $slug,
            'order_level' => $request->order_level ?? 0,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('teacher-categories.index')
            ->with('message', 'শিক্ষক ক্যাটাগরি সফলভাবে তৈরি করা হয়েছে।');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $category = TeacherCategory::findOrFail($id);
        $categories = TeacherCategory::withCount('teachers')
            ->orderBy('order_level', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15);

        return view('admin.teacher_category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, $id)
    {
        $category = TeacherCategory::findOrFail($id);

        $request->validate([
            'name_bn'     => 'required|string|max:150',
            'name_en'     => 'nullable|string|max:150',
            'name_ar'     => 'nullable|string|max:150',
            'order_level' => 'nullable|integer',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        if (empty($category->slug) || $request->filled('slug')) {
            $slug = Str::slug($request->slug ?: ($request->name_en ?: $request->name_bn));
            $originalSlug = $slug;
            $counter = 1;
            while (TeacherCategory::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $category->slug = $slug;
        }

        $category->update([
            'name_bn'     => $request->name_bn,
            'name_en'     => $request->name_en,
            'name_ar'     => $request->name_ar,
            'order_level' => $request->order_level ?? 0,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('teacher-categories.index')
            ->with('message', 'শিক্ষক ক্যাটাগরি সফলভাবে হালনাগাদ করা হয়েছে।');
    }

    /**
     * Remove the specified category.
     */
    public function destroy($id)
    {
        $category = TeacherCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('teacher-categories.index')
            ->with('message', 'শিক্ষক ক্যাটাগরি সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
