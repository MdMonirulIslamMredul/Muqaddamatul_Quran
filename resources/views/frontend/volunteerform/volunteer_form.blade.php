@extends('frontend.master')
@push('frontend_style')
    <style>
        .custom_card {
            padding: 40px;
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
@endpush
@section('title')
    Projects
@endsection
@section('content')
    <section>
        <h2 class="pt-10 pb-10" style="text-align:center;background-color:#008E48;padding:0 5px;color:white;">
            @if (session()->get('language') == 'bangla')
                স্বেচ্ছাসেবক নিবন্ধন ফর্ম
            @elseif (session()->get('language') == 'arabic')
                نموذج تسجيل المتطوعين
            @else
                Volunteer Registration Form
            @endif
        </h2>

     

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('store.volunteer.data') }}" enctype="multipart/form-data"
                        class="custom_card">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        @if (session()->get('language') == 'bangla')
                                            নাম
                                        @elseif (session()->get('language') == 'arabic')
                                            اسم
                                        @else
                                            Name
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="@if (session()->get('language') == 'bangla')নাম @elseif (session()->get('language') == 'arabic') اسم@else Name @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">
                                        @if (session()->get('language') == 'bangla')
                                        ফোন নম্বর
                                        @elseif (session()->get('language') == 'arabic')
                                        رقم التليفون
                                        @else
                                        Phone Number
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                        placeholder="@if (session()->get('language') == 'bangla')ফোন নম্বর @elseif (session()->get('language') == 'arabic') رقم التليفون@else Phone Number @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">
                                        @if (session()->get('language') == 'bangla')
                                        জরুরী ফোন নম্বর
                                        @elseif (session()->get('language') == 'arabic')
                                        رقم هاتف الطوارئ
                                        @else
                                        Emergency Phone Number
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" id="emergency_phone_number"
                                        name="emergency_phone_number" placeholder="@if (session()->get('language') == 'bangla')জরুরী ফোন নম্বর @elseif (session()->get('language') == 'arabic') رقم هاتف الطوارئ @else Emergency Phone Number @endif">
                                </div>
                                <div class="form-group">
                                    <label for="email_address">
                                        @if (session()->get('language') == 'bangla')
                                        ইমেইল ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')
                                        عنوان البريد الإلكتروني
                                        @else
                                        Email Address
                                        @endif
                                        </label>
                                    <input type="email" class="form-control" name="email_address" id="email_address"
                                        placeholder="@if (session()->get('language') == 'bangla')ইমেইল ঠিকানা @elseif (session()->get('language') == 'arabic') عنوان البريد الإلكتروني @else Email Address @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="facebook_id_link">
                                        @if (session()->get('language') == 'bangla')
                                        ফেসবুক আইডি লিংক
                                        @elseif (session()->get('language') == 'arabic')
                                        رابط معرف الفيسبوك
                                        @else
                                        Facebook ID Link
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" id="facebook_id_link" name="facebook_id_link"
                                        placeholder="@if (session()->get('language') == 'bangla')ফেসবুক আইডি লিংক @elseif (session()->get('language') == 'arabic') رابط معرف الفيسبوك @else Facebook ID Link @endif">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">
                                        @if (session()->get('language') == 'bangla')
                                        এনআইডি নম্বর
                                        @elseif (session()->get('language') == 'arabic')
                                        رقم الهوية الوطنية
                                        @else
                                        NID Number
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="nid_number" id="nid_number"
                                        placeholder="@if (session()->get('language') == 'bangla')এনআইডি নম্বর @elseif (session()->get('language') == 'arabic') رقم الهوية الوطنية @else NID Number @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="education_qualifiction">
                                        @if (session()->get('language') == 'bangla')
                                        শিক্ষাগত যোগ্যতা
                                        @elseif (session()->get('language') == 'arabic')
                                        المؤهل العلمي
                                        @else
                                        Educational Qualification
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" id="education_qualifiction"
                                        name="education_qualifiction" placeholder="@if (session()->get('language') == 'bangla')শিক্ষাগত যোগ্যতা @elseif (session()->get('language') == 'arabic') المؤهل العلمي @else Educational Qualification @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="profession">
                                        @if (session()->get('language') == 'bangla')
                                        পেশা
                                        @elseif (session()->get('language') == 'arabic')مهنة
                                        @else
                                        Profession
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="profession" id="profession"
                                        placeholder="@if (session()->get('language') == 'bangla')পেশা
                                        @elseif (session()->get('language') == 'arabic')مهنة
                                        @else Profession
                                        @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="institute_name">
                                        @if (session()->get('language') == 'bangla')
                                        প্রতিষ্ঠানের নাম
                                        @elseif (session()->get('language') == 'arabic')اسم المعهد
                                        @else
                                        Institute Name
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="institute_name" id="institute_name"
                                        placeholder="@if (session()->get('language') == 'bangla')প্রতিষ্ঠানের নাম
                                        @elseif (session()->get('language') == 'arabic')اسم المعهد
                                        @else Institute Name
                                        @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteer_sector">
                                        @if (session()->get('language') == 'bangla')
                                        সারসংক্ষেপ
                                        @elseif (session()->get('language') == 'arabic') ملخص
                                        @else
                                        Summary
                                        @endif
                                        </label>
                                    <textarea class="form-control" name="summery" id="summery" cols="30" rows="5"
                                        placeholder="@if (session()->get('language') == 'bangla')আপনার নিজের কথা লিখুন @elseif (session()->get('language') == 'arabic') اكتب كلماتك الخاصة @else Write your own words @endif"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="volunteer_sector">
                                        @if (session()->get('language') == 'bangla')
                                        জন্য স্বেচ্ছাসেবক
                                        @elseif (session()->get('language') == 'arabic') متطوع ل
                                        @else
                                        Volunteer For
                                        @endif
                                        </label>
                                    <textarea class="form-control" name="volunteer_section" id="volunteer_section" cols="30" rows="5"
                                        placeholder="@if (session()->get('language') == 'bangla')রান্না করা, শেখানো, উদ্ধার করা @elseif (session()->get('language') == 'arabic') الطبخ،التدريس،الإنقاذ @else Cooking,Teach,Rescuing @endif"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="skill">
                                        @if (session()->get('language') == 'bangla')
                                        বিশেষ দক্ষতা
                                        @elseif (session()->get('language') == 'arabic') مهارة خاصة
                                        @else
                                        Special Skill
                                        @endif
                                        </label>
                                    <textarea class="form-control" name="skill" id="skill" cols="30" rows="5"
                                        placeholder="@if (session()->get('language') == 'bangla')অ্যাকাউন্টিং, চিকিৎসা, চিকিৎসা
                                        @elseif (session()->get('language') == 'arabic') المحاسبة،الطب،العلاج
                                        @else Accounting,Medical,Treatment
                                        @endif"></textarea>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">
                                        @if (session()->get('language') == 'bangla')
                                        স্থায়ী ঠিকানা
                                        @elseif (session()->get('language') == 'arabic') العنوان الثابت
                                        @else
                                        Permanent Address
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="permanent_discrict"
                                        id="permanent_discrict" placeholder="@if (session()->get('language') == 'bangla')জেলা/উপজেলা
                                        @elseif (session()->get('language') == 'arabic') المنطقة/أوبازيلا
                                        @else District/UpaZilla
                                        @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">
                                        @if (session()->get('language') == 'bangla')
                                        ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')  عنوان
                                        @else
                                        Address
                                        @endif
                                        </label>
                                    <textarea class="form-control" name="permanent_tikana" id="permanent_tikana" cols="30" rows="5"
                                        placeholder="@if (session()->get('language') == 'bangla')ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')  عنوان
                                        @else Address
                                        @endif"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">
                                        @if (session()->get('language') == 'bangla')
                                        বর্তমান ঠিকানা
                                        @elseif (session()->get('language') == 'arabic') العنوان الحالي
                                        @else
                                        Present Address
                                        @endif
                                        </label>
                                    <input type="text" class="form-control" name="present_discrict"
                                        id="present_discrict" placeholder="@if (session()->get('language') == 'bangla')জেলা/উপজেলা
                                        @elseif (session()->get('language') == 'arabic') المنطقة/أوبازيلا
                                        @else District/UpaZilla
                                        @endif" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">@if (session()->get('language') == 'bangla')
                                        ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')  عنوان
                                        @else
                                        Address
                                        @endif</label>
                                    <textarea class="form-control" name="present_tikana" id="present_tikana" cols="30" rows="5"
                                        placeholder="@if (session()->get('language') == 'bangla')ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')  عنوان
                                        @else Address
                                        @endif"></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn_custom" style="width: 100%; border: none">@if (session()->get('language') == 'bangla')সাবমিট
                                @elseif (session()->get('language') == 'arabic')  يُقدِّم
                                @else Submit
                                @endif </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
