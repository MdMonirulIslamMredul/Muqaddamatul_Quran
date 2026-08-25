<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\GalleryController;

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ActivityController;

// caharit of donation
use App\Http\Controllers\Admin\TvController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\ConsultancyController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VolunteerFromController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcribeController;
use App\Http\Controllers\BannerAndTitleController;
use App\Http\Controllers\LifeTimeMemberController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TvCategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\BookCategoryController;
use App\Http\Controllers\Admin\TvSubcategoryController;
use App\Http\Controllers\Admin\BookSubcategoryController;
use App\Http\Controllers\Admin\AdmissionGuidelineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!a
|
*/

Route::get('/',[WebsiteController::class,'tech_web_home'])->name('front.page');
Route::get('/services-details/{id}', [WebsiteController::class, 'tech_web_services_details'])->name('services.details');
Route::get('/all-services', [WebsiteController::class, 'tech_web_all_services'])->name('services');
Route::get('/about-page/{id}', [WebsiteController::class, 'tech_web_about_page'])->name('about.page');
Route::get('/team-page', [WebsiteController::class, 'tech_web_team_page'])->name('team.page');
Route::get('/testimonial-page', [WebsiteController::class, 'tech_web_testimonial_page'])->name('testimonial.page');
// Route::get('/blogs-page', [WebsiteController::class, 'tech_web_blogs_page'])->name('blogs.page');
Route::get('/consultancy-page', [WebsiteController::class, 'tech_web_consultancy_page'])->name('consultancy.page');
Route::get('/research-page', [WebsiteController::class, 'tech_web_research_page'])->name('research.page');
Route::get('/research-details/{id}', [WebsiteController::class, 'tech_web_research_details'])->name('research.details');
Route::get('/sub-menu-details/{id}', [WebsiteController::class, 'tech_web_sub_menu_details'])->name('submenu.details');

//Audio
Route::get('/audio_page', [WebsiteController::class, 'tech_web_sub_audio_page'])->name('audio.page');
Route::get('/category_audio/{id}', [WebsiteController::class, 'tech_web_category_audio'])->name('category.audio');
Route::get('/subcategory_audio/{id}', [WebsiteController::class, 'tech_web_sub_subcategory_audio'])->name('subcategory.audio');

//Book
Route::get('/book_page', [WebsiteController::class, 'tech_web_sub_book_page'])->name('book.page');
Route::get('/subcategory_book/{id}', [WebsiteController::class, 'tech_web_sub_subcategory_book'])->name('subcategory.book');
Route::get('/book_details/{id}', [WebsiteController::class, 'tech_web_sub_book_details'])->name('book.details');

//Live Tv
Route::get('/tv_page', [WebsiteController::class, 'tech_web_sub_tv_page'])->name('tv.page');
Route::get('/subcategory_tv/{id}', [WebsiteController::class, 'tech_web_sub_subcategory_tv'])->name('subcategory.tv');

Route::get('/contacts', [WebsiteController::class, 'tech_web_contacts'])->name('contacts');

Route::get('/user-profile-settings', [GeneralController::class, 'tech_web_user_profile_settings'])->name('user.profile.settings')->middleware('is_user');
Route::post('/user-update-profile', [GeneralController::class, 'tech_web_user_update_profile'])->name('user.update.profile')->middleware('is_user');

Route::get('/enrollment/{id}', [WebsiteController::class, 'tech_web_enrollment'])->name('enrollment')->middleware('is_user');
Route::get('/enrollment-page', [WebsiteController::class, 'tech_web_enrollment_page'])->name('enrollment.page')->middleware('is_user');
Route::post('/enroll', [WebsiteController::class, 'tech_web_enroll'])->name('enroll')->middleware('is_user');
Route::post('/enrollment_data', [WebsiteController::class, 'tech_web_store_enrollment_form_data'])->name('store.enrollment.form.data')->middleware('is_user');


//depertment
Route::get('department-details/{id}', [WebsiteController::class, 'departmentDetails'])->name('department.details');

// admission guideline
Route::get('/admission-guidelines', [WebsiteController::class, 'tech_web_admission_guidelines'])->name('admission.guidelines');


//contact start
Route::post('/contact', [WebsiteSettingsController::class, 'tech_web_contact'])->name('contact');
//contact end

