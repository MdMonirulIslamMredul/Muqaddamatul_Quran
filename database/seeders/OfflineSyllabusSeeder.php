<?php

namespace Database\Seeders;

use App\Models\OfflineSyllabus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OfflineSyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure destination directory exists
        $uploadDir = public_path('uploads/offline_syllabus');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0777, true, true);
        }

        // 1. Copy Nazra Tajweed PDF
        $srcNazra = public_path('syllabus/MQ_Islamic_Academy_Nazra_Tajweed_Syllabus.pdf');
        $targetNazra = 'uploads/offline_syllabus/MQ_Islamic_Academy_Nazra_Tajweed_Syllabus.pdf';
        if (File::exists($srcNazra) && !File::exists(public_path($targetNazra))) {
            File::copy($srcNazra, public_path($targetNazra));
        }
        $nazraPdfPath = File::exists(public_path($targetNazra)) ? $targetNazra : 'syllabus/MQ_Islamic_Academy_Nazra_Tajweed_Syllabus.pdf';

        // 2. Copy Noorani Course PDF
        $srcNoorani = public_path('syllabus/MQ_Islamic_Academy_Noorani_Course (1).pdf');
        $targetNoorani = 'uploads/offline_syllabus/MQ_Islamic_Academy_Noorani_Course_Syllabus.pdf';
        if (File::exists($srcNoorani) && !File::exists(public_path($targetNoorani))) {
            File::copy($srcNoorani, public_path($targetNoorani));
        }
        $nooraniPdfPath = File::exists(public_path($targetNoorani)) ? $targetNoorani : 'syllabus/MQ_Islamic_Academy_Noorani_Course (1).pdf';

        // ==========================================
        // SYLLABUS 1: 6-Month Nazra & Tajweed Course
        // ==========================================
        $nazraDetailsBn = <<<HTML
