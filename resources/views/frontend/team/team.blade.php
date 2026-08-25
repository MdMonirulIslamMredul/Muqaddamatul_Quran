<section class="team-wrap ptb-100 bg-chathamas">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="section-title style2 text-center mb-40">
                    <span>Our Instructor</span>
                    @foreach($titles as $data)
                        @if($data->page == 'instructor' )
                            <h2>{{$data->title}}</h2>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="team-slider-one owl-carousel">
            @if(isset($teams))
            @foreach($teams as $team)
            <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <img src="{{asset($team->image)}}" alt="Image">
                <div class="team-info">
                    <a href="mailto:{{$team->email}}" class="team-mail"><i class="ri-mail-send-line"></i></a>
                    <h3>{{$team->name}}</h3>
                    <span>{{$team->designation}}</span>
                    <ul class="social-profile style2 list-style">
                        <li>
                            <a target="_blank" href="{{$team->facebook}}">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="{{$team->youtube}}">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="{{$team->instagram}}">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="{{$team->linkedIn}}">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