Auth::routes();

Route::get('/home', [HomeController::class, 'tech_web_index'])->name('home');
Route::get('admin/home', [HomeController::class, 'tech_web_adminHome'])->name('admin.home')->middleware('is_admin');

//gallery start
// Route::get('/add-gallery', [GalleryController::class, 'tech_web_add_gallery'])->name('add.gallery')->middleware('is_admin');
// Route::post('/store-gallery', [GalleryController::class, 'tech_web_store_gallery'])->name('store.gallery')->middleware('is_admin');
// Route::get('/edit-gallery/{id}', [GalleryController::class, 'tech_web_edit_gallery'])->name('edit.gallery')->middleware('is_admin');
// Route::post('/update-gallery', [GalleryController::class, 'tech_web_update_gallery'])->name('update.gallery')->middleware('is_admin');
//gallery end

//service start
Route::get('/add-services', [ServiceController::class, 'tech_web_add_services'])->name('add.services')->middleware('is_admin');
Route::post('/store-services', [ServiceController::class, 'tech_web_store_services'])->name('store.services')->middleware('is_admin');
Route::get('/edit-services/{id}', [ServiceController::class, 'tech_web_edit_services'])->name('edit.services')->middleware('is_admin');
Route::post('/update-services', [ServiceController::class, 'tech_web_update_services'])->name('update.services')->middleware('is_admin');
//service end

//about start
Route::get('/add-about', [AboutController::class, 'add_about'])->name('add.about')->middleware('is_admin');
Route::post('/store-about', [AboutController::class, 'store_about'])->name('store.about')->middleware('is_admin');
Route::get('/edit-about/{id}', [AboutController::class, 'edit_about'])->name('edit.about')->middleware('is_admin');
Route::post('/update-about', [AboutController::class, 'update_about'])->name('update.about')->middleware('is_admin');
//about end

//team start
Route::get('/add-team', [TeamController::class, 'tech_web_add_team'])->name('add.team')->middleware('is_admin');
Route::post('/store-team', [TeamController::class, 'tech_web_store_team'])->name('store.team')->middleware('is_admin');
Route::get('/edit-team/{id}', [TeamController::class, 'tech_web_edit_team'])->name('edit.team')->middleware('is_admin');
Route::post('/update-team', [TeamController::class, 'tech_web_update_team'])->name('update.team')->middleware('is_admin');
//team end
//team start
Route::get('/add-menu', [TeamController::class, 'tech_web_add_menu'])->name('add.menu')->middleware('is_admin');
Route::post('/store-menu', [TeamController::class, 'tech_web_store_menu'])->name('store.menu')->middleware('is_admin');
Route::get('/edit-menu/{id}', [TeamController::class, 'tech_web_edit_menu'])->name('edit.menu')->middleware('is_admin');
Route::post('/update-menu', [TeamController::class, 'tech_web_update_menu'])->name('update.menu')->middleware('is_admin');
//team end
//team start
Route::get('/add-sub-menu', [TeamController::class, 'tech_web_add_sub_menu'])->name('add.sub.menu')->middleware('is_admin');
Route::post('/store-sub-menu', [TeamController::class, 'tech_web_store_sub_menu'])->name('store.sub.menu')->middleware('is_admin');
Route::get('/edit-sub-menu/{id}', [TeamController::class, 'tech_web_edit_sub_menu'])->name('edit.sub.menu')->middleware('is_admin');
Route::post('/update-sub-menu', [TeamController::class, 'tech_web_update_sub_menu'])->name('update.sub.menu')->middleware('is_admin');
//team end

//testimonial start
Route::get('/add-testimonial', [TestimonialController::class, 'tech_web_add_testimonial'])->name('add.testimonial')->middleware('is_admin');
Route::post('/store-testimonial', [TestimonialController::class, 'tech_web_store_testimonial'])->name('store.testimonial')->middleware('is_admin');
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'tech_web_edit_testimonial'])->name('edit.testimonial')->middleware('is_admin');
Route::post('/update-testimonial', [TestimonialController::class, 'tech_web_update_testimonial'])->name('update.testimonial')->middleware('is_admin');
//testimonial end