<div class="syllabus-rendered-content">
    <div class="alert alert-success border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #ecfdf5, #d1fae5); border-left: 5px solid #059669 !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-book me-2"></i>নাজরা কুরআন ও তাজবীদ শিক্ষা — ৬ মাসের মাস্টার সিলেবাস</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>কোর্সের নাম:</strong> ৬ মাসে পূর্ণাঙ্গ নাজরা কুরআন ও তাজবীদ ডিপ্লোমা কোর্স<br>
            <strong>লক্ষ্য:</strong> ৬ মাসের মধ্যে সম্পূর্ণ ৩০ পারা কুরআন মাজীদ তাজবীদের পূর্ণাঙ্গ নিয়ম মেনে দেখে দেখে (নাজরা) সহীহ ও সাবলীলভাবে পড়ার যোগ্যতা অর্জন।<br>
            <strong>দৈনিক লক্ষ্যমাত্রা:</strong> প্রতিদিন ৫-৬ পৃষ্ঠা তিলাওয়াত ও নির্দিষ্ট তাজবীদ দরস গ্রহণ।
        </p>
    </div>

    <!-- Monthly Tilawat Target Table -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success me-2 px-3 py-2 rounded-pill font-13">১. তিলাওয়াত লক্ষ্যমাত্রা</span>
            <span>৬ মাসের নাজরা তিলাওয়াত লক্ষ্যমাত্রা (পারা ভিত্তিক)</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" style="font-size: 14px;">
                <thead style="background-color: #065f46; color: #ffffff;">
                    <tr>
                        <th style="width: 12%;">মাস</th>
                        <th style="width: 33%;">নাজরা তিলাওয়াত পরিধি (পারা)</th>
                        <th style="width: 20%;">দৈনিক গড় লক্ষ্যমাত্রা</th>
                        <th style="width: 35%;">প্রধান ফোকাস ও মশক</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-success">১ম মাস</td>
                        <td>১ম পারা থেকে ৫ম পারা (৫ পারা)</td>
                        <td>প্রতিদিন ৪-৫ পৃষ্ঠা</td>
                        <td class="text-start ps-3">বানান মুক্ত সাবলীল রিডিং ও মাখরাজ প্রয়োগ</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">২য় মাস</td>
                        <td>৬ষ্ঠ পারা থেকে ১০ম পারা (৫ পারা)</td>
                        <td>প্রতিদিন ৫ পৃষ্ঠা</td>
                        <td class="text-start ps-3">গুন্নাহ ও মদের সঠিক টান বজায় রেখে রিডিং স্পীড বাড়ানো</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">৩য় মাস</td>
                        <td>১১তম পারা থেকে ১৫তম পারা (৫ পারা)</td>
                        <td>প্রতিদিন ৫ পৃষ্ঠা</td>
                        <td class="text-start ps-3">ওয়াকফ (থামা) ও ইবতিদার (শুরু করা) নিয়ম প্রয়োগ</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">৪র্থ মাস</td>
                        <td>১৬তম পারা থেকে ২০তম পারা (৫ পারা)</td>
                        <td>প্রতিদিন ৫ পৃষ্ঠা</td>
                        <td class="text-start ps-3">কলকলাহ ও বড় আয়াত একটানে পড়ার নিয়ম</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">৫ম মাস</td>
                        <td>২১তম পারা থেকে ২৫তম পারা (৫ পারা)</td>
                        <td>প্রতিদিন ৫-৬ পৃষ্ঠা</td>
                        <td class="text-start ps-3">সুর ও তারতীলের সাথে সাবলীল তিলাওয়াত</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">৬ষ্ঠ মাস</td>
                        <td>২৬তম পারা থেকে ৩০তম পারা (৫ পারা) + খতম রিভিশন</td>
                        <td>প্রতিদিন ৫-৬ পৃষ্ঠা</td>
                        <td class="text-start ps-3"><strong>সম্পূর্ণ কুরআন শেষ করা ও রিভিশন পরীক্ষা</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tajweed Outline -->
    <div class="card border-0 shadow-sm p-4 mb-4 rounded-3" style="background-color: #f8fafc; border-left: 5px solid #2563eb !important;">
        <h5 class="fw-bold text-dark mb-3"><i class="fa fa-graduation-cap text-primary me-2"></i>২. তাজবীদ শিক্ষার মাসভিত্তিক পূর্ণাঙ্গ কোর্স আউটলাইন</h5>
        
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-success mb-2">১ম মাস: তাজবীদের বুনিয়াদী ও মাখরাজ বিজ্ঞান</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>তাজবীদ শাস্ত্রের সংজ্ঞা, গুরুত্ব ও শরয়ী হুকুম।</li>
                        <li>১৭টি মাখরাজ বিস্তারিত (হলক, লিসান, শাফাতাইন, খাইশুম ও জওফ)।</li>
                        <li>যবর, যের, পেশ ও তানবীনের ক্ষেত্রে সঠিক উচ্চারণ ও ওঠানামা।</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-success mb-2">২য় মাস: নূন সাকিন, তানবীন ও মীম সাকিন</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>নূন সাকিন ও তানবীনের ৪ নিয়ম: ইজহার, ইদগাম, ইকফা, ইকলাব।</li>
                        <li>মীম সাকিনের ৩ নিয়ম: ইদগামে মিছলাইন, ইকফা-এ শাফাবী, ইজহারে শাফাবী।</li>
                        <li>নূন ও মীম তাশদীদের ওয়াজিব গুন্নাহর সঠিক সময়কাল।</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-primary mb-2">৩য় মাস: মদ (টেনে পড়া) ও প্রকারভেদ</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>মদ-এ আসলী (স্বাভাবিক টান: ১ আলিফ/১ সেকেন্ড)।</li>
                        <li>মদ-এ ফারঈ: মদ-এ মুত্তাসিল, মুনফাসিল, লাযিম, আরীয ও মদ-এ লীন।</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-primary mb-2">৪র্থ মাস: পুর, বারীক ও সিফাত</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>'র' এবং 'আল্লাহ' শব্দের লাম কখন মোটা ও কখন চিকন পড়তে হয়।</li>
                        <li>ইসতি'লার ৭টি হরফ এবং ৫টি কলকলাহ হরফের নিয়ম।</li>
                        <li>হরফের প্রধান সিফাতসমূহ (হামস, জেহর, শিদ্দাহ ইত্যাদি)।</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-warning mb-2" style="color: #b45309 !important;">৫ম মাস: ওয়াকফ ও ইবতিদা</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>ওয়াকফের চিহ্নসমূহ চেনা ও থামার সঠিক নিয়ম।</li>
                        <li>একটানে পড়তে না পারলে মাঝপথে থেমে পিছন থেকে মিলিয়ে পড়ার সুন্নত নিয়ম।</li>
                        <li>কুরআনের ১৪টি সিজদার আয়াত ও বিধান।</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-danger mb-2">৬ষ্ঠ মাস: তারতীল, সুর সাধনা ও চূড়ান্ত মূল্যায়ন</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li>তারতীল ও হাদ্র উভয় পদ্ধতিতে কুরআন তিলাওয়াতের অনুশীলন।</li>
                        <li>তিলাওয়াতের আদব ও মাসআলা-মাসায়েল।</li>
                        <li>তাজবীদের থিওরি পরীক্ষা ও পুরো কুরআন থেকে মৌখিক পরীক্ষা গ্রহণ।</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Books & Materials Table -->
    <div class="mb-3">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-secondary me-2 px-3 py-2 rounded-pill font-13">৩. সহায়ক সামগ্রী</span>
            <span>সহায়ক পাঠ্যবই ও মেটেরিয়ালস</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle" style="font-size: 14px;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%;" class="text-center">ক্রম</th>
                        <th style="width: 45%;">বই / উপকরণের নাম</th>
                        <th style="width: 45%;">ব্যবহারের ক্ষেত্র</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center fw-bold">১</td>
                        <td><strong>তাজবীদ আল-কুরআন</strong> (কালার কোডেড কুরআন)</td>
                        <td>নাজরা তিলাওয়াতের জন্য (রঙ দেখে তাজবীদ প্রয়োগ সহজ হয়)</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">২</td>
                        <td><strong>সহজ তাজবীদ শিক্ষা</strong> (এম কিউ একাডেমি গাইড)</td>
                        <td>তাজবীদের নিয়মাবলী থিওরি পড়ার জন্য</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">৩</td>
                        <td><strong>দৈনন্দিন তিলাওয়াত ট্র্যাকার ডায়েরি</strong></td>
                        <td>শিক্ষার্থীর প্রতিদিনের তিলাওয়াতের হিসাব রাখার জন্য</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;

        $nazraDetailsEn = <<<HTML
