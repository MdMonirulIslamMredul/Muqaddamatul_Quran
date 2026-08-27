<section id="partners-section" class="bg-silver-light pt-35 pb-35" style="background-color: #f8faf9; border-top: 1px solid #e2ece9;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">          
          <h3 class="text-uppercase title line-bottom mt-0 mb-20 text-center" style="font-size: 20px; font-weight: 700; color: #1b4332;">
            <i class="fa fa-handshake-o text-theme-colored mr-10" style="color: #2d6a4f;"></i>
            @if(session()->get('language')=='bangla') 
                আমাদের সহযোগী ও <span class="text-theme-colored" style="color: #2d6a4f;">অংশীদারবৃন্দ</span>
            @elseif (session()->get('language') == 'arabic')
                شركاؤنا <span class="text-theme-colored">الكرام</span>
            @else 
                Our Regular <span class="text-theme-colored">Partners</span>
            @endif
          </h3>
          
          <!-- Section: Partners Showcase -->
          <div class="owl-carousel-6col text-center" data-dots="false" data-nav="false" data-duration="5000" style="min-height: 80px;">
            @foreach($partners as $partner)
            <div class="item" style="padding: 10px 15px;"> 
              <div style="background: #ffffff; border: 1px solid #e2ece9; border-radius: 8px; padding: 12px; height: 75px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 6px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                <img src="{{ asset($partner->image) }}" alt="{{ $partner->partner_name ?? 'Partner' }}" style="max-height: 50px; max-width: 100%; width: auto; object-fit: contain; margin: 0 auto; filter: grayscale(30%); transition: all 0.3s;" onmouseover="this.style.filter='none';" onmouseout="this.style.filter='grayscale(30%)';">
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</section>