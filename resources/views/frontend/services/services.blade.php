<div id="rs-popular-courses" class="rs-popular-courses main-home event-bg pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 text-center mb-45">
            <div class="sub-title">@if(session()->get('language') == 'bangla') কোর্স নির্বাচন করুন @else Select Courses @endif </div>
            @foreach($titles as $data)
                @if($data->page == 'courses' )
                    <h2 class="title black-color">{{$data->title}}</h2>

                @endif
            @endforeach
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="courses-item">
                    <div class="courses-grid">
                        <div class="img-part">
                            <a href=""><img src="{{asset($service->main_image)}}" height="250px" width="100%" alt=""></a>
                        </div>
                        <div class="content-part">

                            <div class="course-price">
                                <span class="price">$ {{$service->price}}</span>
                            </div>
                            <h3 class="title"><a href="{{route('services.details',['id'=>$service->id])}}">{{$service->service_title}}</a></h3>
{{--                            <div>{!! $service->service_details_small !!}</div>--}}
                            <a href="{{route('services.details',['id'=>$service->id])}}" class="link" style="color: #FF5421"> @if(session()->get('language') == 'bangla') এখন তালিকাভুক্ত করুন @else Enroll Now @endif </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