<div class="syllabus-rendered-content">
    <div class="alert alert-success border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #ecfdf5, #d1fae5); border-left: 5px solid #059669 !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-book me-2"></i>Nazra Quran & Tajweed Education — 6-Month Master Syllabus</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>Course Name:</strong> 6-Month Complete Nazra Quran & Tajweed Diploma Course<br>
            <strong>Objective:</strong> To achieve complete proficiency in reciting the entire 30 Juz of the Holy Quran accurately and fluently with all essential Tajweed rules within 6 months.<br>
            <strong>Daily Target:</strong> Recitation of 5–6 pages daily accompanied by structured Tajweed lectures.
        </p>
    </div>

    <!-- Monthly Targets Table -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success me-2 px-3 py-2 rounded-pill font-13">1. Recitation Goals</span>
            <span>6-Month Nazra Recitation Target (Juz-wise)</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" style="font-size: 14px;">
                <thead style="background-color: #065f46; color: #ffffff;">
                    <tr>
                        <th style="width: 12%;">Month</th>
                        <th style="width: 33%;">Recitation Scope (Juz)</th>
                        <th style="width: 20%;">Daily Target</th>
                        <th style="width: 35%;">Key Focus & Practice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-success">Month 1</td>
                        <td>Juz 1 to Juz 5 (5 Juz)</td>
                        <td>4–5 pages daily</td>
                        <td class="text-start ps-3">Fluent reading without spelling & accurate Makharij application</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">Month 2</td>
                        <td>Juz 6 to Juz 10 (5 Juz)</td>
                        <td>5 pages daily</td>
                        <td class="text-start ps-3">Increasing reading speed while maintaining proper Ghunnah and Madd stretch</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">Month 3</td>
                        <td>Juz 11 to Juz 15 (5 Juz)</td>
                        <td>5 pages daily</td>
                        <td class="text-start ps-3">Rules of Waqf (stopping) and Ibtida (resuming)</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">Month 4</td>
                        <td>Juz 16 to Juz 20 (5 Juz)</td>
                        <td>5 pages daily</td>
                        <td class="text-start ps-3">Qalqalah and recitation of long verses in single breath</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">Month 5</td>
                        <td>Juz 21 to Juz 25 (5 Juz)</td>
                        <td>5–6 pages daily</td>
                        <td class="text-start ps-3">Fluent recitation with melody and Tartil</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">Month 6</td>
                        <td>Juz 26 to Juz 30 (5 Juz) + Revision</td>
                        <td>5–6 pages daily</td>
                        <td class="text-start ps-3"><strong>Complete Quran completion and comprehensive revision exam</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tajweed Outline -->
    <div class="card border-0 shadow-sm p-4 mb-4 rounded-3" style="background-color: #f8fafc; border-left: 5px solid #2563eb !important;">
        <h5 class="fw-bold text-dark mb-3"><i class="fa fa-graduation-cap text-primary me-2"></i>2. Month-by-Month Tajweed Curriculum</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-success mb-2">Month 1: Fundamentals & 17 Makharij</h6>
                    <p class="small text-secondary mb-0">Definition, importance, and legal status of Tajweed; in-depth study of the 17 articulation points (throat, tongue, lips, nasal cavity, oral cavity); vowel precision.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-success mb-2">Month 2: Noon Sakin, Tanween & Meem Sakin</h6>
                    <p class="small text-secondary mb-0">The 4 rules of Noon Sakin and Tanween (Izhar, Idgham, Ikhfa, Iqlab); the 3 rules of Meem Sakin; duration of Wajib Ghunnah.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-primary mb-2">Month 3: Madd (Elongation) Rules</h6>
                    <p class="small text-secondary mb-0">Madd Asli (natural elongation) and Madd Far'i (branches: Muttasil, Munfasil, Lazim, Aridh, Leen).</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-primary mb-2">Month 4: Heaviness, Lightness & Sifaat</h6>
                    <p class="small text-secondary mb-0">Tafkheem and Tarqeeq of Ra and Lam in the name of Allah; the 7 Isti'la letters; 5 Qalqalah letters; foundational Sifaat.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-warning mb-2" style="color: #b45309 !important;">Month 5: Waqf, Ibtida & Sajdah</h6>
                    <p class="small text-secondary mb-0">Stopping signs; Sunnah methodology of pausing and restarting; 14 Sajdah Tilawat verses.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white rounded-3 border h-100">
                    <h6 class="fw-bold text-danger mb-2">Month 6: Tartil & Final Evaluation</h6>
                    <p class="small text-secondary mb-0">Tartil and Hadr practice; etiquette of Quran recitation; oral theory and recitation examination for certification.</p>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

        $nazraDetailsAr = <<<HTML
