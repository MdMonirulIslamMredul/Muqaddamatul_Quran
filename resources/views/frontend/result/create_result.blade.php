@extends('frontend.master')
@section('title')
    Blogs
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($banner->image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Results</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Result Create</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="form-group">
                                    <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Examinaton Naem</label>
                                  </div>
                                  <div class="col-auto">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
@endsection