//Blogs start
Route::get('/add-blogs', [BlogController::class, 'tech_web_add_blogs'])->name('add.blogs')->middleware('is_admin');
Route::post('/store-blogs', [BlogController::class, 'tech_web_store_blogs'])->name('store.blogs')->middleware('is_admin');
Route::get('/edit-blogs/{id}', [BlogController::class, 'tech_web_edit_blogs'])->name('edit.blogs')->middleware('is_admin');
Route::post('/update-blogs', [BlogController::class, 'tech_web_update_blogs'])->name('update.blogs')->middleware('is_admin');
//Blogs end

//Research start
Route::get('/add-research', [ResearchController::class, 'tech_web_add_research'])->name('add.research')->middleware('is_admin');
Route::post('/store-research', [ResearchController::class, 'tech_web_store_research'])->name('store.research')->middleware('is_admin');
Route::get('/edit-research/{id}', [ResearchController::class, 'tech_web_edit_research'])->name('edit.research')->middleware('is_admin');
Route::post('/update-research', [ResearchController::class, 'tech_web_update_research'])->name('update.research')->middleware('is_admin');
//Research end

//Consultancy start
Route::get('/add-consultancy', [ConsultancyController::class, 'tech_web_add_consultancy'])->name('add.consultancy')->middleware('is_admin');
Route::post('/store-consultancy', [ConsultancyController::class, 'tech_web_store_consultancy'])->name('store.consultancy')->middleware('is_admin');
//Consultancy end

//manage enrollment start
Route::get('/manage-enrollment', [WebsiteController::class, 'tech_web_manage_enrollment'])->name('mange.enrollment')->middleware('is_admin');
Route::get('/update-enrollment/{id}', [WebsiteController::class, 'tech_web_update_enrollment'])->name('update.enrollment')->middleware('is_admin');
Route::get('/download_enrollment/{id}', [WebsiteController::class, 'tech_web_download_enrollment'])->name('download.enrollment')->middleware('is_user');
Route::get('/enroll_certificate/{id}', [WebsiteController::class, 'tech_web_enroll_certificate'])->name('upload.enrollment.certificate')->middleware('is_admin');
Route::post('/store_enroll_certificate', [WebsiteController::class, 'tech_web_store_enroll_certificate'])->name('store.enrollment.certificate')->middleware('is_admin');
Route::get('/add_enrollment_info', [WebsiteController::class, 'tech_web_add_enrollment_info'])->name('add.enrollment.info')->middleware('is_admin');
Route::post('/store_enrollment_info', [WebsiteController::class, 'tech_web_store_enrollment_info'])->name('store.enrollmetn.info')->middleware('is_admin');
//manage enrollment end

//Result start
Route::get('/add_result', [ResultController::class, 'tech_web_add_result'])->name('add.result')->middleware('is_admin');
Route::post('/store_result', [ResultController::class, 'tech_web_store_result'])->name('store.result')->middleware('is_admin');
Route::get('/add_subject', [ResultController::class, 'tech_web_add_subject'])->name('add.subject')->middleware('is_admin');
Route::post('/store_subject', [ResultController::class, 'tech_web_store_subject'])->name('store.subject')->middleware('is_admin');
Route::get('/edit_subject/{id}', [ResultController::class, 'tech_web_edit_subject'])->name('edit.subject')->middleware('is_admin');
Route::post('/updae_subject', [ResultController::class, 'tech_web_update_subject'])->name('update.subject')->middleware('is_admin');
Route::get('/add_result_type', [ResultController::class, 'tech_web_add_result_type'])->name('add.result.type')->middleware('is_admin');
Route::post('/store_result_type', [ResultController::class, 'tech_web_store_result_type'])->name('store.result.type')->middleware('is_admin');
Route::get('/upload_result/{id}', [ResultController::class, 'tech_web_upload_result'])->name('upload.result')->middleware('is_admin');
Route::post('/store_uploaded_result', [ResultController::class, 'tech_web_store_uploaded_result'])->name('store.uploaded.result')->middleware('is_admin');
Route::get('/show_result/{id}', [ResultController::class, 'tech_web_show_result'])->name('show.result')->middleware('is_user');
//Result  end

