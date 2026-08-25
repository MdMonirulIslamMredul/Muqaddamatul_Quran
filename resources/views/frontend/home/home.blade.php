@extends('frontend.master')

@push('frontend_style')
    <style>
        .owl-carousel-4col.owl-carousel .owl-stage {
            border-radius: 10px !important;
            overflow: hidden;
        }
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
        .grid-item {
            /* position: relative; */
            width: 24%;
            margin: .25%;
        }
        .grid-item .overlay-shade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.716);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .grid-item:hover .overlay-shade {
            opacity: 1;
        }
        .icons-holder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
        }
        .grid-item:hover .icons-holder {
            opacity: 1;
        }
        .icons-holder-inner {
            display: inline-block;
        }
        .styled-icons {
            font-size: 24px;
            color: green;
        }
        .grid-item img {
            width: 100%;
            display: block;
        }
        @media (max-width: 992px) {
            .grid-item {
                width: 32.333%;
                margin: .33%;
            }
        }
        @media (max-width: 768px) {
            .grid-item {
                width: 49%;
                margin: .50%;
            }
        }
        @media (max-width: 576px) {
            .grid-item {
                width: 100%;
            }
        }
        @media (min-width: 1200px) {
          .col-xl-1 { width: 8.33333%; }
          .col-xl-2 { width: 16.66667%; }
          .col-xl-3 { width: 25%; }
          .col-xl-4 { width: 33.33333%; }
          .col-xl-5 { width: 41.66667%; }
          .col-xl-6 { width: 50%; }
          .col-xl-7 { width: 58.33333%; }
          .col-xl-8 { width: 66.66667%; }
          .col-xl-9 { width: 75%; }
          .col-xl-10 { width: 83.33333%; }
          .col-xl-11 { width: 91.66667%; }
          .col-xl-12 { width: 100%; }
        }
    </style>
@endpush

