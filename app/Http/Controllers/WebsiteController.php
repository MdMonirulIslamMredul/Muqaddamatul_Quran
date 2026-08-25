<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tv;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Logo;
use App\Models\Team;
use App\Models\About;
use App\Models\Audio;
use App\Models\Banner;
use App\Models\Donate;
use App\Models\Notice;
use App\Models\Counter;
use App\Models\Gallery;

use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Research;
use App\Models\Enrollment;
use App\Models\Tvcategory;

// -----------donaton charity -------------
use App\Models\Subcategory;
use App\Models\Testimonial;
use App\Models\Bookcategory;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\PaymentNumber;
use App\Models\Tvsubcategory;
use App\Models\BannerAndTitle;
use App\Models\Enrollmentform;
use App\Models\Booksubcategory;
use App\Models\Department;
use App\Models\UpcomingProject;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EnrollCertificate;
use App\Models\EnrollmentformInfo;
use App\Models\AdmissionGuideline;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    public function tech_web_home()
    {
        return view('frontend.home.home',[
            'services'=>Service::where('status',1)->where('service_home',1)->get(),


            'banners'=>Banner::get(),
            'about'=>About::find(1),
            'donations'=>Donate::get(),
            'projects'=>Project::take(6)->get(),
            'upcomingProjects'=>UpcomingProject::take(4)->get(),
            'galleries'=>Gallery::where('status',1)->where('add_home',1)->take(8)->get(),
            'videos' => VideoGallery::where('status',1)->take(6)->get(),
            'activities' => Activity::take(4)->get(),
            'counter'=>Counter::where('status',1)->latest()->first(),
            'partners'=>Partner::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),

            'testimonial_title'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'blogs'=>Blog::where('status',1)->where('add_home',1)->get(),
            'footer_blogs'=>Blog::where('status',1)->where('add_home',1)->take(2)->get(),
            // 'about'=>DB::table('abouts')->get(),
            'titles'=>BannerAndTitle::get(),
            'notices'=>Notice::where('status',1)->take(6)->get(),
            'departments'=>Department::where('status',1)->latest()->get(),

        ]);
    }

    public function tech_web_sub_menu_details($id)
    {
        return view('frontend.consultancy.consultancy_page',[
            'consultancy'=>DB::table('sub_menus')->find($id),
        ]);
    }
    public function tech_web_services_details($id)
    {
        return view('frontend.services.service_details',[
            'service'=>Service::find($id),
            'services'=>Service::where('status',1)->where('service_home',1)->get(),
        ]);
    }


    public function tech_web_all_services()
    {

        return view('frontend.services.all_services',[
            'services'=>Service::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','courses')->latest()->first(),

        ]);
    }

    // department
    public function departmentDetails($id){
        $department=Department::findOrFail($id);
        return view('frontend.department.department_details',[
            'department'=>$department,
            'banner'=>BannerAndTitle::where('page','blogs')->latest()->first(),
        ]);
    }
