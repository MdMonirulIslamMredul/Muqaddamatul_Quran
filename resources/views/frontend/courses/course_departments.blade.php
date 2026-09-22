<!-- Section: Academic Departments & Courses (Inspired by nlquran.net) -->
<section id="courses-departments" class="pt-45 pb-45" style="background: linear-gradient(180deg, #f7faf8 0%, #ffffff 100%);">
    <div class="container">
        <div class="section-title text-center mb-25">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="badge" style="background: #e8f5ee; color: #1b4332; font-size: 13px; font-weight: 600; padding: 6px 14px; border-radius: 20px; margin-bottom: 12px; display: inline-block;">
                        <i class="fa fa-graduation-cap mr-5"></i> দ্বীনি ও আধুনিক শিক্ষাকার্যক্রম
                    </span>
                    <h2 class="title line-bottom-center mt-0" style="font-size: 28px; font-weight: 800; color: #0b291b;">
                        @if (session()->get('language') == 'bangla')
                            আমাদের বিভাগ ও <span class="text-theme-colored" style="color: #2d6a4f;">কোর্সসমূহ</span>
                        @elseif (session()->get('language') == 'arabic')
                            الأقسام <span class="text-theme-colored">والدورات</span>
                        @else
                            Our Departments & <span class="text-theme-colored">Programs</span>
                        @endif
                    </h2>
                    <p style="color: #556b60; font-size: 15px;">সহজ ও নির্ভরযোগ্য পদ্ধতিতে সহীহ কুরআন তিলাওয়াত, হিফজ, তাজবীদ এবং ইসলামি জ্ঞান অর্জনের সুবর্ণ সুযোগ।</p>
                </div>
            </div>
        </div>

        <div class="section-content">
            <div class="row" style="display: flex; flex-wrap: wrap; margin: -10px;">
                
                <!-- Card 1: Noorani & Nazera -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #e8f5ee; color: #1b4332; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-book"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 20px;">অনলাইন ও অফলাইন</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">নূরানী ও নাজেরা কুরআন বিভাগ</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">সহজ পদ্ধতিতে হরফের বিশুদ্ধ উচ্চারণ, মাখরাজ ও সিফাত সহ কুরআন মাজীদ নাজেরা পড়ার বিশেষ পাঠদান।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> পুরুষ, মহিলা ও শিশুদের পৃথক ব্যাচ</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> বিশেষ তত্ত্বাবধানে ব্যক্তিভিত্তিক যত্ন</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> ৩–৬ মাস মেয়াদি</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Hifzul Quran -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #fef3c7; color: #92400e; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-star"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 20px;">জনপ্রিয় প্রোগ্রাম</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">হিফজুল কুরআন বিভাগ</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">আন্তর্জাতিক মানের পূর্ণাঙ্গ ও আংশিক হিফজ, মুরাফাআ (রিভিশন) এবং সুন্দর কণ্ঠে তিলাওয়াতের প্রশিক্ষণ।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> অভিজ্ঞ হাফেজে কুরআন উস্তাদ</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> দৈনিক ছবক ও আমপারা ট্র্যাকিং</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> নিয়মিত সেশন</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Tajweed & Qirat -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #e8f5ee; color: #1b4332; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-volume-up"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 20px;">সকলের জন্য</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">তাজবীদ ও সুন্দর কিরাত কোর্স</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">তাজবীদের সূক্ষ্ম নিয়মাবলি, গুন্নাহ, ক্বলক্বলাহ ও সুরের সমন্বয়ে মধুর কণ্ঠে কুরআন তিলাওয়াত শিক্ষা।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> মাখরাজ সংশোধন ওয়ার্কশপ</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> আন্তর্জাতিক ক্বারীদের তত্ত্বাবধান</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> ৩ মাস মেয়াদি</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Spoken & Quranic Arabic -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #ecfdf5; color: #047857; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-language"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #ecfdf5; color: #047857; padding: 4px 10px; border-radius: 20px;">অনলাইন লাইভ</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">আরবি ভাষা ও কুরআন অনুধাবন</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">সহজ পদ্ধতিতে দৈনন্দিন আরবি কথোপকথন এবং সরাসরি বুঝে বুঝে কুরআন তিলাওয়াতের ব্যাকরণ পাঠ।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> স্পোকেন অ্যারাবিক প্র্যাকটিস</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> কুরআনিক শব্দার্থ ও তরজমা</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> ৪ মাস মেয়াদি</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Muallim Training -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-id-card-o"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #e0e7ff; color: #4338ca; padding: 4px 10px; border-radius: 20px;">সনদপত্র সহ</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">মুয়াল্লিম ও শিক্ষক প্রশিক্ষণ কোর্স</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">আধুনিক শিক্ষণপদ্ধতি, শ্রেণিকক্ষ ব্যবস্থাপনা এবং আদর্শ নূরানী মুয়াল্লিম গড়ার বিশেষ সার্টিফিকেট কোর্স।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> বাস্তবসম্মত ব্ল্যাকবোর্ড প্রশিক্ষণ</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> সফল সমাপনীতে নিয়োগে অগ্রাধিকার</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> ২ মাস মেয়াদি</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Women & Children Exclusive -->
                <div class="col-xs-12 col-sm-6 col-md-4 mb-30" style="padding: 10px;">
                    <div class="course-dept-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e1ece5; padding: 25px 22px; height: 100%; box-shadow: 0 4px 15px rgba(11,41,27,0.04); transition: all 0.3s ease; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                                <div style="width: 52px; height: 52px; border-radius: 12px; background: #fae8ff; color: #86198f; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <span style="font-size: 11.5px; font-weight: 700; background: #fae8ff; color: #86198f; padding: 4px 10px; border-radius: 20px;">১০০% পর্দাসম্মত</span>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: #0b291b; margin-top: 0; margin-bottom: 10px;">মহিলা ও শিশুদের বিশেষ ব্যাচ</h4>
                            <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 15px;">সম্পূর্ণ নারীবান্ধব পরিবেশে অভিজ্ঞ মহিলা উস্তাদ দ্বারা কুরআন ও দৈনন্দিন মাসয়ালা-মাসায়েল পাঠদান।</p>
                            <ul style="list-style: none; padding: 0; margin: 0 0 20px 0; font-size: 13px; color: #334155;">
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> অভিজ্ঞ মুয়াল্লিমা কর্তৃক পাঠদান</li>
                                <li style="margin-bottom: 6px;"><i class="fa fa-check-circle text-theme-colored mr-6" style="color: #2d6a4f;"></i> ঘরে বসেই নিরাপদ অনলাইন ক্লাস</li>
                            </ul>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; padding-top: 14px; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o mr-4"></i> নিয়মিত ব্যাচ</span>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm" style="background: #1b4332; color: #ffffff; border-radius: 6px; font-size: 12.5px; font-weight: 600; padding: 6px 14px;">ভর্তি আবেদন &rarr;</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.course-dept-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(11,41,27,0.08) !important;
    border-color: #52b788 !important;
}
</style>
