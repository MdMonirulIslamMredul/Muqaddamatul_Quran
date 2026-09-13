<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\AdmissionGuideline;
use App\Models\BannerAndTitle;
use App\Models\Department;
use App\Models\Logo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdmissionApplicationController extends Controller
{
    /**
     * Show the Online Admission Application Form.
     */
    public function create()
    {
        $banner = BannerAndTitle::where('page', 'admission')->latest()->first()
            ?? BannerAndTitle::where('page', 'courses')->latest()->first()
            ?? BannerAndTitle::first();
        $departments = Department::where('status', 1)->latest()->get();
        $logo = Logo::latest()->first();
        $guideline = AdmissionGuideline::first();

        return view('frontend.admission.online_admission', compact('banner', 'departments', 'logo', 'guideline'));
    }

    /**
     * Store an Online Admission Application.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name_bn' => 'required|string|max:120',
            'student_name_en' => 'nullable|string|max:120',
            'desired_class'   => 'required|string|max:60',
            'mobile'          => 'required|string|max:30',
            'student_photo'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'father_photo'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'mother_photo'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'guardian_photo'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pick_drop_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'local_guardian_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ref_photo'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'birth_certificate_file' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:3072',
            'nid_file'        => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:3072',
            'tc_file'         => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:3072',
        ], [
            'student_name_bn.required' => 'শিক্ষার্থীর নাম (বাংলায়) আবশ্যক।',
            'desired_class.required'   => 'ভর্তির কাঙ্ক্ষিত শ্রেণি নির্বাচন করুন।',
            'mobile.required'          => 'মোবাইল নম্বর আবশ্যক।',
            'student_photo.image'      => 'শিক্ষার্থীর ছবি সঠিক ইমেজ ফরম্যাটে হতে হবে (jpg, png, webp)।',
        ]);

        $data = $request->except([
            '_token',
            'student_photo', 'father_photo', 'mother_photo', 'guardian_photo',
            'pick_drop_photo', 'local_guardian_photo', 'ref_photo',
            'birth_certificate_file', 'nid_file', 'tc_file'
        ]);

        // Generate Unique Application Number
        $data['application_no'] = Admission::generateApplicationNo();
        $data['academic_year'] = $request->academic_year ?: date('Y');
        $data['status'] = 'pending';
        $data['entry_type'] = 'online';
        $data['ip_address'] = $request->ip();

        // Sanitize nullable dates
        if (empty($data['dob'])) {
            $data['dob'] = null;
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

        return redirect()->route('admission.success', $admission->application_no)
            ->with('success', 'আপনার ভর্তি আবেদন সফলভাবে জমা হয়েছে।');
    }

    /**
     * Show Admission Application Success & Slip Page.
     */
    public function success($tracking_no)
    {
        $admission = Admission::where('application_no', $tracking_no)->firstOrFail();
        $banner = BannerAndTitle::where('page', 'admission')->latest()->first()
            ?? BannerAndTitle::first();
        $logo = Logo::latest()->first();

        return view('frontend.admission.admission_success', compact('admission', 'banner', 'logo'));
    }

    /**
     * Check Application Status by Tracking No or Mobile.
     */
    public function status(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'admission')->latest()->first()
            ?? BannerAndTitle::first();
        $logo = Logo::latest()->first();
        $admissions = null;
        $searchQuery = $request->query('query');

        if (!empty($searchQuery)) {
            $query = trim($searchQuery);
            $admissions = Admission::where('application_no', $query)
                ->orWhere('mobile', $query)
                ->orWhere('phone', $query)
                ->latest()
                ->get();
        }

        return view('frontend.admission.admission_status', compact('admissions', 'banner', 'logo', 'searchQuery'));
    }

    /**
     * View/Print 5-Page Pixel-Perfect Offline Blank Admission Form.
     */
    public function offlineForm()
    {
        $logo = Logo::latest()->first();
        $guideline = AdmissionGuideline::first();
        $isFilled = false;
        $admission = new Admission();

        return view('frontend.admission.offline_form_print', compact('logo', 'guideline', 'isFilled', 'admission'));
    }

    /**
     * View/Print 5-Page Filled Admission Form for an Applicant.
     */
    public function printApplication($id)
    {
        $admission = Admission::findOrFail($id);
        $logo = Logo::latest()->first();
        $guideline = AdmissionGuideline::first();
        $isFilled = true;

        return view('frontend.admission.offline_form_print', compact('logo', 'guideline', 'isFilled', 'admission'));
    }
}