//Notice start
Route::get('/add_notice', [NoticeController::class, 'tech_web_add_notice'])->name('add.notice')->middleware('is_admin');
Route::post('/store_notice', [NoticeController::class, 'tech_web_store_notice'])->name('store.notice')->middleware('is_admin');
Route::get('/edit_notice/{id}', [NoticeController::class, 'tech_web_edit_notice'])->name('edit.notice')->middleware('is_admin');
Route::post('/update_notice', [NoticeController::class, 'tech_web_update_notice'])->name('update.notice')->middleware('is_admin');
Route::get('/notice_details/{id}', [NoticeController::class, 'tech_web_notice_details'])->name('notice.details');
//Notice  end



//language start
Route::get('/english_language', [LanguageController::class, 'tech_web_english_language'])->name('english.language');
Route::get('/bangla_language', [LanguageController::class, 'tech_web_bangla_language'])->name('bangla.language');
Route::get('/arabic_language', [LanguageController::class, 'tech_web_arabic_language'])->name('arabic.language');

//language  end



//Banner and Tile
Route::post('/store-banner-title', [BannerAndTitleController::class, 'tech_web_store_banner_tile'])->name('store.banner.title')->middleware('is_admin');
Route::get('/edit-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_edit_banner_tile'])->name('edit.banner.title')->middleware('is_admin');
Route::post('/update-banner-title', [BannerAndTitleController::class, 'tech_web_update_banner_tile'])->name('update.banner.title')->middleware('is_admin');
//Banner and title

//Logo start
Route::post('/store-logo', [WebsiteSettingsController::class, 'tech_web_store_logo'])->name('store.logo')->middleware('is_admin');
//Logo end

//links start
Route::post('/store-links', [WebsiteSettingsController::class, 'tech_web_store_links'])->name('store.links')->middleware('is_admin');
//Links end


//payment numbers start
Route::post('/store-number', [WebsiteSettingsController::class, 'tech_web_store_numbers'])->name('store.numbers')->middleware('is_admin');
//payment numbers end

//footer start
Route::post('/store-footer', [WebsiteSettingsController::class, 'tech_web_store_footer'])->name('store.footer')->middleware('is_admin');

//footer end

//banner start
Route::post('/store-main-banner', [WebsiteSettingsController::class, 'tech_web_store_main_banner'])->name('store.main.banner')->middleware('is_admin');
Route::get('/edit-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_edit_main_banner'])->name('edit.main.banner')->middleware('is_admin');
Route::post('/update-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_update_main_banner'])->name('update.main.banner')->middleware('is_admin');
//banner end




//general settings start
Route::get('/general-settings', [GeneralController::class, 'tech_web_general_settings'])->name('general.settings')->middleware('is_admin');
//general settings end


//profile settings start
Route::get('/profile-settings', [GeneralController::class, 'tech_web_profile_settings'])->name('profile.settings')->middleware('is_admin');
Route::post('/update-profile', [GeneralController::class, 'tech_web_update_profile'])->name('update.profile')->middleware('is_admin');
//profile settings end

// ------------------------------------------donate all route -----------------------------------//
Route::get('/about_menu', [AboutController::class, 'tech_web_about_menu'])->name('about.menu');


//language start
Route::get('/english_language', [LanguageController::class, 'tech_web_english_language'])->name('english.language');
Route::get('/bangla_language', [LanguageController::class, 'tech_web_bangla_language'])->name('bangla.language');
//language  end

//donate settings start
Route::get('/add_donate_data', [DonateController::class, 'tech_web_add_donate_data'])->name('add.donate.data')->middleware('is_admin');
Route::get('/donate_payment_data', [DonateController::class, 'tech_web_add_donate_payment_data'])->name('donate.payment.data')->middleware('is_admin');
Route::post('/store_donate_data', [DonateController::class, 'tech_web_store_donate_data'])->name('store.donation.data')->middleware('is_admin');
Route::get('/edit_donate_data/{id}', [DonateController::class, 'tech_web_edit_donate_data'])->name('edit.donate.data')->middleware('is_admin');
Route::get('/delete_donate_data/{id}', [DonateController::class, 'tech_web_delete_donate_data'])->name('delete.donate.data')->middleware('is_admin');
Route::post('/updae_donate_data', [DonateController::class, 'tech_web_update_donate_data'])->name('update.donation.data')->middleware('is_admin');
Route::get('/donation/{id}', [DonateController::class, 'tech_web_donation'])->name('donation');
Route::get('/all_donation', [DonateController::class, 'tech_web_all_donation'])->name('all.donation');
Route::post('/donation_payment', [DonateController::class, 'tech_web_donation_payment'])->name('donation.payment');
Route::get('/donation-success/{id}', [DonateController::class, 'tech_web_donation_success'])->name('success.donation');