<div class="syllabus-rendered-content" dir="rtl">
    <div class="alert alert-success border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #ecfdf5, #d1fae5); border-right: 5px solid #059669 !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-book ms-2"></i>منهاج دبلوم تلاوة القرآن الكريم نظراً وأحكام التجويد (٦ أشهر)</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>اسم الدورة:</strong> دورة الدبلوم الشاملة في تلاوة القرآن الكريم بالتجويد (٦ أشهر)<br>
            <strong>الهدف:</strong> تمكين الطالب من تلاوة القرآن الكريم كاملاً ٣٠ جزءاً نظراً بصحة وإتقان وطلاقة تامة وفق قواعد التجويد المعتمدة خلال ٦ أشهر.<br>
            <strong>المعدل اليومي:</strong> تلاوة ٥ إلى ٦ صفحات يومياً مع درس تجويد منتظم.
        </p>
    </div>

    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success ms-2 px-3 py-2 rounded-pill font-13">١. خطة التلاوة</span>
            <span>الخطة الشهرية لتلاوة الأجزاء (٦ أشهر)</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" style="font-size: 14px;">
                <thead style="background-color: #065f46; color: #ffffff;">
                    <tr>
                        <th style="width: 12%;">الشهر</th>
                        <th style="width: 33%;">مقدار التلاوة (الأجزاء)</th>
                        <th style="width: 20%;">المعدل اليومي</th>
                        <th style="width: 35%;">المحور والتطبيق</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="fw-bold text-success">الشهر ١</td><td>من الجزء ١ إلى الجزء ٥ (٥ أجزاء)</td><td>٤–٥ صفحات يومياً</td><td class="text-end pe-3">القراءة المسترسلة وتطبيق المخارج</td></tr>
                    <tr><td class="fw-bold text-success">الشهر ٢</td><td>من الجزء ٦ إلى الجزء ١٠ (٥ أجزاء)</td><td>٥ صفحات يومياً</td><td class="text-end pe-3">زيادة سرعة القراءة مع ضبط الغنن والمدود</td></tr>
                    <tr><td class="fw-bold text-success">الشهر ٣</td><td>من الجزء ١١ إلى الجزء ١٥ (٥ أجزاء)</td><td>٥ صفحات يومياً</td><td class="text-end pe-3">تطبيق أحكام الوقف والابتداء</td></tr>
                    <tr><td class="fw-bold text-success">الشهر ٤</td><td>من الجزء ١٦ إلى الجزء ٢٠ (٥ أجزاء)</td><td>٥ صفحات يومياً</td><td class="text-end pe-3">القلقلة وقراءة الآيات الطويلة بنفس واحد</td></tr>
                    <tr><td class="fw-bold text-success">الشهر ٥</td><td>من الجزء ٢١ إلى الجزء ٢٥ (٥ أجزاء)</td><td>٥–٦ صفحات يومياً</td><td class="text-end pe-3">التلاوة بالترتيل والتحسين الصوتي</td></tr>
                    <tr><td class="fw-bold text-success">الشهر ٦</td><td>من الجزء ٢٦ إلى الجزء ٣٠ (٥ أجزاء) + الختمة</td><td>٥–٦ صفحات يومياً</td><td class="text-end pe-3"><strong>إتمام المصحف الشريف والامتحان النهائي</strong></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;


        // ==========================================
        // SYLLABUS 2: 6-Month Noorani Course
        // ==========================================
        $nooraniDetailsBn = <<<HTML
