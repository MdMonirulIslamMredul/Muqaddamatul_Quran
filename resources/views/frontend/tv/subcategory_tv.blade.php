@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        {{ $subcategory->subcategory_name_ban }}
    @elseif (session()->get('language') == 'arabic')
        {{ $subcategory->subcategory_name_ab }}
    @else
        {{ $subcategory->subcategory_name }}
    @endif
@endsection
@push('frontend_style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <style>
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #29b54e;
            border-color: #29b54e;
        }
    </style>
@endpush
@section('content')
    <!-- Main content Start -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset($banner->image) }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                {{ $subcategory->subcategory_name_ban }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $subcategory->subcategory_name_ab }}
                            @else
                                {{ $subcategory->subcategory_name }}
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
                                    {{ $subcategory->subcategory_name_ban }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $subcategory->subcategory_name_ab }}
                                @else
                                    {{ $subcategory->subcategory_name }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Audio Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @forelse ($subcategory->tvs as $tv)
                            <div class="col-md-6">
                                <a href="">
                                    <div class="custom_card"
                                        style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                                        @if ($tv->file_upload && file_exists(public_path('file_upload/' . $tv->file_upload)))
                                            <video controls width="100%">
                                                <source src="{{ asset('file_upload/' . $tv->file_upload) }}"
                                                    type="video/{{ pathinfo($tv->file_upload, PATHINFO_EXTENSION) }}">
                                                Your browser does not support the video element.
                                            </video>
                                        @else
                                            <p>{!! $tv->embed_video ?? null !!}</p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @empty
                            <h2>
                                @if (session()->get('language') == 'bangla')
                                    কোন ভিডিও পাওয়া যায়নি
                                @elseif (session()->get('language') == 'arabic')
                                    لم يتم العثور على فيديو
                                @else
                                    No Video Found
                                @endif
                            </h2>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="custom_card" style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                        <h2 style="margin-bottom: 15px">
                            @if (session()->get('language') == 'bangla')
                                বিভাগ দ্বারা খুঁজুন
                            @elseif (session()->get('language') == 'arabic')
                                ابحث عن الفئة ب
                            @else
                                Find By Category
                            @endif
                        </h2>
                        @foreach ($categories as $category)
                            <div class="dropdown" style="margin: 2px 0">
                                <button class="btn btn-success dropdown-toggle" style="width: 100%; text-align: left"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $category->category_name_ban }}
                                    @elseif (session()->get('language') == 'arabic')
                                        {{ $category->category_name_ab }}
                                    @else
                                        {{ $category->category_name }}
                                    @endif
                                    <span class="caret pull-right" style="margin-top:7px"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    @foreach ($category->tvSubcategories as $subcategory)
                                        <li><a href="{{ route('subcategory.tv', ['id' => $subcategory->id]) }}">
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $subcategory->subcategory_name_ban }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $subcategory->subcategory_name_ab }}
                                                @else
                                                    {{ $subcategory->subcategory_name }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Audio Section End -->


    {{-- </div> --}}
    <!-- Main content End -->
@endsection
@push('frontend_script')
    <script src="{{ asset('/') }}admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script>
        $(function() {
            // Initialize DataTable for #myTable (if exists)
            $('#myTable').DataTable();

            // Initialize DataTable for #example with options
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });

            // Initialize DataTable for #dataTable with responsive option
            $('#dataTable').DataTable({
                responsive: true
            });
            // $('#dataTable2').DataTable({
            //     responsive: true
            // });

            // Initialize DataTable for #example23 with buttons
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            // Add button styling
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-primary me-1');
        });
    </script>
@endpush
