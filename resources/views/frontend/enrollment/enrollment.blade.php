@extends('frontend.master')
@section('title')
   Enrollment
@endsection
@section('content')
<!-- Main content Start -->
 <div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay certificate-form">
        <div class="breadcrumbs-img">

            <img src="{{asset($service->banner_image)}}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Course Enrollment</h1>
            <ul>
                <li>
                    <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                </li>
                <li>Course Enrollment</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Shop Single Start -->
    {{-- <div id="rs-single-shop" class="rs-single-shop shop-rp orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 sm-mb-30">
                    <div class="single-product-image">
                        <div class="images-single">
                            <img src="{{asset($service->main_image)}}" alt="Single Product">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="single-price-info pl-30">
                        <h4 class="product-title">{{$service->service_title}}</h4>
                        <span class="single-price">${{$service->price}}</span>
                        <p class="some-text">{!! $service->service_details_small !!}</p>
                        <h4>Payment Numbers</h4>
                        <div class="row mb-4">

                            <div class="col-12 col-md-6 col-lg-4">
                                <div style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 10px; border-radius: 5px">
                                <h5 class="mb-2">Bkash</h5>
                                <span>{{$numbers->bkash??null}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 10px; border-radius: 5px">
                                <h5 class="mb-2">Nagad</h5>
                                <span>{{$numbers->nagad??null}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 10px; border-radius: 5px">
                                <h5 class="mb-2">Rocket</h5>
                                <span>{{$numbers->rocket??null}}</span>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('enroll')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="service_id" value="{{$service->id}}">

                            <div class="my-3">
                                <lable>Payment Type</lable>
                                <br>
                                <select name="payment_type" class="form-control" id="">
                                    <option selected disabled>Select payment type</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="rocket">Rocket</option>
                                </select>
                            </div>
                            <div class="my-3">
                                <lable>Phone Number</lable>
                                <input type="text" name="number" class="form-control w-100">
                            </div>
                            <div class="my-3">
                                <lable>Transaction ID</lable>
                                <input type="text" name="transaction_id" class="form-control w-100">
                            </div>
                            <button class="btn-shop orange-color my-4" type="submit">Enroll</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div> --}}

    {{-- <style>
        .image{
            margin-top: 61px;
            margin-bottom: 90px;

            margin-right: 70px;
            outline: none;
        }

    </style> --}}

    @include('frontend.enrollment.style_application')
    <div id="content">
        <div class="container print-p-0 my-5">
            <!-- Form -->
            <div class="card print-card shadow print-shadow-0 print-m-0 d-print-none application-form">
                <div class="card-body print-p-0">

                    <div class="row m-5 print-m-0">
                        <div class="col-12 bangla-font">
                            <form class="bv-validate-form form-center hide-success font-14 bv-form" method="POST"
                                action="{{ route('store.enrollment.form.data') }}" enctype="multipart/form-data">
                                {{-- @dd($service); --}}

                                @csrf

                                <input type="hidden" name="sanad_id" value="">
                                <input type="hidden" name="tracking_no" value="">
                                <input type="hidden" name="status" value="pending">
                                <input type="hidden" name="union_id" value="">

                                <input type="hidden" name="applied_union_no" value="">
                                <input type="hidden" name="applied_upazilla_name" value="">
                                <input type="hidden" name="applied_zilla_name" value="">
                                <input type="hidden" name="applied_chairman_name" value="">
                                <input type="hidden" name="applied_union_id" value="">


                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-10 col-xxl-8">

                                        <!-- Form Header start -->

                                            <div class="col-12 col-md-12">
                                                <div class="form-header text-center py-3 my-0" style="position: relative;">
                                                    <p style="margin-bottom: 10px;font-size:20px">বিসমিল্লাহির রাহমানির রাহিম</p>
                                                    <h3 style="margin-bottom: 10px;color:red">{{ $enrollment_info->institute_name }}</h3>
                                                    <p style="margin-bottom: 0px;font-size:25px">( {{ $enrollment_info->institute_address }} )</p>
                                                    <p style="font-size:25px">{{ $enrollment_info->institute_owner }}</p>
                                                </div>
                                            </div>



                                        <!-- Form Header end -->



                                        <!-- Data start -->
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-lg-8" >
                                               <h3 style="margin-left: 65%;margin-top:5%;"> ভর্তি ফরম</h3>
                                            </div>
                                            <div class="text-right col-12 col-md-4 col-lg-4" style="">

                                                <div class="form-group has-feedback">
                                                    <p class="hideinput d-none">
                                                        <input type="file" name="photo" id="trade"
                                                            onchange="previewFile(this);" required>
                                                    </p>
                                                    <img id="previewImg" alt=""
                                                        style="height: 150px;width:150px;margin-top;"
                                                        onclick="upimg()">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Data end -->



                                        <!-- Row start -->
                                        <h3>ফরম নং :- </h3>
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">শিক্ষার্থীর নাম (বাংলায়)</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="b_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            আপনার নাম লিখুন বাংলায়</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">(ইংরেজিতে)</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="english_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">আপনার নাম লিখুন ইংরেজিতে</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                         <!-- Row start -->
                                         <div class="row mb-4 print-mb-2">
                                            <div class="col-4">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">বিভাগ</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="division" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            আপনার বিভাগের নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">বিদ্যালয়/মহা বিদ্যালয়ের নাম</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="school_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">আপনার বিদ্যালয়ের নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">পিতার নাম</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="father_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            আপনার পিতার নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">পিতার পেশা</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="father_profession" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">আপনার পিতার পেশা লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">মাতার নাম</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="mother_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            আপনার মাতার নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">মাতার পেশা</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="mother_profession" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">আপনার মাতার পেশা লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-8">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">পিতা/মাতার অবর্তমানে অভিভাবকের নাম</span>:
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="alter_guardian" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            অভিভাবকের নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">সম্পর্ক</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="relation" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">দয়া করে সম্পর্ক লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-9">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">জন্মসনদ অনুযায়ী জন্ম তারিখ</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="date" name="dob" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            জন্ম তারিখ লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">ধর্ম</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="religion" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">আপনার ধর্ম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">ব্যক্তিগত মোবাইল নম্বর</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="personal_mobile" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে পিতা/স্বামী নাম  লিখুন"
                                                            required="" data-bv-field="father_husband_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="father_husband_name"
                                                            style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="father_husband_name"
                                                            data-bv-result="NOT_VALIDATED" style="display: none;">দয়া
                                                            আপনার মোবাইল নম্বর লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">অভিভাবকের মোবাইল নম্বর</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="guardian_mobile" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে মাতার নাম  লিখুন"
                                                            required="" data-bv-field="mother_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="mother_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="mother_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">অভিভাবকের মোবাইল নম্বর লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">বর্তমান ঠিকানা-গ্রাম</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="present_address" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে গ্রামের নাম  লিখুন"
                                                            required="" data-bv-field="village_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="village_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="village_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">দয়া করে গ্রামের নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">ডাকঘর</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="post_office" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে ডাকঘরের নাম  লিখুন"
                                                            required="" data-bv-field="union_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="union_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="union_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">দয়া করে ডাকঘরের নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row mb-4 print-mb-2">
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">উপজেলা</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="upzilla_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে উপজেলার নাম  লিখুন"
                                                            required="" data-bv-field="upazila_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="upazila_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="upazila_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">দয়া করে উপজেলার নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <span class="me-2 w-60">জেলা</span><span class="me-2">:</span>
                                                    <div class="flex-fill form-group has-feedback">
                                                        <input type="text" name="district_name" value=""
                                                            class="w-100 border-0 border-bottom-dotted border-dark"
                                                            data-bv-notempty-message="দয়া করে জেলার নাম  লিখুন"
                                                            required="" data-bv-field="zila_name"><i
                                                            class="form-control-feedback bv-no-label"
                                                            data-bv-icon-for="zila_name" style="display: none;"></i>
                                                        <small class="help-block" data-bv-validator="notEmpty"
                                                            data-bv-for="zila_name" data-bv-result="NOT_VALIDATED"
                                                            style="display: none;">দয়া করে জেলার নাম লিখুন</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="d-block mt-2 mb-4 print-mb-2 lh-lg print-lh">
                                            <h5 class="text-center">শিক্ষার্থীর অঙ্গীকার নামা</h5>
                                            <p class="">আমি এই মর্মে অঙ্গীকার করছি যে, উপরোল্লিখিত সকল প্রকার তথ্য নির্ভরযোগ্য ও সত্য এবং অত্র প্রশিক্ষণ সেন্টার এর সকল প্রকার নিয়ম কানুন মেনে চলতে বাধ্য থাকিব। </p>
                                            <p class="" style="text-align: right">___________<br>শিক্ষার্থীর সাক্ষর</p>

                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="d-block mt-2 mb-4 print-mb-2 lh-lg print-lh">
                                            <h5 class="text-center">অভিভাবকের অঙ্গীকার নামা</h5>
                                            <p class="">আমি আমরা পোষ্যকে আপনার প্রশিক্ষণ কেন্দ্র এ অধ্যয়নের অনুমতি প্রদার করলাম এবং তার উন্নয়নকল্পে আমি অত্র প্রশিক্ষণ কর্তৃপক্ষের সাথে নিয়মিত যোগাযোগ রাখব এবং প্রশিক্ষণ এর নিয়ম-কানুন সম্পর্কে সচেতন থাকব।</p>
                                            <p class="" style="text-align: right">_____________<br>অভিভাবকের সাক্ষর</p>

                                        </div>
                                        <!-- Row end -->

                                                <!-- Row start -->
                                        <div class="d-block mt-2 mb-4 print-mb-2 lh-lg print-lh">
                                            <h4 class="">ভর্তির নির্দেশাবলী:-</h4>
                                            <div>
                                                {!! $enrollment_info->institute_Instructions !!}
                                            </div>


                                        </div>
                                        <!-- Row end -->
                                        <input type="text" name="service_id" id="" value="{{ $service->id }}">

                                        <div class="d-flex form-group justify-content-end mb-4 mt-5 d-print-none">
                                            <button class="btn btn-success me-1" type="submit"> সংরক্ষণ করুন</button>

                                            <button class="btn btn-primary ms-2 ml-1" type="button"
                                                id="print-application">প্রিন্ট অ্যাপ্লিকেশন</button>
                                            <div class="zloading pt-1 ps-2">
                                                <svg viewBox="25 25 50 50">
                                                    <circle class="path" cx="50" cy="50" r="20"
                                                        fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                                                </svg>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>




                        </div>
                        <!-- end col -->
                    </div>

                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Print View -->



    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
            //  $('.hideinput').hide();
        }
    }

    function upimg() {
        $('#trade').click();
    }
</script>

<script>
    (function($) {
        $(document).ready(function() {
            $('#print-application').on('click', function() {
                $('.card.application-form').removeClass('d-print-none').addClass('d-print-block');
                $('.card.certificate-form').removeClass('d-print-block').addClass('d-print-none');
                print();
            });

        });
    })(jQuery);
</script>

<!-- Main content End -->
@endsection