<div class="syllabus-rendered-content">
    <div class="alert alert-info border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-left: 5px solid #16a34a !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-child me-2"></i>নূরানী ও কুরআন শিক্ষা বিভাগ — ৬ মাসের পূর্ণাঙ্গ কোর্স সিলেবাস</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>কোর্সের ধরন:</strong> নূরানী প্রাথমিক স্তর (৬ মাসের ডিপ্লোমা কোর্স)<br>
            <strong>উদ্দেশ্য:</strong> মাখরাজ ও তাজবীদসহ সহজ-শুদ্ধভাবে কুরআনুল কারীম রিডিং তিলাওয়াত, দৈনন্দিন সুন্নাত, প্রয়োজনীয় মাসআলা ও নামাজ শিক্ষা।
        </p>
    </div>

    <!-- Monthly Syllabus Breakdown -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success me-2 px-3 py-2 rounded-pill font-13">১. মাসভিত্তিক সিলেবাস</span>
            <span>৬ মাসের নূরানী পাঠ্যক্রমের ধারাবাহিক রূপরেখা</span>
        </h5>
        
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-success mb-2"><i class="fa fa-circle me-1 font-12"></i>১ম মাস: আরবি বর্ণমালা, মাখরাজ ও তানবীন</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>হরফ পরিচিতি:</strong> আরবি ২৯টি হরফের একক ও যুক্ত রূপ (শুরু, মাঝ ও শেষ) চেনা।</li>
                        <li><strong>মাখরাজ:</strong> ২৯টি হরফের সঠিক উচ্চারণ স্থান (মাখরাজ) অনুশীলন।</li>
                        <li><strong>হরকত ও তানবীন:</strong> যবর, যের, পেশ এবং দুই যবর, দুই যের, দুই পেশ পড়া।</li>
                        <li><strong>আমল ও দোয়া:</strong> অযুর ফরজ ও সুন্নত, খাওয়ার আগের ও শেষের দোয়া, ঘুমানো ও জাগার দোয়া।</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-success mb-2"><i class="fa fa-circle me-1 font-12"></i>২য় মাস: জযম, তাশদীদ ও মদ (টেনে পড়া)</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>সাকিন ও তাশদীদ:</strong> জযম যুক্ত হরফ এবং তাশদীদ যুক্ত হরফ মিলিয়ে পড়ার নিয়ম।</li>
                        <li><strong>মদ (টেনে পড়া):</strong> মদ-এ আসলী (আলিফ, ওয়াও, ইয়া) ও মদ-এ লীন এর বিবরণ।</li>
                        <li><strong>ওয়াজিব গুন্নাহ:</strong> নূন ও মীম তাশদীদের স্থানে গুন্নাহ করে পড়া।</li>
                        <li><strong>আমল ও দোয়া:</strong> গোসলের ফরজ, তায়াম্মুমের নিয়ম, মসজিদে প্রবেশ ও বের হওয়ার দোয়া।</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa fa-circle me-1 font-12"></i>৩য় মাস: তাজবীদের মৌলিক নিয়মাবলী</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>নূন সাকিন ও তানবীন:</strong> ইজহার (স্পষ্ট করা), ইদগাম (মেলানো), ইকফা (গুন্নাহ করা), ইকলাব (পরিবর্তন করা)।</li>
                        <li><strong>মীম সাকিন:</strong> মীম সাকিনের ৩টি নিয়ম (ইদগাম, ইকফা, ইজহার)।</li>
                        <li><strong>অন্যান্য নিয়ম:</strong> কলকলাহ্ (প্রতিধ্বনি) এবং 'র' ও 'আল্লাহ' শব্দের পুর/বারীক (মোটা/চিকন) নিয়ম।</li>
                        <li><strong>আমল ও দোয়া:</strong> আযান ও আকামতের জবাব, ওয়াশরুমে প্রবেশ ও বের হওয়ার দোয়া।</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa fa-circle me-1 font-12"></i>৪র্থ মাস: আমপারা মশক (সূরা আল-ফাতিহা থেকে আল-ফীল)</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>সূরা মশক:</strong> ছোট সূরাসমূহ শিক্ষকের নিকট থেকে দেখে দেখে সঠিক মাখরাজসহ শুদ্ধ করা।</li>
                        <li><strong>ওয়াকফ:</strong> আয়াতের শেষে এবং মাঝে কোথায় ও কীভাবে থামতে হয়।</li>
                        <li><strong>নামাজ শিক্ষা:</strong> ছানা, তাশাহহুদ (আত্তাহিয়্যাতু), দরূদ শরীফ ও দো’আয়ে মাসূরা মুখস্থ।</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-warning mb-2" style="color: #b45309 !important;"><i class="fa fa-circle me-1 font-12"></i>৫ম মাস: আমপারা মশক (সূরা আল-হুমাযাহ থেকে আন-নাস)</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>আমপারা রিডিং:</strong> ৩০তম পারার বাকি সকল সূরা রিডিং পড়া।</li>
                        <li><strong>নামাজের ব্যবহারিক অনুশীলন:</strong> তাকবীরে তাহরীমা থেকে সালাম ফেরানো পর্যন্ত সঠিক নিয়মে নামাজ আদায়।</li>
                        <li><strong>আমল ও দোয়া:</strong> দো’আয়ে কুনূত, পিতা-মাতার জন্য দো’আ, সফর ও যানবাহনের দো’আ।</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-danger mb-2"><i class="fa fa-circle me-1 font-12"></i>৬ষ্ঠ মাস: কুরআনুল কারীম রিডিং (১ম পারা) ও চূড়ান্ত পরীক্ষা</h6>
                    <ul class="mb-0 small text-secondary" style="line-height: 1.7;">
                        <li><strong>কুরআন রিডিং:</strong> ১ নম্বর পারা (আলিফ-লাম-মীম) সরাসরি দেখে দ্রুত ও শুদ্ধভাবে তিলাওয়াত।</li>
                        <li><strong>পূর্ণাঙ্গ রিভিশন:</strong> বিগত ৫ মাসের তাজবীদ, সূরা, দো’আ ও মাসআলা পুনরাবৃত্তি।</li>
                        <li><strong>চূড়ান্ত পরীক্ষা:</strong> মৌখিক তিলাওয়াত, মাখরাজ ও নামাজ পরীক্ষার মাধ্যমে সনদ প্রদান।</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Noorani Qaida Guidance Table -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-info text-dark me-2 px-3 py-2 rounded-pill font-13">২. কায়দা নির্দেশিকা</span>
            <span>নূরানী কায়দা অনুশীলনী (প্রাথমিক মাখরাজ ও পাঠ)</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle" style="font-size: 14px;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 25%;">মাখরাজ অঞ্চল</th>
                        <th style="width: 30%;">হরফসমূহ (Arabic)</th>
                        <th style="width: 45%;">উচ্চারণ নির্দেশিকা</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">হলক (কণ্ঠনালী)</td>
                        <td class="font-monospace text-center fs-5">ء ، هـ ، ع ، ح ، غ ، خ</td>
                        <td>কণ্ঠনালীর শুরু, মাঝখান ও শেষ ভাগ থেকে উচ্চারিত হরফ।</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">জিহ্বা (লিসান)</td>
                        <td class="font-monospace text-center fs-5">ق ، ك ، ج ، ش ، ي ، ض ، ل ، ن ، ر ...</td>
                        <td>জিহ্বার গোড়া, মাঝখান ও অগ্রভাগ থেকে উচ্চারিত হরফ।</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">ঠোঁট (শাফাতাইন)</td>
                        <td class="font-monospace text-center fs-5">ف ، ب ، م ، و</td>
                        <td>দুই ঠোঁটের শুকনো ও ভেজা অংশ থেকে উচ্চারিত হরফ।</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">নাক (খাইশূম)</td>
                        <td class="font-monospace text-center fs-5">غُنَّة (Ghunnah)</td>
                        <td>নাকের বাঁশি থেকে গুন্নাহ্ এর উচ্চারণ।</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Books List Table -->
    <div class="mb-3">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-secondary me-2 px-3 py-2 rounded-pill font-13">৩. পাঠ্যবই তালিকা</span>
            <span>পাঠ্যবই ও সহায়ক সামগ্রী</span>
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" style="font-size: 14px;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%;">ক্র.মি.</th>
                        <th style="width: 35%;">বইয়ের নাম</th>
                        <th style="width: 35%;">বিষয়বস্তু</th>
                        <th style="width: 20%;">মাসের ব্যবহার</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">১</td>
                        <td class="text-start ps-3"><strong>নূরানী কায়দা</strong> (নূরানী বোর্ড)</td>
                        <td>হরফ, মাখরাজ, তাজবীদ ও যুক্তবর্ণ</td>
                        <td>১ম - ৩য় মাস</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">২</td>
                        <td class="text-start ps-3"><strong>নূরানী আমপারা</strong></td>
                        <td>৩০তম পারা ও ছোট সূরা মশক</td>
                        <td>৪র্থ - ৫ম মাস</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">৩</td>
                        <td class="text-start ps-3"><strong>এসো নামাজ শিখি ও দোয়া</strong></td>
                        <td>অযু, নামাজ, মাসআলা ও দৈনন্দিন দোয়া</td>
                        <td>১ম - ৬ষ্ঠ মাস</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">৪</td>
                        <td class="text-start ps-3"><strong>কুরআনুল কারীম</strong> (মজিদ)</td>
                        <td>১ম পারা ও নিয়মিত তিলাওয়াত</td>
                        <td>৬ষ্ঠ মাস</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;

        $nooraniDetailsEn = <<<HTML
