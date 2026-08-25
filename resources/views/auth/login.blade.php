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
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6"
        data-bg-img="{{ asset('frontend/images/bg/bg2.jpg') }}">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28 text-white">
                            @if (session()->get('language') == 'bangla')
                                প্রবেশ করুন
                            @elseif (session()->get('language') == 'arabic')
                                تسجيل الدخول
                            @else
                                Login
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
                                        প্রবেশ করুন
                                    @elseif (session()->get('language') == 'arabic')
                                        تسجيل الدخول
                                    @else
                                        Login
                                    @endif
                                </li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- My Account Section Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3 custom_card">
                    <h2 class="text-gray mt-0 pt-5">
                        @if (session()->get('language') == 'bangla')
                            প্রবেশ করুন
                        @elseif (session()->get('language') == 'arabic')
                            تسجيل الدخول
                        @else
                            Login
                        @endif
                    </h2>
                    <form method="POST" action="{{ route('login') }}" class="clearfix">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_username_email">
                                    @if (session()->get('language') == 'bangla')
                                        ব্যবহারকারীর নাম/ইমেল
                                    @elseif (session()->get('language') == 'arabic')
                                        اسم المستخدم/البريد الإلكتروني
                                    @else
                                        Username/Email
                                    @endif
                                </label>
                                <input type="email" id="email" name="email"
                                    placeholder="@if (session()->get('language') == 'bangla') ব্যবহারকারীর নাম/ইমেল
                              @elseif (session()->get('language') == 'arabic')
اسم المستخدم/البريد الإلكتروني 
                              @else Username/Email @endif"
                                    class="form-control @error('email') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_password">
                                    @if (session()->get('language') == 'bangla')
                                        পাসওয়ার্ড
                                    @elseif (session()->get('language') == 'arabic')
                                        كلمة المرور
                                    @else
                                        Password
                                    @endif
                                </label>
                                <input id="password" type="password"
                                    placeholder="@if (session()->get('language') == 'bangla') পাসওয়ার্ড @elseif (session()->get('language') == 'arabic') كلمة المرور @else password @endif"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn_custom">
                            @if (session()->get('language') == 'bangla')
                                প্রবেশ করুন
                            @elseif (session()->get('language') == 'arabic')
                                تسجيل الدخول
                            @else
                                Login
                            @endif
                        </button>
                        <div class="last-password">
                          @if (session()->get('language') == 'bangla')
                          নিবন্ধিত নন? <a href="{{ route('register') }}">একটি অ্যাকাউন্ট তৈরি করুন</a>
                      @elseif (session()->get('language') == 'arabic')
                          لم تسجل بعد؟ <a href="{{ route('register') }}">أنشئ حسابًا</a>
                      @else
                          Not registered? <a href="{{ route('register') }}" style="color: #29b54e;">Create an account</a>
                      @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Section End -->
@endsection
