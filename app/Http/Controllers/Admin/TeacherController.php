<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * Display a listing of teachers.
     */
    public function index(Request $request)
    {
        $query = Teacher::with('category');

        // Filter by Category
        if ($request->filled('category_id')) {
            $query->where('teacher_category_id', $request->category_id);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by name, designation, phone, email, subject
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name_bn', 'like', "%{$search}%")
                  ->orWhere('name_en', 'like', "%{$search}%")
                  ->orWhere('designation_bn', 'like', "%{$search}%")
                  ->orWhere('designation_en', 'like', "%{$search}%")
                  ->orWhere('subject_department_bn', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $teachers = $query->orderBy('sort_order', 'asc')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        $categories = TeacherCategory::where('status', 1)->orderBy('order_level', 'asc')->get();
        $totalTeachers = Teacher::count();
        $activeTeachers = Teacher::where('status', 1)->count();
        $totalCategories = TeacherCategory::count();

        return view('admin.teacher.index', compact('teachers', 'categories', 'totalTeachers', 'activeTeachers', 'totalCategories'));
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        $categories = TeacherCategory::where('status', 1)->orderBy('order_level', 'asc')->get();
        return view('admin.teacher.create', compact('categories'));
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_category_id' => 'required|exists:teacher_categories,id',
            'name_bn'             => 'required|string|max:150',
            'name_en'             => 'nullable|string|max:150',
            'name_ar'             => 'nullable|string|max:150',
            'designation_bn'      => 'required|string|max:150',
            'designation_en'      => 'nullable|string|max:150',
            'designation_ar'      => 'nullable|string|max:150',
            'qualification_bn'    => 'nullable|string',
            'qualification_en'    => 'nullable|string',
            'subject_department_bn' => 'nullable|string|max:150',
            'subject_department_en' => 'nullable|string|max:150',
            'phone'               => 'nullable|string|max:40',
            'email'               => 'nullable|email|max:120',
            'bio_bn'              => 'nullable|string',
            'bio_en'              => 'nullable|string',
            'image'                   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'nid_or_birth_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'academic_certificate'    => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'resume'                  => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp,doc,docx|max:10240',
            'facebook'                => 'nullable|string|max:255',
            'youtube'                 => 'nullable|string|max:255',
            'linkedin'                => 'nullable|string|max:255',
            'whatsapp'                => 'nullable|string|max:50',
            'experience'              => 'nullable|string|max:100',
            'joining_date'            => 'nullable|date',
            'sort_order'              => 'nullable|integer',
            'status'                  => 'required|in:0,1',
        ], [
            'teacher_category_id.required' => 'শিক্ষকের ক্যাটাগরি নির্বাচন করুন।',
            'name_bn.required'             => 'শিক্ষকের নাম (বাংলা) আবশ্যক।',
            'designation_bn.required'      => 'পদবি (বাংলা) আবশ্যক।',
            'image.image'                  => 'ছবি সঠিক ইমেজ ফরম্যাটে হতে হবে (jpg, png, webp)।',
            'nid_or_birth_certificate.mimes' => 'জাতীয় পরিচয়পত্র / জন্ম নিবন্ধন ফাইলটি PDF, JPG, PNG বা WEBP ফরম্যাটে হতে হবে।',
            'academic_certificate.mimes'   => 'একাডেমিক সার্টিফিকেট ফাইলটি PDF, JPG, PNG বা WEBP ফরম্যাটে হতে হবে।',
            'resume.mimes'                 => 'সিভি / জীবনবৃত্তান্ত ফাইলটি PDF, DOC, DOCX, JPG বা PNG ফরম্যাটে হতে হবে।',
        ]);

        $data = $request->except(['_token', 'image', 'nid_or_birth_certificate', 'academic_certificate', 'resume']);
        $data['is_featured'] = $request->has('is_featured');
        $data['sort_order'] = $request->sort_order ?? 0;

        if (empty($data['joining_date'])) {
            $data['joining_date'] = null;
        }

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $uploadDir = public_path('uploads/teachers/' . date('Y/m'));
            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0777, true, true);
            }

            $file = $request->file('image');
            $fileName = 'teacher_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $data['image'] = 'uploads/teachers/' . date('Y/m') . '/' . $fileName;
        }

        // Document Upload Directory
        $docUploadDir = public_path('uploads/teachers/documents/' . date('Y/m'));
        if (!File::exists($docUploadDir)) {
            File::makeDirectory($docUploadDir, 0777, true, true);
        }

        // Handle NID / Birth Certificate Upload
        if ($request->hasFile('nid_or_birth_certificate')) {
            $file = $request->file('nid_or_birth_certificate');
            $fileName = 'nid_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['nid_or_birth_certificate'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        // Handle Academic Certificate Upload
        if ($request->hasFile('academic_certificate')) {
            $file = $request->file('academic_certificate');
            $fileName = 'cert_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['academic_certificate'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        // Handle Resume / CV Upload
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $fileName = 'cv_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['resume'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        $teacher = Teacher::create($data);

        return redirect()->route('teachers.index')
            ->with('message', 'নতুন শিক্ষক সফলভাবে যুক্ত করা হয়েছে।');
    }

    /**
     * Display the specified teacher profile.
     */
    public function show($id)
    {
        $teacher = Teacher::with('category')->findOrFail($id);
        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $categories = TeacherCategory::where('status', 1)->orderBy('order_level', 'asc')->get();
        return view('admin.teacher.edit', compact('teacher', 'categories'));
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'teacher_category_id' => 'required|exists:teacher_categories,id',
            'name_bn'             => 'required|string|max:150',
            'name_en'             => 'nullable|string|max:150',
            'name_ar'             => 'nullable|string|max:150',
            'designation_bn'      => 'required|string|max:150',
            'designation_en'      => 'nullable|string|max:150',
            'designation_ar'      => 'nullable|string|max:150',
            'qualification_bn'    => 'nullable|string',
            'qualification_en'    => 'nullable|string',
            'subject_department_bn' => 'nullable|string|max:150',
            'subject_department_en' => 'nullable|string|max:150',
            'phone'               => 'nullable|string|max:40',
            'email'               => 'nullable|email|max:120',
            'bio_bn'              => 'nullable|string',
            'bio_en'              => 'nullable|string',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'nid_or_birth_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'academic_certificate'    => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'resume'                  => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp,doc,docx|max:10240',
            'facebook'            => 'nullable|string|max:255',
            'youtube'             => 'nullable|string|max:255',
            'linkedin'            => 'nullable|string|max:255',
            'whatsapp'            => 'nullable|string|max:50',
            'experience'          => 'nullable|string|max:100',
            'joining_date'        => 'nullable|date',
            'sort_order'          => 'nullable|integer',
            'status'              => 'required|in:0,1',
        ], [
            'teacher_category_id.required' => 'শিক্ষকের ক্যাটাগরি নির্বাচন করুন।',
            'name_bn.required'             => 'শিক্ষকের নাম (বাংলা) আবশ্যক।',
            'designation_bn.required'      => 'পদবি (বাংলা) আবশ্যক।',
            'image.image'                  => 'ছবি সঠিক ইমেজ ফরম্যাটে হতে হবে (jpg, png, webp)।',
            'nid_or_birth_certificate.mimes' => 'জাতীয় পরিচয়পত্র / জন্ম নিবন্ধন ফাইলটি PDF, JPG, PNG বা WEBP ফরম্যাটে হতে হবে।',
            'academic_certificate.mimes'   => 'একাডেমিক সার্টিফিকেট ফাইলটি PDF, JPG, PNG বা WEBP ফরম্যাটে হতে হবে।',
            'resume.mimes'                 => 'সিভি / জীবনবৃত্তান্ত ফাইলটি PDF, DOC, DOCX, JPG বা PNG ফরম্যাটে হতে হবে।',
        ]);

        $data = $request->except(['_token', '_method', 'image', 'nid_or_birth_certificate', 'academic_certificate', 'resume', 'remove_nid', 'remove_academic_cert', 'remove_resume']);
        $data['is_featured'] = $request->has('is_featured');
        $data['sort_order'] = $request->sort_order ?? 0;

        if (empty($data['joining_date'])) {
            $data['joining_date'] = null;
        }

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $uploadDir = public_path('uploads/teachers/' . date('Y/m'));
            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0777, true, true);
            }

            // Remove old image if exists
            if (!empty($teacher->image) && File::exists(public_path($teacher->image))) {
                File::delete(public_path($teacher->image));
            }

            $file = $request->file('image');
            $fileName = 'teacher_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $data['image'] = 'uploads/teachers/' . date('Y/m') . '/' . $fileName;
        }

        $docUploadDir = public_path('uploads/teachers/documents/' . date('Y/m'));
        if (!File::exists($docUploadDir)) {
            File::makeDirectory($docUploadDir, 0777, true, true);
        }

        // Handle NID / Birth Certificate
        if ($request->has('remove_nid') && $request->remove_nid == '1') {
            if (!empty($teacher->nid_or_birth_certificate) && File::exists(public_path($teacher->nid_or_birth_certificate))) {
                File::delete(public_path($teacher->nid_or_birth_certificate));
            }
            $data['nid_or_birth_certificate'] = null;
        }

        if ($request->hasFile('nid_or_birth_certificate')) {
            if (!empty($teacher->nid_or_birth_certificate) && File::exists(public_path($teacher->nid_or_birth_certificate))) {
                File::delete(public_path($teacher->nid_or_birth_certificate));
            }
            $file = $request->file('nid_or_birth_certificate');
            $fileName = 'nid_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['nid_or_birth_certificate'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        // Handle Academic Certificate
        if ($request->has('remove_academic_cert') && $request->remove_academic_cert == '1') {
            if (!empty($teacher->academic_certificate) && File::exists(public_path($teacher->academic_certificate))) {
                File::delete(public_path($teacher->academic_certificate));
            }
            $data['academic_certificate'] = null;
        }

        if ($request->hasFile('academic_certificate')) {
            if (!empty($teacher->academic_certificate) && File::exists(public_path($teacher->academic_certificate))) {
                File::delete(public_path($teacher->academic_certificate));
            }
            $file = $request->file('academic_certificate');
            $fileName = 'cert_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['academic_certificate'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        // Handle Resume / CV
        if ($request->has('remove_resume') && $request->remove_resume == '1') {
            if (!empty($teacher->resume) && File::exists(public_path($teacher->resume))) {
                File::delete(public_path($teacher->resume));
            }
            $data['resume'] = null;
        }

        if ($request->hasFile('resume')) {
            if (!empty($teacher->resume) && File::exists(public_path($teacher->resume))) {
                File::delete(public_path($teacher->resume));
            }
            $file = $request->file('resume');
            $fileName = 'cv_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($docUploadDir, $fileName);
            $data['resume'] = 'uploads/teachers/documents/' . date('Y/m') . '/' . $fileName;
        }

        $teacher->update($data);

        return redirect()->route('teachers.index')
            ->with('message', 'শিক্ষকের তথ্য সফলভাবে হালনাগাদ করা হয়েছে।');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if (!empty($teacher->image) && File::exists(public_path($teacher->image))) {
            File::delete(public_path($teacher->image));
        }

        if (!empty($teacher->nid_or_birth_certificate) && File::exists(public_path($teacher->nid_or_birth_certificate))) {
            File::delete(public_path($teacher->nid_or_birth_certificate));
        }

        if (!empty($teacher->academic_certificate) && File::exists(public_path($teacher->academic_certificate))) {
            File::delete(public_path($teacher->academic_certificate));
        }

        if (!empty($teacher->resume) && File::exists(public_path($teacher->resume))) {
            File::delete(public_path($teacher->resume));
        }

        $teacher->delete();

        return redirect()->route('teachers.index')
            ->with('message', 'শিক্ষকের তথ্য সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
