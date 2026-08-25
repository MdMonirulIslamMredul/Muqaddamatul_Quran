<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from kodesolution.com/html/2016/ecocharity-html/demo/index-mp-layout2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Aug 2023 05:41:49 GMT -->

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    @php $logo = \App\Models\Logo::latest()->first() @endphp
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($logo->favicon ?? null) }}">

    @php $logo = \App\Models\Logo::latest()->first() @endphp
    <title>{{ $logo->site_name ?? null }}</title>

    <meta name="description" content="" />
    <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
    <meta name="author" content="ThemeMascot" />



    @include('frontend.includes.style')
    <style>
        /* Global scrollbar styles for WebKit browsers (Chrome, Safari) */
        html {
            /* scrollbar-width: thin; */
            /* Firefox, but doesn't affect WebKit */
        }

        body {
            overflow-y: scroll;
            /* Ensure scrollbars are visible */
        }

        ::-webkit-scrollbar {
            width: 12px;
            /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-thumb {
            background-color: #29b54e;
            /* Color of the scrollbar thumb */
            border-radius: 6px;
            /* Roundness of the thumb */
        }

        ::-webkit-scrollbar-track {
            background-color: #f0f0f0;
            /* Background color of the scrollbar track */
            border-radius: 6px;
            /* Roundness of the track */
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #1f9e3d;
            /* Darker color on hover */
        }

        .container {
            width: 90%;
        }

        .container-sm {
            width: 75%;
        }
        .btn_custom {
            display: inline-block;
            padding: 6px 25px;
            border-radius: 10rem;
            color: #fff;
            font-size: 16px;
            transition: all .3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn_custom::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #29b54e;
            /* Replace with actual color value */
            border-radius: 10rem;
            z-index: -2;
        }

        .btn_custom::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: #1f9e3d;
            /* Replace with actual color value */
            transition: all .3s;
            border-radius: 10rem;
            z-index: -1;
        }

        .btn_custom:hover::before {
            width: 100%;
        }

        .btn_custom:hover{
          color: #fff;
        }
        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-addon {
            position: absolute;
            right: 0;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0 .25rem .25rem 0;
        }

        .input-group .form-control {
            padding-right: 2.5rem;
        }

        .btn-subscribe {
            background-color: #29b54e;
            color: #fff;
            padding: 14px 20px;
            border-radius: 0;
            line-height: 15px;
            transition: all 0.5s ease;
        }
        .btn-subscribe:hover {
            background-color: #1f9e3d;
            color: #fff;
        }
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
    </style>
</head>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        {{-- <div id="preloader">
    <div id="spinner">
      <img class="floating ml-5 mb-5" src="{{ asset($logo->logo_image1 ?? null) }}" alt="">
      <h5 class="line-height-50 font-18">Loading...</h5>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div> --}}

        <!--Full width header Start-->
        @include('frontend.includes.header')
        <!--Full width header End-->


        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: home -->

            @yield('content')


        </div>
        <!-- end main-content -->

        <!-- Footer -->
        @include('frontend.includes.footer')
        <!-- endFooter -->


    </div>
    <!-- end wrapper -->


    @include('frontend.includes.script')



</body>

<!-- Mirrored from kodesolution.com/html/2016/ecocharity-html/demo/index-mp-layout2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Aug 2023 05:44:05 GMT -->

</html>