//donate settings end

//project settings start
Route::get('/add_project_data', [ProjectController::class, 'tech_web_add_project_data'])->name('add.project.data')->middleware('is_admin');
Route::post('/store_project_data', [ProjectController::class, 'tech_web_store_project_data'])->name('store.project.data')->middleware('is_admin');
Route::get('/edit_project_data/{id}', [ProjectController::class, 'tech_web_edit_project_data'])->name('edit.project.data')->middleware('is_admin');
Route::post('/update_project_data', [ProjectController::class, 'tech_web_update_project_data'])->name('update.project.data')->middleware('is_admin');
Route::get('/project_details/{id}', [ProjectController::class, 'tech_web_project_details'])->name('project.details');
//project settings end add.upcoming.project

//upcoming project settings start
Route::get('/add_upcoming_project', [ProjectController::class, 'tech_web_add_upcoming_project'])->name('add.upcoming.project')->middleware('is_admin');
Route::post('/store_upcoming_project', [ProjectController::class, 'tech_web_store_upcoming_project'])->name('store.upcoming.project')->middleware('is_admin');
Route::get('/edit_upcome_porject/{id}', [ProjectController::class, 'tech_web_edit_upcome_porject'])->name('edit.upcome.porject')->middleware('is_admin');
Route::post('/update_upcome_project', [ProjectController::class, 'tech_web_update_upcome_project'])->name('update.upcome.project')->middleware('is_admin');
Route::get('/upcoming_project_details/{id}', [ProjectController::class, 'tech_web_upcome_project_details'])->name('upcoming.project.details');
//upcoming project settings end


//image gallery start
Route::get('/add-gallery', [GalleryController::class, 'tech_web_add_gallery'])->name('add.gallery')->middleware('is_admin');
Route::post('/store-gallery', [GalleryController::class, 'tech_web_store_gallery'])->name('store.gallery')->middleware('is_admin');
Route::get('/edit-gallery/{id}', [GalleryController::class, 'tech_web_edit_gallery'])->name('edit.gallery')->middleware('is_admin');
Route::post('/update-gallery', [GalleryController::class, 'tech_web_update_gallery'])->name('update.gallery')->middleware('is_admin');
Route::get('/gallery-page', [GalleryController::class, 'tech_web_gallery'])->name('gallery.page');
//image gallery end

//video gallery start
Route::get('/add_video_gallery', [GalleryController::class, 'tech_web_add_video_gallery'])->name('add.video.gallery')->middleware('is_admin');
Route::post('/store_video_gallery', [GalleryController::class, 'tech_web_store_video_gallery'])->name('store.video.gallery')->middleware('is_admin');
Route::get('/edit_video_gallery/{id}', [GalleryController::class, 'tech_web_edit_video_gallery'])->name('edit.video.gallery')->middleware('is_admin');
Route::post('/update_video_gallery', [GalleryController::class, 'tech_web_update_video_gallery'])->name('update.video.gallery')->middleware('is_admin');
Route::get('/video-gallery-page', [GalleryController::class, 'tech_web_video_gallery'])->name('video.gallery');
//video gallery end

//activities start
Route::get('/add_activities', [ActivityController::class, 'tech_web_add_activities'])->name('add.activities')->middleware('is_admin');
Route::post('/store_activities', [ActivityController::class, 'tech_web_store_activities'])->name('store.activities')->middleware('is_admin');
Route::get('/edit_activities/{id}', [ActivityController::class, 'tech_web_edit_activities'])->name('edit.activities')->middleware('is_admin');
Route::post('/update_activities', [ActivityController::class, 'tech_web_update_activities'])->name('update.activities')->middleware('is_admin');
Route::get('/all_activies/{id}', [ActivityController::class, 'tech_web_all_activies'])->name('all.activies');
Route::get('/all_activism', [ActivityController::class, 'tech_web_all_activism'])->name('all.activism');
//activities end

