@extends('frontend.master')

@section('content')
    <style>
        .member-form {

            background-color: #F5F5F5;
            padding: 50px 40px;
            border-radius: 5px;
            border: 2px solid #F5F5F5
        }

        input[type=text] {
            border-radius: 3px;
        }
    </style>


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="{{ asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                সদস্যপদ
                            @elseif (session()->get('language') == 'arabic')
                                عضوية
                            @else
                                Membership
                            @endif
                        </h3>
                        <ul class="breadcrumb white">
                            <li><a href="{{ url('/') }}">
                                @if (session()->get('language') == 'bangla')
                                    হোম
                                @elseif (session()->get('language') == 'arabic')
                                    بيت
                                @else
                                    Home
                                @endif
                            </a></li>
                            <li class="active">
                                @if (session()->get('language') == 'bangla')
                                    সদস্যপদ
                                @elseif (session()->get('language') == 'arabic')
                                    عضوية
                                @else
                                    Membership
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Featured Campaign -->
    <section>

        <div class="container pb-30">
            <div class="section-content">
                <div class="row">
                    <div class="col-12 col-md-6" st>
                        <div class="card">
                            {!! $membership->video_link !!}
                        </div>
                        <div class="card">
                            <h3 style="text-align: center">
                                @if (session()->get('language') == 'bangla')
                                    {{ $membership->title_bangla }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $membership->title_ab }}
                                @else
                                    {{ $membership->title }}
                                @endif
                            </h3>
                            <p>
                                @if (session()->get('language') == 'bangla')
                                    {!! $membership->long_des_bangla1 !!}
                                @elseif (session()->get('language') == 'arabic')
                                    {!! $membership->long_des_ab1 !!}
                                @else
                                    {!! $membership->long_des_eng1 !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card" style="margin-left: 10px;backgorund-color:grey">
                            <h2 style="text-align: center">
                                @if (session()->get('language') == 'bangla')
                                    সদস্য কল
                                @elseif (session()->get('language') == 'arabic')
                                    دعوة الأعضاء
                                @else
                                    Member Call
                                @endif
                            </h2>
                            @if (session()->get('language') == 'bangla')
                                {!! $membership->long_des_bangla2 !!}
                            @elseif (session()->get('language') == 'arabic')
                                {!! $membership->long_des_ab2 !!}
                            @else
                                {!! $membership->long_des_eng2 !!}
                            @endif
                        </div>
                        <div class="card member-form">
                            <div class="" style="">
                                <h3 style="text-align: center">
                                    @if (session()->get('language') == 'bangla')
                                        আবেদনপত্র
                                    @elseif (session()->get('language') == 'arabic')
                                        نموذج الطلب
                                    @else
                                        Applicatio Form
                                    @endif
                                </h3>
                                <form class="form-horizontal" action="{{ route('store.membership.form') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">
                                            @if (session()->get('language') == 'bangla')
                                                সদস্যের ধরন
                                            @elseif (session()->get('language') == 'arabic')
                                                نوع العضو
                                            @else
                                                Member Type
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="memter_type" name="memter_type"
                                            placeholder="@if (session()->get('language') == 'bangla') আজীবন সদস্য/দাতা সদস্য
                                            @elseif (session()->get('language') == 'arabic')
عضو مدى الحياة / عضو دونر
                                            @else Life time member/Doner member @endif
                                            "
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">
                                            @if (session()->get('language') == 'bangla')
                                                নাম
                                            @elseif (session()->get('language') == 'arabic')
                                                اسم
                                            @else
                                                Name
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="@if (session()->get('language') == 'bangla') নাম
                                        @elseif (session()->get('language') == 'arabic')اسم
                                        @else Name @endif"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">
                                            @if (session()->get('language') == 'bangla')
                                                বাবার নাম
                                            @elseif (session()->get('language') == 'arabic')
                                                اسم الاب
                                            @else
                                                Fathers Name
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" name="father_name" id="father_name"
                                            placeholder="@if (session()->get('language') == 'bangla') বাবার নাম
                                            @elseif (session()->get('language') == 'arabic')اسم الاب
                                            @else Fathers Name @endif"
                                            required>
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
                                            placeholder="@if (session()->get('language') == 'bangla') ফোন নম্বর
                                        @elseif (session()->get('language') == 'arabic')رقم التليفون
                                        @else Phone Number @endif"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="profession">
                                            @if (session()->get('language') == 'bangla')
                                                পেশা
                                            @elseif (session()->get('language') == 'arabic')
                                                إشغال
                                            @else
                                                Occupation
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" name="profession" id="profession"
                                            placeholder="@if (session()->get('language') == 'bangla') পেশা
                                            @elseif (session()->get('language') == 'arabic')إشغال
                                            @else Occupation @endif"
                                            required>
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
                                            placeholder="@if (session()->get('language') == 'bangla') ইমেইল ঠিকানা
                                        @elseif (session()->get('language') == 'arabic')
عنوان البريد الإلكتروني
                                        @else Email Address @endif"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_id_link">
                                            @if (session()->get('language') == 'bangla')
                                                রেফারেন্স
                                            @elseif (session()->get('language') == 'arabic')
                                                مرجع
                                            @else
                                                Reference
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="reference" name="reference"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">
                                            @if (session()->get('language') == 'bangla')
                                                ঠিকানা
                                            @elseif (session()->get('language') == 'arabic')
                                                عنوان
                                            @else
                                                Address
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="@if (session()->get('language') == 'bangla') জেলা/উপজেলা
                                        @elseif (session()->get('language') == 'arabic') المنطقة/أوبازيلا         
                                        @else District/UpaZilla @endif"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method">
                                            @if (session()->get('language') == 'bangla')
                                                ডোনার পেমেন্ট পদ্ধতি
                                            @elseif (session()->get('language') == 'arabic')
                                                طريقة دفع المتبرع
                                            @else
                                                Doner Payment Method
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="payment_method" name="payment_method"
                                            placeholder="@if (session()->get('language') == 'bangla')ডোনার পেমেন্ট পদ্ধতি
                                            @elseif (session()->get('language') == 'arabic')
طريقة دفع المتبرع
                                            @else Doner Payment Method
                                            @endif" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn_custom" style="width: 100%; border: none">@if (session()->get('language') == 'bangla')সাবমিট
                                            @elseif (session()->get('language') == 'arabic')  يُقدِّم         
                                            @else Submit
                                            @endif</button>

                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <section class="container pb-60 pt-60" style="background-color: #F5F5F5">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <form action="" method="">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">Donation Amount</div>
                        <div class="col-md-9"><input type="text" class="form-control" name="amount" placeholder="Donation-amount"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">Doner Name</div>
                        <div class="col-md-9"><input type="text" class="form-control" name="dname" placeholder="Donaer Name"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">Doner Email/Phone</div>
                        <div class="col-md-9"><input type="text" class="form-control" name="demail" placeholder="Donner Email/Phone"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">Payment Gatway</div>
                        <div class="col-md-9"><input type="text" class="form-control" name="gatway" placeholder="SSL Commerz"></div>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">

        </div>
    </div>

  </section> --}}
@endsection