<div class="syllabus-rendered-content">
    <div class="alert alert-info border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-left: 5px solid #16a34a !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-child me-2"></i>Noorani & Quran Learning Department — 6-Month Complete Course Syllabus</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>Course Level:</strong> Noorani Foundation Level (6-Month Diploma Course)<br>
            <strong>Objective:</strong> To master accurate Quranic reading with Tajweed and Makharij, foundational Sunnah practices, daily essential Duas, and practical Salah training.
        </p>
    </div>

    <!-- Monthly Curriculum -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success me-2 px-3 py-2 rounded-pill font-13">1. Monthly Breakdown</span>
            <span>6-Month Sequential Noorani Curriculum Outline</span>
        </h5>
        
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-success mb-2">Month 1: Arabic Alphabet, Makharij & Tanween</h6>
                    <p class="small text-secondary mb-0">Recognition of 29 Arabic letters (isolated and joined shapes); articulation practice; Harakat (short vowels) and Tanween; Wudu rules and daily supplications.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-success mb-2">Month 2: Jazm, Tashdeed & Madd</h6>
                    <p class="small text-secondary mb-0">Rules for Sukoon/Jazm and Tashdeed; foundational elongation (Madd Asli and Madd Leen); Wajib Ghunnah; Ghusl and Tayammum rules; Masjid supplications.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-primary mb-2">Month 3: Foundational Tajweed Principles</h6>
                    <p class="small text-secondary mb-0">Rules of Noon Sakin and Tanween (Izhar, Idgham, Ikhfa, Iqlab); Meem Sakin; Qalqalah; Tafkheem and Tarqeeq; Adhan responses.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-primary mb-2">Month 4: Amma Para Recitation (Al-Fatiha to Al-Fil)</h6>
                    <p class="small text-secondary mb-0">Short Surahs recitation under teacher supervision; stopping rules (Waqf); practical Salah memorization (Thana, Tashahhud, Durood, Dua Masoora).</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-warning mb-2" style="color: #b45309 !important;">Month 5: Amma Para Recitation (Al-Humazah to An-Nas)</h6>
                    <p class="small text-secondary mb-0">Remaining Surahs of 30th Juz; end-to-end practical Salah rehearsal; Dua Qunoot, parental prayers, and travel supplications.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border h-100 p-3 shadow-sm bg-white rounded-3">
                    <h6 class="fw-bold text-danger mb-2">Month 6: Direct Quran Reading (Juz 1) & Final Assessment</h6>
                    <p class="small text-secondary mb-0">Direct fluent recitation from the Mus'haf (Juz 1); 5-month cumulative revision; final oral recitation, Makharij, and prayer examination for certification.</p>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

        $nooraniDetailsAr = <<<HTML
