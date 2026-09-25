<!-- Section: Admission Journey (Inspired by nlquran.net) -->
<section id="admission-process" class="pt-45 pb-45" style="background: linear-gradient(135deg, #0b291b 0%, #1b4332 100%); color: #ffffff;">
    <div class="container">
        <div class="section-title text-center mb-25">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="badge" style="background: rgba(82,183,136,0.2); color: #95d5b2; font-size: 13px; font-weight: 600; padding: 6px 14px; border-radius: 20px; margin-bottom: 12px; display: inline-block;">
                        <i class="fa fa-pencil-square-o mr-5"></i>
                        @if (session()->get('language') == 'bangla')
                            সহজ ও দ্রুত ভর্তি
                        @elseif (session()->get('language') == 'arabic')
                            قبول سهل وسريع
                        @else
                            Quick & Easy Admission
                        @endif
                    </span>
                    <h2 class="title line-bottom-center mt-0 text-white" style="font-size: 28px; font-weight: 800;">
                        @if (session()->get('language') == 'bangla')
                            মাত্র ৪টি সহজ ধাপে <span style="color: #95d5b2;">ভর্তি হোন</span>
                        @elseif (session()->get('language') == 'arabic')
                            التحق بنا في <span style="color: #95d5b2;">٤ خطوات سهلة</span>
                        @else
                            Enroll in Just <span style="color: #95d5b2;">4 Easy Steps</span>
                        @endif
                    </h2>
                    <p style="color: #d8f3dc; font-size: 15px;">
                        @if (session()->get('language') == 'bangla')
                            ঘরে বসেই আপনার পছন্দের কোর্সে যুক্ত হতে নিচের ধাপগুলো অনুসরণ করুন।
                        @elseif (session()->get('language') == 'arabic')
                            اتبع الخطوات البسيطة التالية للالتحاق بالبرنامج المناسب لك من منزلك.
                        @else
                            Follow these simple steps from home to join your desired Islamic course.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="section-content">
            <div class="row" style="display: flex; flex-wrap: wrap; margin: -10px;">
                
                <!-- Step 1 -->
                <div class="col-xs-12 col-sm-6 col-md-3 mb-20" style="padding: 10px;">
                    <div class="step-box" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 25px 20px; height: 100%; text-align: center; position: relative;">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: #2d6a4f; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 800; margin: 0 auto 16px auto; border: 2px solid #52b788;">
                            @if (session()->get('language') == 'bangla')
                                ০১
                            @elseif (session()->get('language') == 'arabic')
                                ٠١
                            @else
                                01
                            @endif
                        </div>
                        <h4 style="color: #ffffff; font-size: 16.5px; font-weight: 700; margin-top: 0; margin-bottom: 10px;">
                            @if (session()->get('language') == 'bangla')
                                কোর্স বা বিভাগ নির্বাচন
                            @elseif (session()->get('language') == 'arabic')
                                اختيار البرنامج أو القسم
                            @else
                                Choose Course or Program
                            @endif
                        </h4>
                        <p style="color: #cbd5e1; font-size: 13px; line-height: 1.6; margin-bottom: 0;">
                            @if (session()->get('language') == 'bangla')
                                আপনার বা আপনার সন্তানের প্রয়োজন অনুযায়ী উপযুক্ত কোর্সটি পছন্দ করুন।
                            @elseif (session()->get('language') == 'arabic')
                                اختر الدورة المناسبة لاحتياجاتك أو لمستوى طفلك التعليمي.
                            @else
                                Select the most suitable department and course tailored to you or your child.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-xs-12 col-sm-6 col-md-3 mb-20" style="padding: 10px;">
                    <div class="step-box" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 25px 20px; height: 100%; text-align: center; position: relative;">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: #2d6a4f; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 800; margin: 0 auto 16px auto; border: 2px solid #52b788;">
                            @if (session()->get('language') == 'bangla')
                                ০২
                            @elseif (session()->get('language') == 'arabic')
                                ٠٢
                            @else
                                02
                            @endif
                        </div>
                        <h4 style="color: #ffffff; font-size: 16.5px; font-weight: 700; margin-top: 0; margin-bottom: 10px;">
                            @if (session()->get('language') == 'bangla')
                                অনলাইন আবেদন ফরম
                            @elseif (session()->get('language') == 'arabic')
                                استمارة التقديم الإلكترونية
                            @else
                                Fill Online Application
                            @endif
                        </h4>
                        <p style="color: #cbd5e1; font-size: 13px; line-height: 1.6; margin-bottom: 0;">
                            @if (session()->get('language') == 'bangla')
                                আমাদের ওয়েবসাইটের সহজ ভর্তি ফরমটি সঠিক তথ্য দিয়ে পূরণ করুন।
                            @elseif (session()->get('language') == 'arabic')
                                أدخل بياناتك بدقة في استمارة القبول الإلكترونية الميسرة.
                            @else
                                Complete our simple online admission form with your required details.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-xs-12 col-sm-6 col-md-3 mb-20" style="padding: 10px;">
                    <div class="step-box" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 25px 20px; height: 100%; text-align: center; position: relative;">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: #2d6a4f; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 800; margin: 0 auto 16px auto; border: 2px solid #52b788;">
                            @if (session()->get('language') == 'bangla')
                                ০৩
                            @elseif (session()->get('language') == 'arabic')
                                ٠٣
                            @else
                                03
                            @endif
                        </div>
                        <h4 style="color: #ffffff; font-size: 16.5px; font-weight: 700; margin-top: 0; margin-bottom: 10px;">
                            @if (session()->get('language') == 'bangla')
                                ভর্তি ফি নিশ্চিতকরণ
                            @elseif (session()->get('language') == 'arabic')
                                تأكيد ودفع رسوم القبول
                            @else
                                Confirm & Pay Fee
                            @endif
                        </h4>
                        <p style="color: #cbd5e1; font-size: 13px; line-height: 1.6; margin-bottom: 0;">
                            @if (session()->get('language') == 'bangla')
                                বিকাশ, নগদ বা ব্যাংক ট্রান্সফারের মাধ্যমে সহজেই ফি পরিশোধ করুন।
                            @elseif (session()->get('language') == 'arabic')
                                قم بسداد الرسوم المقررة بسهولة عبر وسائل الدفع الإلكتروني أو التحويل البنكي.
                            @else
                                Securely pay the admission fee via bKash, Nagad, or direct bank transfer.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-xs-12 col-sm-6 col-md-3 mb-20" style="padding: 10px;">
                    <div class="step-box" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 25px 20px; height: 100%; text-align: center; position: relative;">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: #52b788; color: #0b291b; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 800; margin: 0 auto 16px auto; border: 2px solid #ffffff;">
                            @if (session()->get('language') == 'bangla')
                                ০৪
                            @elseif (session()->get('language') == 'arabic')
                                ٠٤
                            @else
                                04
                            @endif
                        </div>
                        <h4 style="color: #ffffff; font-size: 16.5px; font-weight: 700; margin-top: 0; margin-bottom: 10px;">
                            @if (session()->get('language') == 'bangla')
                                সরাসরি ক্লাসে যুক্ত হোন
                            @elseif (session()->get('language') == 'arabic')
                                الانضمام المباشر إلى الحصص
                            @else
                                Join Live Classes
                            @endif
                        </h4>
                        <p style="color: #cbd5e1; font-size: 13px; line-height: 1.6; margin-bottom: 0;">
                            @if (session()->get('language') == 'bangla')
                                আপনার আইডি কার্ড ও ক্লাস লিংক পেয়ে নির্ধারিত সময়ে ক্লাসে অংশ নিন।
                            @elseif (session()->get('language') == 'arabic')
                                احصل على بيانات تسجيلك ورابط الفصول لبدء رحلتك التعليمية في الموعد المحدد.
                            @else
                                Receive your student credentials, batch schedule, and live classroom link.
                            @endif
                        </p>
                    </div>
                </div>

            </div>

            <div class="row mt-30 text-center">
                <div class="col-md-12">
                    <a href="{{ route('online.admission') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #52b788 0%, #2d6a4f 100%); color: #ffffff; border-radius: 30px; font-weight: 700; font-size: 15px; padding: 12px 35px; box-shadow: 0 6px 20px rgba(0,0,0,0.3); transition: all 0.3s ease;">
                        <i class="fa fa-pencil mr-8"></i>
                        @if (session()->get('language') == 'bangla')
                            এখনই অনলাইনে ভর্তি ফরম পূরণ করুন
                        @elseif (session()->get('language') == 'arabic')
                            قدّم طلب القبول الآن عبر الإنترنت
                        @else
                            Fill Out Online Admission Form Now
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.step-box:hover {
    background: rgba(255,255,255,0.1) !important;
    transform: translateY(-4px);
    border-color: #52b788 !important;
}
</style>