@section('content')
    <!-- Slider Section Start -->
    @include('frontend.slider.slider')
    <!-- Slider Section End -->

    <!-- Section: About -->
    {{-- <section>
      <div class="container">
        <div class="section-content text-center">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <img class="img-circle img-thumbnail mb-15" src="{{ asset('frontend/images/about/sq1.jpg') }}" alt="">
              <h4>Save water from polution</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero omnis unde nesciunt?</p>
              <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <img class="img-circle img-thumbnail mb-15" src="{{ asset('frontend/images/about/sq2.jpg') }}" alt="">
              <h4>Make the world greener</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero omnis unde nesciunt?</p>
              <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
              <img class="img-circle img-thumbnail mb-15" src="{{ asset('frontend/images/about/sq3.jpg') }}" alt="">
              <h4>Help to balance eco system</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero omnis unde nesciunt?</p>
              <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-0 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.6s">
              <img class="img-circle img-thumbnail mb-15" src="{{ asset('frontend/images/about/sq4.jpg') }}" alt="">
              <h4>Help to balance eco system</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero omnis unde nesciunt?</p>
              <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: About -->
    <section class="">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="text-center">
                            @if(isset($about) && ($about->image1 || $about->banner_image))
                                <img src="{{ asset($about->image1 ?? $about->banner_image) }}" alt="About Image"
                                    style="width:100%;max-width:400px;height:400px;border: 1px solid #ddd;border-radius: 5px; padding: 5px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 wow fadeInLeft" style="margin-top: 100px;" data-wow-duration="1s"
                        data-wow-delay="0.3s">
                        <h2 class="text-uppercase mt-0">
                            @if (session()->get('language') == 'bangla')
                                {{ $about->title_bangla }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $about->title_ab }}
                            @else
                                {{ $about->title }}
                            @endif
                        </h2>

                        <p>
                            @if (session()->get('language') == 'bangla')
                                {!! $about->des_bangla !!}
                            @elseif (session()->get('language') == 'arabic')
                                {!! $about->des_ab !!}
                            @else
                                {!! $about->des_eng !!}
                            @endif
                        </p>
                    </div>

                    {{-- <div class="col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">


                  <img class="" src="{{ asset('frontend/images/about/ab1.jpg') }}" alt="" >



            </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Donation start -->
    @include('frontend.donation.donation')
    <!-- Section: Donation end -->

    <!-- Section: project start -->
    {{-- @include('frontend.projects.project') --}}
    <!-- Section: project end  -->

    <!-- Section: project start -->
    @include('frontend.activities.activities')
    <!-- Section: project end  -->

    {{-- <section class="bg-silver-light">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-uppercase mt-0">Welcome To <span class="text-theme-colored">Ecocharity</span><br> HTML5 Tempalte</h2>
              <h4 class="text-gray-dimgray font-weight-400"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</em></h4>
              <p>Sit amet consectetur adipisicing elit. Aliquid iste iusto reiciendis praesentium dolorem doloribus nisi architecto voluptatibus explicabo, possimus ullam quae illum maiores aperiam consequuntur.</p>
              <p>Sit amet consectetur adipisicing elit. Aliquid iste iusto reiciendis praesentium dolorem doloribus nisi architecto voluptatibus explicabo, possimus ullam quae illum maiores aperiam consequuntur facere similique voluptatum.</p>
              <a href="#" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">Read More</a>
            </div>
            <div class="col-md-6">
              <div class="row mb-10">
                <div class="col-md-12">
                  <img class="img-fullwidth" src="{{ asset('frontend/images/about/ab1.jpg') }}" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-5 pr-sm-15 mb-sm-10">
                  <img class="img-fullwidth" src="{{ asset('frontend/images/about/ab2.jpg') }}" alt="">
                </div>
                <div class="col-md-6 pl-5 pl-sm-15">
                  <img class="img-fullwidth" src="{{ asset('frontend/images/about/ab3.jpg') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: Campaign -->
    {{-- <section>
      <div class="container pb-40">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Our <span class="text-theme-colored">Campaign</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="owl-carousel-4col" data-dots="true">
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/1.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/2.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/3.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/4.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/5.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: DonetForm & Testimonials -->
    {{-- <section class="bg-silver-light">
      <div class="container pb-40">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase title line-bottom-double-line mt-0 mb-30"><i class="fa fa-cc-mastercard text-theme-colored mr-10"></i>Please  <span class="text-theme-colored font-weight-800">Donate </span>for Our Campaign!</h3>

              <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
              <form id="paypal_donate_form_onetime_recurring">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-20">
                      <label><strong>Payment Type</strong></label> <br>
                      <label class="radio-inline">
                        <input type="radio" checked="" value="one_time" name="payment_type">
                        One Time
                      </label>
                      <label class="radio-inline">
                        <input type="radio" value="recurring" name="payment_type">
                        Recurring
                      </label>
                    </div>
                  </div>

                  <div class="col-sm-12" id="donation_type_choice">
                    <div class="form-group mb-20">
                      <label><strong>Donation Type</strong></label>
                      <div class="radio mt-5">
                        <label class="radio-inline">
                          <input type="radio" value="D" name="t3" checked="">
                          Daily</label>
                        <label class="radio-inline">
                          <input type="radio" value="W" name="t3">
                          Weekly</label>
                        <label class="radio-inline">
                          <input type="radio" value="M" name="t3">
                          Monthly</label>
                        <label class="radio-inline">
                          <input type="radio" value="Y" name="t3">
                          Yearly</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <label><strong>I Want to Donate for</strong></label>
                      <select name="item_name" class="form-control">
                        <option value="Educate Children">Educate Children</option>
                        <option value="Child Camps">Child Camps</option>
                        <option value="Clean Water for Life">Clean Water for Life</option>
                        <option value="Campaign for Child Poverty">Campaign for Child Poverty</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <label><strong>Currency</strong></label>
                      <select name="currency_code" class="form-control">
                        <option value="">Select Currency</option>
                        <option value="USD" selected="selected">USD - U.S. Dollars</option>
                        <option value="AUD">AUD - Australian Dollars</option>
                        <option value="BRL">BRL - Brazilian Reais</option>
                        <option value="GBP">GBP - British Pounds</option>
                        <option value="HKD">HKD - Hong Kong Dollars</option>
                        <option value="HUF">HUF - Hungarian Forints</option>
                        <option value="INR">INR - Indian Rupee</option>
                        <option value="ILS">ILS - Israeli New Shekels</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="MYR">MYR - Malaysian Ringgit</option>
                        <option value="MXN">MXN - Mexican Pesos</option>
                        <option value="TWD">TWD - New Taiwan Dollars</option>
                        <option value="NZD">NZD - New Zealand Dollars</option>
                        <option value="NOK">NOK - Norwegian Kroner</option>
                        <option value="PHP">PHP - Philippine Pesos</option>
                        <option value="PLN">PLN - Polish Zlotys</option>
                        <option value="RUB">RUB - Russian Rubles</option>
                        <option value="SGD">SGD - Singapore Dollars</option>
                        <option value="SEK">SEK - Swedish Kronor</option>
                        <option value="CHF">CHF - Swiss Francs</option>
                        <option value="THB">THB - Thai Baht</option>
                        <option value="TRY">TRY - Turkish Liras</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <label><strong>How much do you want to donate?</strong></label>
                      <select name="amount" class="form-control">
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="200">200</option>
                          <option value="500">500</option>
                          <option value="other">Other Amount</option>
                      </select>
                      <div id="custom_other_amount">
                        <label><strong>Custom Amount:</strong></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                    </div>
                  </div>
                </div>
              </form>


              <!-- Script for Donation Form Custom Amount -->
              <script type="text/javascript">
                $(document).ready(function(e) {
                  var $donation_form = $("#paypal_donate_form_onetime_recurring");
                  //toggle custom amount
                  var $custom_other_amount = $donation_form.find("#custom_other_amount");
                  $custom_other_amount.hide();
                  $donation_form.find("select[name='amount']").change(function() {
                      var $this = $(this);
                      if ($this.val() == 'other') {
                        $custom_other_amount.show().append('<div class="input-group"><span class="input-group-addon">$</span> <input id="input_other_amount" type="text" name="amount" class="form-control" value="100"/></div>');
                      }
                      else{
                        $custom_other_amount.children( ".input-group" ).remove();
                        $custom_other_amount.hide();
                      }
                  });

                  //toggle donation_type_choice
                  var $donation_type_choice = $donation_form.find("#donation_type_choice");
                  $donation_type_choice.hide();
                  $("input[name='payment_type']").change(function() {
                      if (this.value == 'recurring') {
                          $donation_type_choice.show();
                      }
                      else {
                          $donation_type_choice.hide();
                      }
                  });


                  // submit form on click
                  $donation_form.on('submit', function(e){
                          $( "#paypal_donate_form-onetime" ).submit();
                      var item_name = $donation_form.find("select[name='item_name'] option:selected").val();
                      var currency_code = $donation_form.find("select[name='currency_code'] option:selected").val();
                      var amount = $donation_form.find("select[name='amount'] option:selected").val();
                      var t3 = $donation_form.find("input[name='t3']:checked").val();

                      if ( amount == 'other') {
                        amount = $donation_form.find("#input_other_amount").val();
                      }

                      // submit proper form now
                      if ( $("input[name='payment_type']:checked", $donation_form).val() == 'recurring' ) {
                          var recurring_form = $('#paypal_donate_form-recurring');

                          recurring_form.find("input[name='item_name']").val(item_name);
                          recurring_form.find("input[name='currency_code']").val(currency_code);
                          recurring_form.find("input[name='a3']").val(amount);
                          recurring_form.find("input[name='t3']").val(t3);

                          recurring_form.find("input[type='submit']").trigger('click');

                      } else if ( $("input[name='payment_type']:checked", $donation_form).val() == 'one_time' ) {
                          var onetime_form = $('#paypal_donate_form-onetime');

                          onetime_form.find("input[name='item_name']").val(item_name);
                          onetime_form.find("input[name='currency_code']").val(currency_code);
                          onetime_form.find("input[name='amount']").val(amount);

                          onetime_form.find("input[type='submit']").trigger('click');
                      }
                      return false;
                  });

                });
              </script>

              <!-- Paypal Onetime Form -->
              <form id="paypal_donate_form-onetime" class="hidden" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_donations">
                <input type="hidden" name="business" value="accounts@thememascot.com">

                <input type="hidden" name="item_name" value="Educate Children"> <!-- updated dynamically -->
                <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
                <input type="hidden" name="amount" value="20"> <!-- updated dynamically -->

                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="cn" value="Comments...">
                <input type="hidden" name="tax" value="0">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="bn" value="PP-DonationsBF">
                <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
                <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
                <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
                <input type="submit" name="submit">
              </form>

              <!-- Paypal Recurring Form -->
              <form id="paypal_donate_form-recurring" class="hidden" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="business" value="accounts@thememascot.com">

                <input type="hidden" name="item_name" value="Educate Children"> <!-- updated dynamically -->
                <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
                <input type="hidden" name="a3" value="20"> <!-- updated dynamically -->
                <input type="hidden" name="t3" value="D"> <!-- updated dynamically -->


                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="sra" value="1">
                <input type="hidden" name="no_shipping" value="0">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="bn" value="PP-DonationsBF">
                <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
                <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
                <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
                <input type="submit" name="submit">
              </form>
              <!-- ===== END: Paypal Both Onetime/Recurring Form ===== -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <img class="img-fullwidth mt-sm-40" src="{{ asset('fronend/images/about/1.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: Upcoming Events -->
    <section class="bg-light">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                                class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>
                            @if (session()->get('language') == 'bangla')
                                দান/সহযোগীতা করুন
                            @elseif (session()->get('language') == 'arabic')
                                حملة التبرع
                            @else
                                Donation Campaign
                            @endif
                            </span>
                        </h3>
                        <div class="owl-carousel-2col">
                            @foreach ($donations as $donation)
                                <div class="item bg-white custom_card"
                                    style="height: 500px; margin: 20px; border-radius: 20px;">
                                    <div class="campaign maxwidth500 mb-30">
                                        <div class="thumb"
                                            style="height: 220px; border-top-right-radius: 20px; border-top-left-radius: 20px;">
                                            <img src="{{ asset($donation->image) }}" alt="" class="img-fullwidth">
                                            <div class="campaign-overlay"></div>
                                        </div>
                                        <div class="campaign-details clearfix p-15 pt-10 pb-10" style="height:250px">
                                            <h4 class="font-weight-700 mt-0"><a href="#"></a>
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $donation->bangla_title }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $donation->arabic_title }}
                                                @else
                                                    {{ $donation->title }}
                                                @endif
                                            </h4>
                                            <div style="width:100%;height:130px; overflow-y: scroll;">
                                                <p>
                                                    @if (session()->get('language') == 'bangla')
                                                        {!! $donation->short_des_bangla1 !!}
                                                    @elseif (session()->get('language') == 'arabic')
                                                        {!! $donation->short_des_ab1 !!}
                                                    @else
                                                        {!! $donation->short_des1 !!}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="campaign-bottom clearfix mt-20 mb-10"
                                                style="text-align: center">
                                                <a class="btn_custom"
                                                    href="{{ route('donation', $donation->id) }}">
                                                    @if (session()->get('language') == 'bangla')
                                                        দান করুন
                                                    @elseif (session()->get('language') == 'arabic')
                                                        تبرع الآن
                                                    @else
                                                        Donate Now
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-4 col-lg-6 col-xl-6">
                        <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                                class="fa fa-calendar text-gray-darkgray mr-10"></i>
                            @if (session()->get('language') == 'bangla')
                                আসন্ন প্রকল্প
                            @elseif (session()->get('language') == 'arabic')
                                المشاريع القادمة
                            @else
                                Upcoming Projects
                            @endif
                            </span>
                        </h3>

                        @foreach ($upcomingProjects as $item)
                            <article class="post media-post clearfix pb-0 mb-15">
                                <div class="event-date-time pull-left flip bg-theme-colored text-center mt-5 p-15 pt-10">
                                    <h4 class="text-white font-weight-600 font-28 mt-0 mb-0">22</h4>
                                    <span class="text-white">Sep</span>
                                </div>
                                <div class="post-right upcoming-event-right">
                                    <h4 class="mt-0 mb-5"><a
                                            href="{{ route('upcoming.project.details', $item->id) }}">{{ $item->title }}</a>
                                    </h4>
                                    <ul class="list-inline font-12 mb-5">
                                        <li class="pr-0"><i class="fa fa-clock-o mr-5"></i> At 6.30 pm |</li>
                                        <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>{{ $item->location }}</li>
                                    </ul>
                                    <p class="mb-0 font-13">{!! $item->short_des1 !!}</p>
                                </div>
                            </article>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Funfact -->

    <!-- Divider: Counters start-->
    <section class="divider parallax layer-overlay overlay-dark-4" data-bg-img="{{ asset('frontend/images/bg/bg2.jpg') }}"
        data-parallax-ratio="0.7">
        <div class="container pt-90 pb-90">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_1 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_1 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn1 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab1 }}
                            @else
                                {{ $counter->title_1 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_2 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_2 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn2 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab2 }}
                            @else
                                {{ $counter->title_2 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_3 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_3 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn3 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab3 }}
                            @else
                                {{ $counter->title_3 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_4 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_4 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn4 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab4 }}
                            @else
                                {{ $counter->title_4 }}
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Divider: Counters start-->

    <!-- Section: video Gallery -->
    @include('frontend.gallery.video_gallery')
    <!-- Section: video Gallery -->

    <!-- Section: image Gallery -->
    @include('frontend.gallery.gallery')
    <!-- Section: image Gallery -->

    <!-- Diver: Video Background  -->
    {{-- <section class="divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/bg/bg5.jpg') }}" data-parallax-ratio="0.7">
      <div class="container pt-120 pb-120">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">Watch Our Latest Campaign video</h3>
              <a href="https://www.youtube.com/watch?v=YzMpNqY9NUg" data-lightbox-gallery="youtube-video"><i class="fa fa-play-circle text-theme-colored font-72"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: blog -->
    {{-- <section id="blog">
      <div class="container pb-sm-30">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Latest <span class="text-theme-colored">News</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/1.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/2.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/3.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Divider: Donors -->
    {{-- <section class="bg-silver-light">
      <div class="container pt-30 pb-40">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase text-center title line-bottom mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i> @if (session()->get('language') == 'bangla') আমাদের প্রতিনিয়ত @else Our Regular @endif  <span class="text-theme-colored">@if (session()->get('language') == 'bangla') দাতা @else Donors @endif </span></h3>
            <!-- Section: Donors -->
            <div class="owl-carousel-6col text-center">
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/1.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/2.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Divider: Donors -->
    @include('frontend.partners.partners')
    <!-- Divider: Donors -->
@endsection
@push('frontend_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elem = document.querySelector('.grid');
            var msnry = new Masonry(elem, {
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                percentPosition: true
            });
        });
    </script>
@endpush