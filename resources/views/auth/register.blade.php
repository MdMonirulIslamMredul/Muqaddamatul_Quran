@extends('frontend.master')
@push('frontend_style')
    <style>
        .custom_card {
            padding: 40px;
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
@endpush
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-6"
            data-bg-img="{{ asset('frontend/images/bg/bg2.jpg') }}">
            <div class="container pt-60 pb-60">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="font-28 text-white">
                                @if (session()->get('language') == 'bangla')
                                    নিবন্ধন
                                @elseif (session()->get('language') == 'arabic')
                                    تسجيل
                                @else
                                    Register
                                @endif
                                </h2>
                                <ol class="breadcrumb text-center text-black mt-10">
                                    <li><a href="{{ url('/') }}">
                                            @if (session()->get('language') == 'bangla')
                                                হোম
                                            @elseif (session()->get('language') == 'arabic')
                                                بيت
                                            @else
                                                Home
                                            @endif
                                        </a></li>
                                    <li class="active text-theme-colored">
                                        @if (session()->get('language') == 'bangla')
                                            নিবন্ধন
                                        @elseif (session()->get('language') == 'arabic')
                                            تسجيل
                                        @else
                                            Register
                                        @endif
                                    </li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumbs End -->

        <!-- Register Section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3 custom_card">
                        <h2 class="text-gray mt-0 pt-5">
                            @if (session()->get('language') == 'bangla')
                                নতুন অ্যাকাউন্ট তৈরি করুন
                            @elseif(session()->get('language') == 'arabic')
                                إنشاء حساب جديد
                            @else
                                Create New Account
                            @endif
                        </h2>
                        <form method="POST" action="{{ route('register') }}" class="clearfix">
                            @csrf
                            <div class="row">
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 mb-25">
                                    <input id="name" type="text" name="name" class="form-control" type="text"
                                        placeholder="@if (session()->get('language') == 'bangla') ব্যবহারকারীর নাম
                                    @elseif(session()->get('language') == 'arabic')اسم المستخدم
                                    @else Username @endif"
                                        required>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="email" type="email" name="email" class="form-control" type="text"
                                        placeholder="@if (session()->get('language') == 'bangla') ইমেল
                                    @elseif(session()->get('language') == 'arabic')البريد الإلكتروني
                                    @else Email @endif"
                                        required>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="pwd" name="password" class="form-control"
                                        placeholder="@if (session()->get('language') == 'bangla') পাসওয়ার্ড
                                    @elseif(session()->get('language') == 'arabic')كلمة المرور
                                    @else Password @endif"
                                        type="password">
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-12">
                                    <input id="pwd_2" class="form-control" name="password_confirmation"
                                        placeholder="@if (session()->get('language') == 'bangla') পাসওয়ার্ড নিশ্চিত করুন
                                    @elseif(session()->get('language') == 'arabic')تأكيد كلمة المرور
                                    @else Confirm Password @endif"
                                        type="password">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn_custom"><span class="txt">
                                            @if (session()->get('language') == 'bangla')
                                                নিবন্ধন করুন
                                            @elseif(session()->get('language') == 'arabic')
                                                سجل
                                            @else
                                                Sign Up
                                            @endif
                                        </span></button>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="users">
                                        @if (session()->get('language') == 'bangla')
                                            ইতিমধ্যে একটি সদস্যপদ আছে?
                                        @elseif(session()->get('language') == 'arabic')
                                            لديك حساب بالفعل؟
                                        @else
                                            Already have an account?
                                        @endif
                                        <a href="{{ route('login') }}" style="color: #29b54e;">
                                            @if (session()->get('language') == 'bangla')
                                                লগইন করুন
                                            @elseif(session()->get('language') == 'arabic')
                                                تسجيل الدخول
                                            @else
                                                Sign In
                                            @endif
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Section -->

    </div>
    <!-- Main content End -->
@endsection
