<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Teacher;
use App\Models\TeacherCategory;
use App\Models\Department;
use App\Models\Notice;
use App\Models\DonatePayment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tech_web_index()
    {
        return view('home');
    }

    /**
     * Show the Admin Dashboard with comprehensive analytics and recent activity.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tech_web_adminHome()
    {
        $totalAdmissions = Admission::count();
        $pendingAdmissions = Admission::where('status', 'pending')->count();
        $approvedAdmissions = Admission::where('status', 'approved')->count();

        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 1)->count();
        $residentialStudents = Student::where('residential_type', 'residential')->count();

        $totalTeachers = Teacher::count();
        $activeTeachers = Teacher::where('status', 1)->count();
        $totalTeacherCategories = TeacherCategory::count();

        $totalClasses = StudentClass::count();
        $totalDepartments = Department::count();
        $totalNotices = Notice::count();

        $totalDonationAmount = class_exists(DonatePayment::class) ? DonatePayment::sum('amount') : 0;

        $recentAdmissions = Admission::latest()->take(6)->get();
        $recentStudents = Student::with('studentClass')->latest()->take(6)->get();
        $classesWithCounts = StudentClass::withCount('students')->where('status', 1)->orderBy('order_level', 'asc')->get();

        return view('admin.home.index', compact(
            'totalAdmissions',
            'pendingAdmissions',
            'approvedAdmissions',
            'totalStudents',
            'activeStudents',
            'residentialStudents',
            'totalTeachers',
            'activeTeachers',
            'totalTeacherCategories',
            'totalClasses',
            'totalDepartments',
            'totalNotices',
            'totalDonationAmount',
            'recentAdmissions',
            'recentStudents',
            'classesWithCounts'
        ));
    }
}
