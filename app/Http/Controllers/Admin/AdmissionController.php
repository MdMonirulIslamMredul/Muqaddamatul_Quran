<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\AdmissionGuideline;
use App\Models\Department;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Logo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdmissionController extends Controller
{
    /**
     * Display a listing of admission applications.
     */
    public function index(Request $request)
    {
        $query = Admission::query();

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Academic Year Filter
        if ($request->filled('academic_year')) {
            $query->where('academic_year', $request->academic_year);
        }

        // Class Filter
        if ($request->filled('desired_class')) {
            $query->where('desired_class', $request->desired_class);
        }

        // Search Filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('application_no', 'like', "%{$search}%")
                  ->orWhere('student_name_bn', 'like', "%{$search}%")
                  ->orWhere('student_name_en', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('father_name_bn', 'like', "%{$search}%")
                  ->orWhere('father_name_en', 'like', "%{$search}%")
                  ->orWhere('assigned_roll_no', 'like', "%{$search}%");
            });
        }

        $admissions = $query->latest('id')->paginate(15)->withQueryString();

        // Statistics
        $totalCount = Admission::count();
        $pendingCount = Admission::where('status', 'pending')->count();
        $approvedCount = Admission::where('status', 'approved')->count();
        $passedCount = Admission::where('status', 'passed')->count();
        $rejectedCount = Admission::where('status', 'rejected')->count();

        // Distinct academic years & classes for dropdowns
        $academicYears = Admission::whereNotNull('academic_year')->distinct()->pluck('academic_year');
        $classes = Admission::whereNotNull('desired_class')->distinct()->pluck('desired_class');

        return view('admin.admission.index', compact(
            'admissions',
            'totalCount',
            'pendingCount',
            'approvedCount',
            'passedCount',
            'rejectedCount',
            'academicYears',
            'classes'
        ));
    }

    /**
     * Show the form for creating a new admission (Office manual entry).
     */
    public function create()
    {
        $departments = Department::where('status', 1)->latest()->get();
        return view('admin.admission.create', compact('departments'));
    }

    /**
     * Store a newly created admission in storage (Office manual entry).
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name_bn' => 'required|string|max:120',
            'desired_class'   => 'required|string|max:60',
            'mobile'          => 'required|string|max:30',
            'student_photo'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'father_photo'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'mother_photo'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'guardian_photo'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pick_drop_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'local_guardian_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ref_photo'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except([
            '_token',
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ]);

        $data['application_no'] = Admission::generateApplicationNo();
        $data['academic_year'] = $request->academic_year ?: date('Y');
        $data['entry_type'] = 'offline_office';

        // Sanitize nullable dates
        if (empty($data['dob'])) {
            $data['dob'] = null;
        }
        if (empty($data['admission_test_date'])) {
            $data['admission_test_date'] = null;
        }
        if (empty($data['approval_date'])) {
            $data['approval_date'] = null;
        }

        // Checkbox Booleans
        $data['doc_student_photos'] = $request->has('doc_student_photos');
        $data['doc_guardian_photos'] = $request->has('doc_guardian_photos');
        $data['doc_birth_certificate'] = $request->has('doc_birth_certificate');
        $data['doc_nid'] = $request->has('doc_nid');
        $data['doc_tc'] = $request->has('doc_tc');

        // Handle Photo Uploads
        $uploadDir = public_path('uploads/admissions/' . date('Y/m'));
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0777, true, true);
        }

        $photoFields = [
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ];

        foreach ($photoFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = time() . '_' . $field . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $data[$field] = 'uploads/admissions/' . date('Y/m') . '/' . $fileName;
            }
        }

        $admission = Admission::create($data);

        // Auto calculate marks if provided
        $admission->calculateTotalMarks()->save();

        return redirect()->route('admissions.show', $admission->id)
            ->with('message', 'ভর্তি আবেদন সফলভাবে সংরক্ষিত হয়েছে। (Application No: ' . $admission->application_no . ')');
    }

    /**
     * Display the specified admission application.
     */
    public function show($id)
    {
        $admission = Admission::findOrFail($id);
        $departments = Department::where('status', 1)->latest()->get();
        return view('admin.admission.show', compact('admission', 'departments'));
    }

    /**
     * Show the form for editing the specified admission application.
     */
    public function edit($id)
    {
        $admission = Admission::findOrFail($id);
        $departments = Department::where('status', 1)->latest()->get();
        return view('admin.admission.edit', compact('admission', 'departments'));
    }

    /**
     * Update the specified admission application in storage.
     */
    public function update(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        $request->validate([
            'student_name_bn' => 'required|string|max:120',
            'desired_class'   => 'required|string|max:60',
            'mobile'          => 'required|string|max:30',
        ]);

        $data = $request->except([
            '_token', '_method',
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ]);

        // Sanitize nullable dates
        if (empty($data['dob'])) {
            $data['dob'] = null;
        }
        if (empty($data['admission_test_date'])) {
            $data['admission_test_date'] = null;
        }
        if (empty($data['approval_date'])) {
            $data['approval_date'] = null;
        }

        // Checkbox Booleans
        $data['doc_student_photos'] = $request->has('doc_student_photos');
        $data['doc_guardian_photos'] = $request->has('doc_guardian_photos');
        $data['doc_birth_certificate'] = $request->has('doc_birth_certificate');
        $data['doc_nid'] = $request->has('doc_nid');
        $data['doc_tc'] = $request->has('doc_tc');

        // Handle Photo Uploads
        $uploadDir = public_path('uploads/admissions/' . date('Y/m'));
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0777, true, true);
        }

        $photoFields = [
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ];

        foreach ($photoFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if (!empty($admission->$field) && File::exists(public_path($admission->$field))) {
                    File::delete(public_path($admission->$field));
                }

                $file = $request->file($field);
                $fileName = time() . '_' . $field . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $data[$field] = 'uploads/admissions/' . date('Y/m') . '/' . $fileName;
            }
        }

        $admission->update($data);
        $admission->calculateTotalMarks()->save();

        return redirect()->route('admissions.show', $admission->id)
            ->with('message', 'ভর্তি তথ্যাবলী সফলভাবে আপডেট করা হয়েছে।');
    }

    /**
     * Store / Update Admission Test Evaluation & Approval (Sections 19, 20, 21, 22).
     */
    public function evaluate(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        $request->validate([
            'marks_hifz_nazera'       => 'nullable|numeric|min:0|max:50',
            'marks_tajweed'           => 'nullable|numeric|min:0|max:30',
            'marks_pronunciation'     => 'nullable|numeric|min:0|max:20',
            'marks_bangla'            => 'nullable|numeric|min:0|max:20',
            'marks_english'           => 'nullable|numeric|min:0|max:20',
            'marks_math'              => 'nullable|numeric|min:0|max:20',
            'marks_general_knowledge' => 'nullable|numeric|min:0|max:40',
        ]);

        $admission->marks_hifz_nazera = $request->marks_hifz_nazera;
        $admission->marks_tajweed = $request->marks_tajweed;
        $admission->marks_pronunciation = $request->marks_pronunciation;
        $admission->marks_bangla = $request->marks_bangla;
        $admission->marks_english = $request->marks_english;
        $admission->marks_math = $request->marks_math;
        $admission->marks_general_knowledge = $request->marks_general_knowledge;

        // Auto calculate total and percentage
        $admission->calculateTotalMarks();

        // Office evaluation details
        $admission->admission_test_date = $request->admission_test_date ?: null;
        $admission->admission_test_result = $request->admission_test_result;
        $admission->quran_recitation_status = $request->quran_recitation_status;

        // Document Checklists
        $admission->doc_student_photos = $request->has('doc_student_photos');
        $admission->doc_guardian_photos = $request->has('doc_guardian_photos');
        $admission->doc_birth_certificate = $request->has('doc_birth_certificate');
        $admission->doc_nid = $request->has('doc_nid');
        $admission->doc_tc = $request->has('doc_tc');

        // Approval
        $admission->status = $request->status ?: $admission->status;
        $admission->assigned_roll_no = $request->assigned_roll_no;
        $admission->approved_class = $request->approved_class;
        $admission->approved_department = $request->approved_department;
        $admission->approval_date = $request->approval_date ?: ($request->status === 'approved' ? Carbon::now()->toDateString() : null);
        $admission->admin_notes = $request->admin_notes;

        $admission->save();

        return redirect()->route('admissions.show', $admission->id)
            ->with('message', 'ভর্তি পরীক্ষা মূল্যায়ন ও অনুমোদন সফলভাবে সংরক্ষিত হয়েছে।');
    }

    /**
     * Convert/Enroll an approved admission application into a permanent student record.
     */
    public function enrollStudent(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        $className = $request->approved_class ?: ($admission->approved_class ?: $admission->desired_class);
        $studentClass = null;

        if (!empty($className)) {
            $studentClass = StudentClass::where('name_bn', $className)
                ->orWhere('name_en', $className)
                ->orWhere('code', $className)
                ->first();

            if (!$studentClass) {
                $studentClass = StudentClass::create([
                    'name_bn'    => $className,
                    'department' => $admission->department_division ?: 'সাধারণ',
                    'status'     => 1,
                ]);
            }
        }

        $year = $request->academic_year ?: ($admission->academic_year ?: date('Y'));
        $rollNo = $request->assigned_roll_no ?: $admission->assigned_roll_no;

        // Check if student already enrolled from this admission
        $student = Student::where('admission_id', $admission->id)->first();

        $studentData = [
            'student_class_id'  => $studentClass ? $studentClass->id : null,
            'admission_id'      => $admission->id,
            'academic_year'     => $year,
            'roll_no'           => $rollNo,
            'student_name_bn'   => $admission->student_name_bn,
            'student_name_en'   => $admission->student_name_en,
            'dob'               => $admission->dob,
            'blood_group'       => $admission->blood_group,
            'residential_type'  => $admission->residential_type ?: 'residential',
            'photo'             => $admission->student_photo,
            'father_name_bn'    => $admission->father_name_bn,
            'father_name_en'    => $admission->father_name_en,
            'father_contact'    => $admission->father_contact ?: $admission->mobile,
            'father_profession' => $admission->father_profession,
            'mother_name_bn'    => $admission->mother_name_bn,
            'mother_name_en'    => $admission->mother_name_en,
            'mother_contact'    => $admission->mother_contact,
            'guardian_name'     => $admission->guardian_name ?: $admission->father_name_bn,
            'guardian_contact'  => $admission->guardian_mobile ?: $admission->mobile,
            'guardian_relation' => $admission->guardian_relation_info,
            'present_address'   => $admission->present_address,
            'permanent_address' => $admission->permanent_village ? ($admission->permanent_village . ', ' . $admission->permanent_post_office . ', ' . $admission->permanent_upazila . ', ' . $admission->permanent_district) : null,
            'status'            => 1,
            'admin_notes'       => 'Enrolled from Admission Application: ' . $admission->application_no,
        ];

        if ($student) {
            $student->update($studentData);
        } else {
            $studentData['student_id_number'] = Student::generateStudentId($year);
            $student = Student::create($studentData);
        }

        // Mark admission approved
        $admission->status = 'approved';
        $admission->assigned_roll_no = $rollNo;
        if ($studentClass) {
            $admission->approved_class = $studentClass->name_bn;
        }
        $admission->approval_date = Carbon::now()->toDateString();
        $admission->save();

        return redirect()->route('students.show', $student->id)
            ->with('message', 'অভিনন্দন! শিক্ষার্থী সফলভাবে শ্রেণিতে নথিভুক্ত ও এনরোল করা হয়েছে। (Student ID: ' . $student->student_id_number . ')');
    }

    /**
     * Remove the specified admission application from storage.
     */
    public function destroy($id)
    {
        $admission = Admission::findOrFail($id);

        $photoFields = [
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ];

        foreach ($photoFields as $field) {
            if (!empty($admission->$field) && File::exists(public_path($admission->$field))) {
                File::delete(public_path($admission->$field));
            }
        }

        $admission->delete();

        return redirect()->route('admissions.index')
            ->with('message', 'ভর্তি আবেদন সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
