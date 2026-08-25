@extends('frontend.master')

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="{{ asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                দান করুন
                            @elseif (session()->get('language') == 'arabic')
                                يتبرع
                            @else
                                Donate
                            @endif
                        </h3> --}}
                        <ul class="breadcrumb white">
                            {{-- <li><a href="index-mp-layout1.html">
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
                                    দান করুন
                                @elseif (session()->get('language') == 'arabic')
                                    يتبرع
                                @else
                                    Donate
                                @endif
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Featured Campaign -->
    <section>
        <h2 class="text-center">
            @if (session()->get('language') == 'bangla')
                {{ $donation->bangla_title }}
            @elseif (session()->get('language') == 'arabic')
                {{ $donation->arabic_title }}
            @else
                {{ $donation->title }}
            @endif
        </h2>
        <div class="container pb-30">
            <div class="section-content">

                <div class="row multi-row-clearfix mb-30">
                    <div class="col-sm-6 col-md-12 col-lg-12 text-right">
                        <div class="share-buttons">
                            <!-- Facebook Share Button -->
                            <a href="#" class="btn btn-facebook btn-primary" onclick="shareOnFacebook('{{ url('donation/' .$donation->id) }}')">
                                <i class="fa fa-facebook"></i> Share on Facebook
                            </a>

                            <!-- WhatsApp Share Button -->
                            <a href="#" class="btn btn-whatsapp btn-success" onclick="shareOnWhatsApp('{{ url('donation/' .$donation->id) }}')" >
                                <i class="fa fa-whatsapp"></i> Share on WhatsApp
                            </a>

                            <!-- Copy Link Button -->
                            <button class="btn btn-copy-link btn-danger" onclick="copyLink('{{ url('donation/' .$donation->id) }}')">
                                <i class="fa fa-link"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    
                    function shareOnFacebook(postUrl) {
                        const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;
                        window.open(facebookShareUrl, '_blank');
                    }

                    function shareOnWhatsApp(postUrl) {
                        const whatsAppShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(postUrl)}`;
                        window.open(whatsAppShareUrl, '_blank');
                    }

                    function copyLink(postUrl) {
                        navigator.clipboard.writeText(postUrl).then(() => {
                            alert('Link copied to clipboard');
                        }).catch(err => {
                            console.error('Failed to copy link: ', err);
                        });
                    }

                    </script>


                <div class="row multi-row-clearfix">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="campaign bg-silver-light maxwidth500 mb-30">
                            <div class="thumb">
                                <img src="{{ asset($donation->image) }}" alt="" class="img-fullwidth">
                                <div class="campaign-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="campaign bg-silver-light maxwidth500 mb-30">
                            <div class="thumb">
                                {!! $donation->video_link !!}
                            </div>
                            <p class="" style="text-align: center">
                                @if (session()->get('language') == 'bangla')
                                    {!! $donation->short_des_bangla1 !!}
                                @elseif (session()->get('language') == 'arabic')
                                    {!! $donation->short_des_ab1 !!}
                                @else
                                    {!! $donation->short_des1 !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: DonetForm & Testimonials -->
    {{-- <section class="bg-silver-light">
    <div class="container pb-40">
      <div class="section-content">
        <div class="row">
          <div class="col-md-6" data-wow-duration="1s" data-wow-delay="0.3s">
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
      <div class="col-md-6">
        @if ($donation->video_link == '')
        <span style="">No any Video</span>
        @else
        {!! $donation->video_link ?? null !!}
        @endif
      </div>
        </div>
      </div>
    </div>
  </section> --}}

    <section class="container pb-60 pt-60" style="background-color: #F5F5F5">
        <div class="row">


            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
            @endif

            <div class="col-sm-6 col-md-6 col-lg-6">
                <form action="{{ route('donation.payment')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $donation->id }}" name="donate_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                    দানের পরিমাণ
                                @elseif (session()->get('language') == 'arabic')
                                    مبلغ التبرع
                                @else
                                    Donation Amount
                                @endif
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="amount"
                                    placeholder="@if (session()->get('language') == 'bangla') দানের পরিমাণ
                                @elseif (session()->get('language') == 'arabic')مبلغ التبرع
                                @else Donation Amount @endif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                    দাতার নাম
                                @elseif (session()->get('language') == 'arabic')
                                    اسم الشاورما
                                @else
                                    Doner Name
                                @endif
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="dname"
                                    placeholder="@if (session()->get('language') == 'bangla') দাতার নাম
                                @elseif (session()->get('language') == 'arabic')اسم الشاورما
                                @else Doner Name @endif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                    ডোনার ইমেল
                                @elseif (session()->get('language') == 'arabic')
                                    البريد الإلكتروني/الهاتف للمتبرع
                                @else
                                    Doner Email
                                @endif
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="demail"
                                    placeholder="@if (session()->get('language') == 'bangla') ডোনার ইমেল/ফোন
                                @elseif (session()->get('language') == 'arabic')البريد الإلكتروني/الهاتف للمتبرع
                                @else Doner Email/Phone @endif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                    ফোন
                                @elseif (session()->get('language') == 'arabic')
                                    البريد الإلكتروني/الهاتف للمتبرع
                                @else
                                    Phone
                                @endif
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="dphone"
                                    placeholder="@if (session()->get('language') == 'bangla') ফোন
                                @elseif (session()->get('language') == 'arabic')البريد الإلكتروني/الهاتف للمتبرع
                                @else Phone @endif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                ট্রান্সেকশন  নাম্বার
                                @elseif (session()->get('language') == 'arabic')
                                    بوابة الدفع
                                @else
                                Transaction
                                @endif
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" name="transaction_id"
                                    placeholder="@if (session()->get('language') == 'bangla') এসএসএল কমার্জ
                                @elseif (session()->get('language') == 'arabic')إس إس إل كوميرز
                                @else SSL Commerz
                                @endif"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                @if (session()->get('language') == 'bangla')
                                পেমেন্টের ধরন
                                @elseif (session()->get('language') == 'arabic')
                                    بوابة الدفع
                                @else
                                    Payment taype
                                @endif
                            </div>
                            <div class="col-md-9">
                                <select name="payment_type" id="" class="form-control" >
                                    <option value="bkash" name="bkash" class="form-control">Bkash</option>
                                    <option value="nagad" name="nagad" class="form-control">Nagad</option>
                                    <option value="rocket" name="rocket" class="form-control">Rocket</option>
                                    <option value="dbbl" name="dbbl" class="form-control">Dbbl</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <button class="btn btn-success pull-right mt-4">Confirm</button>
                </form>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6">
                <p style="text-align: center">
                    @if (session()->get('language') == 'bangla')
                    দাতব্য তহবিল/ব্যাঙ্ক অ্যাকাউন্টের বিবরণ
                @elseif (session()->get('language') == 'arabic')
                تفاصيل صندوق الجمعية الخيرية/حساب البنك
                @else
                Charity Fund/Bank Account Details
                @endif
                    </p>
                <hr>
                @if (session()->get('language') == 'bangla')
                    {!! $donation->long_des_bangla1 !!}
                @elseif (session()->get('language') == 'arabic')
                    {!! $donation->long_des_ab1 !!}
                @else
                    {!! $donation->long_des1 !!}
                @endif
            </div>
        </div>

    </section>


    <section>
        <div class="container pb-40">
            <div class="section-content">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-body">
                                @if (session()->get('language') == 'bangla')
                                    {!! $donation->long_des_bangla2 !!}
                                @elseif (session()->get('language') == 'arabic')
                                    {!! $donation->long_des_ab2 !!}
                                @else
                                    {!! $donation->long_des2 !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                @if (session()->get('language') == 'bangla')
                                    {!! $donation->long_des_bangla3 !!}
                                @elseif (session()->get('language') == 'arabic')
                                    {!! $donation->long_des_ab3 !!}
                                @else
                                    {!! $donation->long_des3 !!}
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
