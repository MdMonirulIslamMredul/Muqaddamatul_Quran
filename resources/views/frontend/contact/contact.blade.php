@extends('frontend.master')
@section('title')
    Packages
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($banner->image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color padding">
                <h1 class="page-title white-color">@if(session()->get('language')=='bangla') যোগাযোগ করুন @else Contact Us @endif
                    </h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Contact Section Start -->
        <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row rs-contact-box mb-90 md-mb-50">
                    <div class="col-lg-4 col-md-12-4 lg-pl-0 sm-mb-30 md-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('/')}}frontend/assets/images/contact/icon/1.png" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">@if(session()->get('language')=='bangla') ঠিকানা @else Address @endif </span>
                                <span class="des">{{$links->address}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30 md-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('/')}}frontend/assets/images/contact/icon/2.png" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">@if(session()->get('language')=='bangla') ইমেইল ঠিকানা @else Email Address @endif </span>
                                <span class="des"><a href="mailto:{{$links->email}}">{{$links->email}}</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('/')}}frontend/assets/images/contact/icon/3.png" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">@if(session()->get('language')=='bangla') ফোন নম্বর @else Phone Number @endif </span>
                                <span class="des"><a href="tel:{{$links->number}}">{{$links->number}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 md-mb-30">
                        <!-- Map Section Start -->
                        <div class="contact-map3">
                            {!! $links->map_link !!}
                        </div>
                    </div>
                    <div class="col-lg-6 pl-60 md-pl-15">
                        <div class="contact-comment-box">
                            <div class="inner-part">
                                <h2 class="title mb-mb-15">@if(session()->get('language')=='bangla') যোগাযোগ করুন @else Get In Touch @endif </h2>
                                <p>{{$banner->title??null}}</p>
                            </div>
                            <div id="form-messages"></div>
                            <form class="form-wrap" method="POST" action="{{route('contact')}}" >
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control mt-3 p-3" placeholder="Name*" id="name"
                                                       required data-error="Please enter your name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control mt-3 p-3" id="email" required
                                                       placeholder="Email*" data-error="Please enter your email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="number" class="form-control mt-3 p-3" id="phone" required
                                                       placeholder="Phone Number*" data-error="Please enter your email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control mt-3 p-3" placeholder="Subject*" id="msg_subject" required data-error="Please enter your subject">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group v1">
                                                <textarea name="message" id="message" class="form-control mt-3 p-3" placeholder="Your Messages.." cols="30" rows="10" required data-error="Please enter your message"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mb-0">
                                        @if(session()->get('language')=='bangla') <input class="btn-send" type="submit" value="এখন জমা দিন"> @else <input class="btn-send" type="submit" value="Submit Now"> @endif
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section End -->


    </div>
    <!-- Main content End -->
@endsection