<div class="syllabus-rendered-content" dir="rtl">
    <div class="alert alert-info border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-right: 5px solid #16a34a !important; border-radius: 12px; padding: 18px 22px;">
        <h5 class="fw-bold text-success mb-2"><i class="fa fa-child ms-2"></i>منهاج قسم القاعدة النورانية وتعلّم القرآن الكريم (دبلوم ٦ أشهر)</h5>
        <p class="mb-1 text-dark" style="font-size: 15px; line-height: 1.7;">
            <strong>المستوى:</strong> المرحلة التأسيسية النورانية (دبلوم ٦ أشهر)<br>
            <strong>الهدف:</strong> إتقان تلاوة القرآن الكريم نظراً بالتجويد والمخارج السليمة، وتعلّم السنن اليومية، وأحكام الطهارة، وصفة الصلاة العملية.
        </p>
    </div>

    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
            <span class="badge bg-success ms-2 px-3 py-2 rounded-pill font-13">١. الخطة الشهرية</span>
            <span>مخطط المنهج الدراسي النوراني على مدار ٦ أشهر</span>
        </h5>
        <div class="row g-3">
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-success">الشهر ١: الحروف العربية، المخارج والتنوين</h6><p class="small text-secondary mb-0">التعرف على ٢٩ حرفاً عربياً مفردة ومركبة، مخارج الحروف، الحركات والتنوين، آداب الوضوء وأدعية اليوم والليلة.</p></div></div>
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-success">الشهر ٢: السكون، الشدة والمدود</h6><p class="small text-secondary mb-0">أحكام السكون والشدة، المد الطبيعي ومد اللين، الغنة الواجبة، أحكام الغسل والتيمم وأدعية المسجد.</p></div></div>
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-primary">الشهر ٣: القواعد التجويدية الأساسية</h6><p class="small text-secondary mb-0">أحكام النون الساكنة والتنوين والميم الساكنة والقلقلة والتفخيم والترقيق وإجابة المؤذن.</p></div></div>
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-primary">الشهر ٤: مشق جزء عم (من الفاتحة إلى الفيل)</h6><p class="small text-secondary mb-0">قراءة السور القصيرة بإتقان على يد المعلم، أحكام الوقف، وحفظ أذكار الصلاة (التشهد، الصلاة الإبراهيمية، دعاء الاستفتاح).</p></div></div>
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-warning" style="color: #b45309 !important;">الشهر ٥: مشق جزء عم (من الهمزة إلى الناس)</h6><p class="small text-secondary mb-0">إتمام قراءة باقي جزء عم، التدريب العملي على أداء الصلاة كاملة، دعاء القنوت وأدعية الوالدين والسفر.</p></div></div>
            <div class="col-md-6"><div class="card p-3 shadow-sm bg-white rounded-3"><h6 class="fw-bold text-danger">الشهر ٦: القراءة المباشرة من المصحف (الجزء ١)</h6><p class="small text-secondary mb-0">تلاوة الجزء الأول من المصحف الشريف بطلاقة وصحة، مراجعة شاملة للشهور السابقة، والامتحان النهائي لمنح الشهادة.</p></div></div>
        </div>
    </div>