//counter start
Route::get('/add_counter', [CounterController::class, 'tech_web_add_counter'])->name('add.counter')->middleware('is_admin');
Route::post('/store_counter', [CounterController::class, 'tech_web_store_counter'])->name('store.counter')->middleware('is_admin');
//counter  end

//partners start
Route::get('/add_partners', [PartnerController::class, 'tech_web_add_partner'])->name('add.partners')->middleware('is_admin');
Route::post('/store_partner', [PartnerController::class, 'tech_web_store_partner'])->name('store.partner')->middleware('is_admin');
Route::get('/edit_partner/{id}', [PartnerController::class, 'tech_web_edit_partner'])->name('edit.partner')->middleware('is_admin');
Route::post('/update_partner', [PartnerController::class, 'tech_web_update_partner'])->name('update.partner')->middleware('is_admin');

//partners  end

//partners start
Route::get('/blog_page', [BlogController::class, 'tech_web_blogs_page'])->name('blog.page');
Route::get('/blogs-details/{id}', [BlogController::class, 'tech_web_blogs_details'])->name('blogs.details');
//partners  end volunteer.form

//volunteer form start
Route::get('/volunteer_form', [VolunteerFromController::class, 'tech_web_volunteer_form'])->name('volunteer.form');
Route::post('/store_volunteer_data', [VolunteerFromController::class, 'tech_web_store_volunteer_data'])->name('store.volunteer.data');
Route::get('/volunteer_list', [VolunteerFromController::class, 'tech_web_volunteer_list'])->name('volunteer.list')->middleware('is_admin');
//partners  end lifetime.member

//volunteer form start
Route::get('/lifetime_member', [LifeTimeMemberController::class, 'tech_web_lifetime_member'])->name('lifetime.member');
Route::post('/store_member', [LifeTimeMemberController::class, 'tech_web_store_member'])->name('store.member')->middleware('is_admin');
Route::get('/membership', [LifeTimeMemberController::class, 'tech_web_membership'])->name('membership');
Route::post('/store_membership_form', [LifeTimeMemberController::class, 'tech_web_store_membership_form'])->name('store.membership.form');
Route::get('/member_list', [LifeTimeMemberController::class, 'tech_web_member_list'])->name('member.list');

// subscriber
Route::get('/subscribe-list', [SubcribeController::class, 'SubscribeList'])->name('subscribe.list')->middleware('is_admin');

//partners  end lifetime.member


// Audio Category Route
Route::resource('categories', CategoryController::class)->middleware('is_admin');

//department
Route::resource('department', DepartmentController::class)->middleware('is_admin');


// Audio Subcategory Route
Route::resource('subcategories', SubcategoryController::class)->middleware('is_admin');

//Axios Call For Subcategories
Route::get('get-subcategories/{category_id}', [AudioController::class, 'getSubcategory']);

// Audio Route
Route::resource('audios', AudioController::class)->middleware('is_admin');

// Book Category Route
Route::resource('bookcategories', BookCategoryController::class)->middleware('is_admin');

// Book Subcategory Route
Route::resource('booksubcategories', BookSubcategoryController::class)->middleware('is_admin');

//Axios Call For Subcategories
Route::get('get-booksubcategories/{category_id}', [BookController::class, 'getBookSubcategory']);
// Book Route
Route::resource('books', BookController::class)->middleware('is_admin');

// Tv Category Route
Route::resource('tvcategories', TvCategoryController::class)->middleware('is_admin');

// Tv Subcategory Route
Route::resource('tvsubcategories', TvSubcategoryController::class)->middleware('is_admin');

//Axios Call For Subcategories
Route::get('get-tvsubcategories/{category_id}', [TvController::class, 'getTvSubcategory']);
// Tv Route
Route::resource('tvs', TvController::class)->middleware('is_admin');




// Subscription Route
Route::get('/subscribe', [SubscriptionController::class, 'showForm'])->name('showSubscribeForm');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/confirm/{token}', [SubscriptionController::class, 'confirmSubscription'])->name('confirmSubscription');

// Admission Management Routes
Route::resource('admin/admission-guidelines', AdmissionGuidelineController::class, ['names' => 'admission-guidelines'])->middleware('is_admin');

