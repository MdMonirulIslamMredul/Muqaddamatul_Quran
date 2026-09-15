<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of students (Class-wise & Filterable).
     */
    public function index(Request $request)
    {
        $query = Student::with(['studentClass', 'admission']);

        // Filter by Class
        if ($request->filled('class_id')) {
            $query->where('student_class_id', $request->class_id);
        }

        // Filter by Academic Year
        if ($request->filled('academic_year')) {
            $query->where('academic_year', $request->academic_year);
        }

        // Filter by Residential Type
        if ($request->filled('residential_type')) {
            $query->where('residential_type', $request->residential_type);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by ID, Roll, Name, Mobile, Father's Name
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('student_id_number', 'like', "%{$search}%")
                  ->orWhere('roll_no', 'like', "%{$search}%")
                  ->orWhere('student_name_bn', 'like', "%{$search}%")
                  ->orWhere('student_name_en', 'like', "%{$search}%")
                  ->orWhere('father_name_bn', 'like', "%{$search}%")
                  ->orWhere('father_contact', 'like', "%{$search}%")
                  ->orWhere('guardian_contact', 'like', "%{$search}%");
            });
        }

        $students = $query->orderBy('academic_year', 'desc')
            ->orderBy('student_class_id', 'asc')
            ->orderByRaw('CAST(roll_no AS UNSIGNED) ASC')
            ->orderBy('id', 'asc')
            ->paginate(20)
            ->withQueryString();

        $classes = StudentClass::withCount('students')
            ->where('status', 1)
            ->orderBy('order_level', 'asc')
            ->get();

        $academicYears = Student::select('academic_year')
            ->distinct()
            ->orderBy('academic_year', 'desc')
            ->pluck('academic_year');

        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 1)->count();
        $residentialCount = Student::where('residential_type', 'residential')->count();

        return view('admin.student.index', compact(
            'students',
            'classes',
            'academicYears',
            'totalStudents',
            'activeStudents',
            'residentialCount'
        ));
    }

    /**
     * Show the form for creating a new student directly.
     */
    public function create()
    {
        $classes = StudentClass::where('status', 1)->orderBy('order_level', 'asc')->get();
        $suggestedId = Student::generateStudentId(date('Y'));

        return view('admin.student.create', compact('classes', 'suggestedId'));
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_class_id'  => 'required|exists:student_classes,id',
            'academic_year'     => 'required|string|max:20',
            'roll_no'           => 'nullable|string|max:50',
            'student_name_bn'   => 'required|string|max:150',
            'student_name_en'   => 'nullable|string|max:150',
            'dob'               => 'nullable|date',
            'blood_group'       => 'nullable|string|max:10',
            'residential_type'  => 'required|in:residential,non_residential,day_care',
            'father_name_bn'    => 'nullable|string|max:150',
            'father_contact'    => 'nullable|string|max:30',
            'mother_name_bn'    => 'nullable|string|max:150',
            'guardian_name'     => 'nullable|string|max:150',
            'guardian_contact'  => 'nullable|string|max:30',
            'present_address'   => 'nullable|string',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'            => 'required|in:0,1,2,3',
        ], [
            'student_class_id.required' => 'শ্রেণি নির্বাচন করুন।',
            'student_name_bn.required'  => 'শিক্ষার্থীর নাম (বাংলা) আবশ্যক।',
        ]);

        $data = $request->except(['_token', 'photo']);

        if (empty($data['student_id_number'])) {
            $data['student_id_number'] = Student::generateStudentId($data['academic_year']);
        }

        if (empty($data['dob'])) {
            $data['dob'] = null;
        }

        // Handle Photo Upload
        if ($request->hasFile('photo')) {
            $uploadDir = public_path('uploads/students/' . date('Y/m'));
            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0777, true, true);
            }

            $file = $request->file('photo');
            $fileName = 'student_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $data['photo'] = 'uploads/students/' . date('Y/m') . '/' . $fileName;
        }

        $student = Student::create($data);

        return redirect()->route('students.index', ['class_id' => $student->student_class_id])
            ->with('message', 'শিক্ষার্থী সফলভাবে যুক্ত করা হয়েছে। (ID: ' . $student->student_id_number . ')');
    }

    /**
     * Display the specified student profile.
     */
    public function show($id)
    {
        $student = Student::with(['studentClass', 'admission'])->findOrFail($id);
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = StudentClass::where('status', 1)->orderBy('order_level', 'asc')->get();

        return view('admin.student.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'student_class_id'  => 'required|exists:student_classes,id',
            'academic_year'     => 'required|string|max:20',
            'roll_no'           => 'nullable|string|max:50',
            'student_name_bn'   => 'required|string|max:150',
            'student_name_en'   => 'nullable|string|max:150',
            'dob'               => 'nullable|date',
            'blood_group'       => 'nullable|string|max:10',
            'residential_type'  => 'required|in:residential,non_residential,day_care',
            'father_name_bn'    => 'nullable|string|max:150',
            'father_contact'    => 'nullable|string|max:30',
            'mother_name_bn'    => 'nullable|string|max:150',
            'guardian_name'     => 'nullable|string|max:150',
            'guardian_contact'  => 'nullable|string|max:30',
            'present_address'   => 'nullable|string',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'            => 'required|in:0,1,2,3',
        ]);

        $data = $request->except(['_token', '_method', 'photo']);

        if (empty($data['dob'])) {
            $data['dob'] = null;
        }

        // Handle Photo Upload
        if ($request->hasFile('photo')) {
            $uploadDir = public_path('uploads/students/' . date('Y/m'));
            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0777, true, true);
            }

            if (!empty($student->photo) && File::exists(public_path($student->photo))) {
                File::delete(public_path($student->photo));
            }

            $file = $request->file('photo');
            $fileName = 'student_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $data['photo'] = 'uploads/students/' . date('Y/m') . '/' . $fileName;
        }

        $student->update($data);

        return redirect()->route('students.index', ['class_id' => $student->student_class_id])
            ->with('message', 'শিক্ষার্থীর তথ্য সফলভাবে হালনাগাদ করা হয়েছে।');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if (!empty($student->photo) && File::exists(public_path($student->photo))) {
            File::delete(public_path($student->photo));
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('message', 'শিক্ষার্থীর তথ্য সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