</div>
HTML;

        // Insert or update Syllabus 1 (Nazra & Tajweed)
        OfflineSyllabus::updateOrCreate(
            ['id' => 1],
            [
                'title'              => '6-Month Complete Nazra Quran & Tajweed Diploma Course Master Syllabus',
                'title_bn'           => '৬ মাসে পূর্ণাঙ্গ নাজরা কুরআন ও তাজবীদ ডিপ্লোমা কোর্স মাস্টার সিলেবাস',
                'title_ar'           => 'المنهج الماسي لدورة تلاوة القرآن الكريم بالتجويد (دبلوم ٦ أشهر)',

                'details'            => $nazraDetailsEn,
                'details_bn'         => $nazraDetailsBn,
                'details_ar'         => $nazraDetailsAr,

                'document_one'       => $nazraPdfPath,
                'document_one_title' => 'নাজরা কুরআন ও তাজবীদ শিক্ষা — ৬ মাসের মাস্টার সিলেবাস (PDF)',

                'document_two'       => null,
                'document_two_title' => null,

                'status'             => 1,
                'sort_order'         => 1,
            ]
        );

        // Insert or update Syllabus 2 (Noorani Course)
        OfflineSyllabus::updateOrCreate(
            ['id' => 2],
            [
                'title'              => 'Noorani & Quran Learning Department - 6-Month Complete Course Syllabus',
                'title_bn'           => 'নূরানী ও কুরআন শিক্ষা বিভাগ — ৬ মাসের পূর্ণাঙ্গ কোর্স সিলেবাস',
                'title_ar'           => 'المنهج الشامل لقسم القاعدة النورانية وتعلّم القرآن الكريم (٦ أشهر)',

                'details'            => $nooraniDetailsEn,
                'details_bn'         => $nooraniDetailsBn,
                'details_ar'         => $nooraniDetailsAr,

                'document_one'       => $nooraniPdfPath,
                'document_one_title' => 'নূরানী ও কুরআন শিক্ষা বিভাগ — ৬ মাসের পূর্ণাঙ্গ সিলেবাস (PDF)',

                'document_two'       => null,
                'document_two_title' => null,

                'status'             => 1,
                'sort_order'         => 2,
            ]
        );
    }
}
