<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sampleNotices = [
            [
                'title' => 'Admission Open for Academic Year 2026-2027 (Noorani, Najera, Hifz & Kitab)',
                'title_bn' => '২০২৬-২০২৭ শিক্ষাবর্ষে সকল বিভাগে নতুন ছাত্র ভর্তি চলছে (নূরানী, নাজেরা, হিফজ ও কিতাব বিভাগ)',
                'title_ar' => 'فتح باب القبول للعام الدراسي الجديد ٢٠٢٦-٢٠٢٧',
                'notice_category' => 'admission',
                'notice_no' => 'MQIA-ADM-2026/01',
                'publish_date' => '2026-08-20',
                'short_des' => 'Admission is open for the upcoming academic session. Online applications are accepted via website.',
                'short_des_bn' => 'মুকাদ্দামাতুল কুরআন ইসলামী একাডেমিতে ২০২৬-২০২৭ শিক্ষাবর্ষে নূরানী, নাজেরা, হিফজুল কুরআন এবং কিতাব বিভাগে সীমিত আসনে ভর্তি চলছে। আগ্রহী অভিভাবকগণ অনলাইন অথবা সরাসরি মাদ্রাসার অফিস থেকে ফরম সংগ্রহ করতে পারেন।',
                'long_des_bn' => '<p>বিসমিল্লাহির রাহমানির রাহিম।</p><p>মুকাদ্দামাতুল কুরআন ইসলামী একাডেমির সম্মানিত অভিভাবক ও শুভাকাঙ্ক্ষীগণের অবগতির জন্য জানানো যাচ্ছে যে, আগামী শিক্ষাবর্ষের জন্য ছাত্র ভর্তির কার্যক্রম শুরু হয়েছে।</p><ul><li><strong>বিভাগসমূহ:</strong> নূরানী কিন্ডারগার্টেন, নাজেরা বিভাগ, হিফজুল কুরআন বিভাগ ও কিতাব বিভাগ।</li><li><strong>আবেদনের শেষ তারিখ:</strong> ৩০ সেপ্টেম্বর ২০২৬।</li><li><strong>যোগাযোগ:</strong> মাদ্রাসা অফিস (সকাল ৮টা থেকে বিকাল ৫টা)।</li></ul>',
                'is_pinned' => 1,
                'is_ticker' => 1,
                'status' => 1,
                'views_count' => 142
            ],
            [
                'title' => 'Annual Examination 2026 Routine and Guidelines Published',
                'title_bn' => 'বার্ষিক পরীক্ষা ২০২৬ এর সময়সূচি ও পরীক্ষার বিশেষ নির্দেশিকা প্রকাশ',
                'title_ar' => 'جدول الامتحانات السنوية لعام ٢٠٢٦',
                'notice_category' => 'exam',
                'notice_no' => 'MQIA-EXAM-2026/04',
                'publish_date' => '2026-08-22',
                'short_des' => 'Annual examination routine has been published. All students are advised to prepare accordingly.',
                'short_des_bn' => 'হিফজ ও কিতাব বিভাগের সকল ছাত্রদের জানানো যাচ্ছে যে, আগামী ১৫ সেপ্টেম্বর থেকে বার্ষিক পরীক্ষা শুরু হবে। বিস্তারিত রুটিন ও সিট প্ল্যান অফিস নোটিশ বোর্ডে প্রকাশ করা হয়েছে।',
                'long_des_bn' => '<p>সকল ছাত্র ও সম্মানিত অভিভাবকদের অবগতির জন্য জানানো যাচ্ছে যে, একাডেমির ২০২৬ সালের বার্ষিক পরীক্ষার রুটিন প্রকাশ করা হলো।</p><p>পরীক্ষার্থীদের যথাসময়ে প্রবেশপত্র সংগ্রহ করে পরীক্ষায় অংশ নেওয়ার নির্দেশ দেওয়া হলো।</p>',
                'is_pinned' => 1,
                'is_ticker' => 1,
                'status' => 1,
                'views_count' => 98
            ],
            [
                'title' => 'Holy Eid-e-Miladunnabi (PBUH) Holiday Notice',
                'title_bn' => 'পবিত্র ঈদে মিলাদুন্নবী (সা.) উপলক্ষে মাদ্রাসা বন্ধের নোটিশ',
                'title_ar' => 'إشعار عطلة المولد النبوي الشريف',
                'notice_category' => 'holiday',
                'notice_no' => 'MQIA-HOL-2026/08',
                'publish_date' => '2026-08-24',
                'short_des' => 'The academy will remain closed on the occasion of Holy Eid-e-Miladunnabi (PBUH).',
                'short_des_bn' => 'পবিত্র ঈদে মিলাদুন্নবী (সা.) উপলক্ষে আগামী রবিবার মাদ্রাসার সকল ক্লাস ও অফিসিয়াল কার্যক্রম বন্ধ থাকবে। পরদিন যথারীতি ক্লাস চলবে।',
                'long_des_bn' => '<p>সকল শিক্ষক, শিক্ষার্থী ও কর্মচারীদের জানানো যাচ্ছে যে, পবিত্র ঈদে মিলাদুন্নবী (সা.) উপলক্ষে মাদ্রাসার সকল একাডেমিক কার্যক্রম বন্ধ থাকবে।</p>',
                'is_pinned' => 0,
                'is_ticker' => 1,
                'status' => 1,
                'views_count' => 65
            ],
            [
                'title' => 'Annual Islamic Mahfil & Quran Recitation Conference 2026',
                'title_bn' => 'বার্ষিক ইসলামী সম্মেলন ও আন্তর্জাতিক ক্বিরাত মাহফিল ২০২৬',
                'title_ar' => 'المؤتمر الإسلامي السنوي ومسابقة تلاوة القرآن الكريم',
                'notice_category' => 'event',
                'notice_no' => 'MQIA-EVT-2026/02',
                'publish_date' => '2026-08-25',
                'short_des' => 'Annual Islamic Mahfil will be held on the madrasah premises. All are cordially invited.',
                'short_des_bn' => 'মুকাদ্দামাতুল কুরআন ইসলামী একাডেমির উদ্যোগে বার্ষিক ইসলামী মহাসম্মেলন ও ক্বিরাত মাহফিল আগামী শুক্রবার মাদ্রাসা প্রাঙ্গণে অনুষ্ঠিত হবে। দেশবরেণ্য ওলামায়ে কেরাম উপস্থিত থাকবেন।',
                'long_des_bn' => '<p>মুকাদ্দামাতুল কুরআন ইসলামী একাডেমির উদ্যোগে আগামী শুক্রবার বাদ আছর হতে মাদ্রাসা ময়দানে বিশাল ইসলামী মহাসম্মেলন অনুষ্ঠিত হবে। এতে দেশ-বিদেশের শীর্ষস্থানীয় ওলামায়ে কেরাম ও প্রখ্যাত ক্বারীগণ অংশগ্রহণ করবেন।</p><p>সকল মুসলিম ভাই ও বোনদের উপস্থিত হয়ে দ্বীনি মাহফিলকে সাফল্যমণ্ডিত করার জন্য বিনীত অনুরোধ করা হলো।</p>',
                'is_pinned' => 1,
                'is_ticker' => 1,
                'status' => 1,
                'views_count' => 210
            ]
        ];

        foreach ($sampleNotices as $data) {
            Notice::updateOrCreate(
                ['notice_no' => $data['notice_no']],
                $data
            );
        }
    }
}
