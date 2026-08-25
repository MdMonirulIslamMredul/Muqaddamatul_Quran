<section class="bg-silver-light">
    <div class="container pt-50 pb-50">
      <div class="row">
        <div class="col-md-12">          
          <h3 class="text-uppercase title line-bottom mt-0 mb-30 text-center"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>@if(session()->get('language')=='bangla') আমাদের প্রতিনিয়ত @elseif (session()->get('language') == 'arabic')
            منتظمنا @else Our Regular @endif  <span class="text-theme-colored"> @if(session()->get('language')=='bangla') অংশীদার @elseif (session()->get('language') == 'arabic') الشركاء @else Partners @endif  </span></h3>
          <!-- Section: Donors -->
          <div class="owl-carousel-6col text-center">
            @foreach($partners as $partner)
            <div class="item"> <a href="#"><img src="{{ asset($partner->image) }}" alt=""></a></div>
            @endforeach
            {{-- <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/2.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
            <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>