//
    public function tech_web_about_page($id)
    {
        return view('frontend.about_menu.about_page',[
            'about'=>DB::table('abouts')->find($id) ?? DB::table('abouts')->first(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'teams'=>Team::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','about')->latest()->first() ?? BannerAndTitle::first(),

        ]);
    }

    public function tech_web_consultancy_page()
    {
        return view('frontend.consultancy.consultancy_page',[
            'consultancy'=>DB::table('consultancies')->latest()->first(),
        ]);
    }
    public function tech_web_team_page()
    {
        return view('frontend.team.team_page',[
            'teams'=>Team::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','instructor')->latest()->first(),
        ]);
    }

    // public function tech_web_blogs_page()
    // {
    //     return view('frontend.blogs.blogs_page',[
    //         'blogs'=>Blog::where('status',1)->paginate(6),
    //         'banner'=>BannerAndTitle::where('page','blogs')->latest()->first(),
    //     ]);
    // }
    // public function tech_web_blogs_details($id)
    // {
    //     return view('frontend.blogs.blogs_details',[
    //         'blog'=>Blog::find($id),

    //     ]);
    // }

    public function tech_web_research_page()
    {
        return view('frontend.research.research_page',[
            'researches'=>Research::where('status',1)->paginate(6),
            'banner'=>BannerAndTitle::where('page','research')->latest()->first(),
        ]);
    }
    public function tech_web_research_details($id)
    {
        return view('frontend.research.research_details',[
            'research'=>Research::find($id),

        ]);
    }
//
    public function tech_web_contacts()
    {
        return view('frontend.contact.contact',[
            'banner'=>BannerAndTitle::where('page','contacts')->latest()->first(),
        ]);

    }

    public function tech_web_enrollment($id)
    {
        return view('frontend.enrollment.enrollment',[
            'service'=>Service::find($id),
            'enrollment_info'=>EnrollmentformInfo::latest()->first(),
            'numbers'=>PaymentNumber::latest()->first(),
        ]);
    }

    public function tech_web_enrollment_page()
    {
        return view('frontend.enrollment.enrollment_page',[
            'enroll_data' => Enrollmentform::where('user_id',Auth::user()->id)->first(),
            'enrollments'=>EnrollCertificate::where('user_id',Auth::user()->id)->with('service','user')->get(),
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
        ]);

    }

    public function tech_web_enroll(Request $request)
    {
        Enrollment::save_enrollment($request);
        Alert::toast('Enrollment Request Sent','success');
        return back();
    }



    public function tech_web_manage_enrollment()
    {
        return view('admin.enrollment.manage_enrollment',[
            'enrollments'=>Enrollmentform::with('service','user')->get(),

        ]);
    }

    public function tech_web_update_enrollment($id)
    {
        $enrollment = Enrollmentform::find($id);
        if ($enrollment->status == 0){
            $enrollment->status = 1;
        }else{
            $enrollment->status = 0;
        }
        $enrollment->save();
        return back();
    }

    // store enrollment form data from the user site
    public function tech_web_store_enrollment_form_data(Request $request){

        $user_roll = Auth::user();

        $file = $request->file('photo');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('enrollmentimage/student'),$fileName);
        $save_url = 'enrollmentimage/student/'.$fileName; //insert photo into database

// return $request;

        Enrollmentform::insert([
            'b_name' => $request->b_name,
            'service_id' => $request->service_id,
            'english_name' => $request->english_name,
            'roll_no' => $user_roll->roll_no,
            'division' => $request->division,
            'school_name' => $request->school_name,
            'father_name' => $request->father_name,
            'father_profession' => $request->father_profession,
            'mother_name' => $request->mother_name,
            'mother_profession' => $request->mother_profession,
            'alter_guardian' => $request->alter_guardian,
            'relation' => $request->relation,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'personal_mobile' => $request->personal_mobile,
            'guardian_mobile' => $request->guardian_mobile,
            'present_address' => $request->present_address,
            'post_office' => $request->post_office,
            'upzilla_name' => $request->upzilla_name,
            'district_name' => $request->district_name,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();

    }

    public function tech_web_add_enrollment_info(){

        $enrollment_info = EnrollmentformInfo::latest()->first();
        return view('admin.enrollment.add_enrollment_info',compact('enrollment_info'));
    }

    public function tech_web_store_enrollment_info(Request $request){
// dd($request);

        if($request->id){

            $enrollform_id = $request->id;

            EnrollmentformInfo::findOrFail($enrollform_id)->update([
                'institute_name' => $request->institute_name,
                'institute_address' => $request->institute_address,
                'institute_owner' => $request->institute_owner,
                'institute_Instructions' => $request->institute_Instructions,
                'updated_at' => Carbon::now(),
            ]);

        }else{
            EnrollmentformInfo::insert([
                'institute_name' => $request->institute_name,
                'institute_address' => $request->institute_address,
                'institute_owner' => $request->institute_owner,
                'institute_Instructions' => $request->institute_Instructions,
                'created_at' => Carbon::now(),
            ]);

        }
        return redirect()->back();

    }

    public function tech_web_download_enrollment($id){

        $enroll_data = Enrollmentform::with('user','service')->find($id);
        // dd($enroll_data);
        $logo = Logo::find(1);

        $pdf = Pdf::loadView('admin.enrollment.enrollment_invoice_pdf', compact('enroll_data','logo'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }

    public function tech_web_enroll_certificate($id){

               $enroll_data = Enrollmentform::find($id);
        // dd($enroll_data);
        return view('admin.enrollment.enroll_certificate',compact('enroll_data'));
    }

    public function tech_web_store_enroll_certificate(Request $request){
        $enroll_data = Enrollmentform::find($request->id);
        // dd($enroll_data);

        $file = $request->file('enroll_certificate');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('enroll_certificate/certificate'),$fileName);
        $save_url = 'enroll_certificate/certificate/'.$fileName; //insert photo into database

        EnrollCertificate::insert([
            'service_id' => $enroll_data->service_id,
            'user_id' => $enroll_data->user_id,
            'mobile' => $enroll_data->personal_mobile,
            'enroll_certificate' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->to('manage-enrollment')->with('message','Enrollment Certificate Upload Successfully');
    }

    public function tech_web_sub_audio_page(){

        $audios = Audio::latest('id')->with(['category', 'subcategory'])->paginate(1000);
        $categories = Category::get();
        $banner = BannerAndTitle::where('page','audio')->latest()->first();
        return view('frontend.audio.audio_page',compact('audios', 'categories', 'banner'));
    }

    public function tech_web_category_audio($id){

        $category = Category::where('id', $id)->with('audios')->first();
        $categories = Category::get();
        $banner = BannerAndTitle::where('page','audio')->latest()->first();
        return view('frontend.audio.category_audio',compact('category', 'banner', 'categories'));
    }

    public function tech_web_sub_subcategory_audio($id){

        $subcategory = Subcategory::where('id', $id)->first();
        $categories = Category::get();
        $banner = BannerAndTitle::where('page','audio')->latest()->first();
        return view('frontend.audio.subcategory_audio',compact('subcategory', 'banner', 'categories'));
    }



    public function tech_web_sub_book_page(){

        $books = Book::latest('id')->with(['bookCategory', 'bookSubcategory'])->paginate(6);
        $categories = Bookcategory::get();
        $banner = BannerAndTitle::where('page','book')->latest()->first();
        return view('frontend.book.book_page',compact('books', 'categories','banner'));
    }

    public function tech_web_sub_subcategory_book($id){

        $subcategory = Booksubcategory::where('id', $id)->first();
        $categories = Bookcategory::get();
        $banner = BannerAndTitle::where('page','courses')->latest()->first();
        return view('frontend.book.subcategory_book',compact('subcategory', 'banner', 'categories'));
    }

    public function tech_web_sub_book_details($id){

        $categories = Bookcategory::get();
        $book = Book::where('id', $id)->first();
        $banner = BannerAndTitle::where('page','courses')->latest()->first();
        return view('frontend.book.book_details',compact('banner', 'book', 'categories'));
    }

    public function tech_web_sub_tv_page(){

        $tvs = Tv::latest('id')->with(['tvCategory', 'tvSubcategory'])->get();
        $categories = Tvcategory::get();
        $banner = BannerAndTitle::where('page','live_tv')->latest()->first();
        return view('frontend.tv.tv_page',compact('banner', 'tvs', 'categories'));
    }

    public function tech_web_sub_subcategory_tv($id){

        $subcategory = Tvsubcategory::where('id', $id)->first();
        $categories = Tvcategory::get();
        $banner = BannerAndTitle::where('page','courses')->latest()->first();
        return view('frontend.tv.subcategory_tv',compact('subcategory', 'banner', 'categories'));
    }

    public function tech_web_admission_guidelines()
    {
        $guideline = AdmissionGuideline::first();
        $guidelines = AdmissionGuideline::all();
        $banner = BannerAndTitle::where('page', 'admission')->latest()->first() ?? BannerAndTitle::where('page', 'courses')->latest()->first() ?? BannerAndTitle::first();
        $departments = Department::where('status', 1)->latest()->get();
        $logo = Logo::latest()->first();

        return view('frontend.admission.admission_guideline', compact('guideline', 'guidelines', 'banner', 'departments', 'logo'));
    }

}
