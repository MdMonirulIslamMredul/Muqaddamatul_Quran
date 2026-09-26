<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Bookcategory;
use App\Models\Booksubcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Book::truncate();
        Booksubcategory::truncate();
        Bookcategory::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. Categories
        $catQuran = Bookcategory::create([
            'category_name' => 'Quran & Tajweed',
            'category_name_ban' => 'কুরআন ও তাজবীদ',
            'category_name_ab' => 'القرآن والتجويد',
        ]);

        $catArabic = Bookcategory::create([
            'category_name' => 'Arabic Language & Grammar',
            'category_name_ban' => 'আরবি ভাষা ও ব্যাকরণ',
            'category_name_ab' => 'اللغة العربية وقواعدها',
        ]);

        $catHadith = Bookcategory::create([
            'category_name' => 'Hadith & Sunnah',
            'category_name_ban' => 'হাদিস ও সুন্নাহ',
            'category_name_ab' => 'الحديث والسنن',
        ]);

        $catDua = Bookcategory::create([
            'category_name' => 'Dua & Prayer',
            'category_name_ban' => 'দোআ ও নামাজ শিক্ষা',
            'category_name_ab' => 'الأدعية والصلاة',
        ]);

        $catPersian = Bookcategory::create([
            'category_name' => 'Persian Classics & Ethics',
            'category_name_ban' => 'ফার্সি সাহিত্য ও নীতিশিক্ষা',
            'category_name_ab' => 'الأدب الفارسي والأخلاق',
        ]);

        // 2. Subcategories
        $subQaida = Booksubcategory::create([
            'category_id' => $catQuran->id,
            'subcategory_name' => 'Noorani Qaida & Ampara',
            'subcategory_name_ban' => 'নূরানী কায়দা ও আমপারা',
            'subcategory_name_ab' => 'القاعدة النورانية وجزء عم',
        ]);

        $subTajweed = Booksubcategory::create([
            'category_id' => $catQuran->id,
            'subcategory_name' => 'Tajweed Rules',
            'subcategory_name_ban' => 'তাজবীদুল কুরআন',
            'subcategory_name_ab' => 'قواعد التجويد',
        ]);

        $subNahw = Booksubcategory::create([
            'category_id' => $catArabic->id,
            'subcategory_name' => 'Nahw & Sarf',
            'subcategory_name_ban' => 'নাহু ও ছরফ',
            'subcategory_name_ab' => 'النحو والصرف',
        ]);

        $subAdab = Booksubcategory::create([
            'category_id' => $catArabic->id,
            'subcategory_name' => 'Arabic Literature & Adab',
            'subcategory_name_ban' => 'আরবি সাহিত্য ও আদব',
            'subcategory_name_ab' => 'الأدب العربي',
        ]);

        $subKidsHadith = Booksubcategory::create([
            'category_id' => $catHadith->id,
            'subcategory_name' => 'Hadith for Children',
            'subcategory_name_ban' => 'শিশুতোষ হাদিস',
            'subcategory_name_ab' => 'أحاديث للأطفال',
        ]);

        $subMasnunDua = Booksubcategory::create([
            'category_id' => $catDua->id,
            'subcategory_name' => 'Masnoon Duas',
            'subcategory_name_ban' => 'মাসনুন দোআ',
            'subcategory_name_ab' => 'الأدعية المسنونة',
        ]);

        $subNamaz = Booksubcategory::create([
            'category_id' => $catDua->id,
            'subcategory_name' => 'Prayer Learning',
            'subcategory_name_ban' => 'নামাজ শিক্ষা',
            'subcategory_name_ab' => 'تعليم الصلاة',
        ]);

        $subPersianKitab = Booksubcategory::create([
            'category_id' => $catPersian->id,
            'subcategory_name' => 'Persian Literature',
            'subcategory_name_ban' => 'ফার্সি কিতাব',
            'subcategory_name_ab' => 'الكتب الفارسية',
        ]);

        // 3. Books
        $books = [
            // 1. Bakura
            [
                'category_id' => $catArabic->id,
                'subcategory_id' => $subAdab->id,
                'title_bn' => 'বাকুরাতুল আদব (আরবী-উর্দু-বাংলা)',
                'title_en' => 'Bakuratul Adab (Arabic-Urdu-Bangla)',
                'title_ab' => 'باكورة الأدب (عربي - أردي - بنغالي)',
                'des_bn' => '<p><strong>বাকুরাতুল আদব</strong> আরবি ভাষা ও সাহিত্যের অন্যতম জনপ্রিয় ও ফলপ্রসূ প্রাথমিক পাঠ্যপুস্তক। মাওলানা সায়েদ আব্দুল আহাদ কাসেমী (রহ.) প্রণীত এবং মাওলানা হাফিজুর রহমান যশোরী অনূদিত এই গ্রন্থে আরবি বাক্যের গঠন, আদব ও শিষ্টাচারমূলক কথোপকথন এবং প্রয়োজনীয় ব্যবহারিক শব্দভাণ্ডার বাংলা ও উর্দু তরজমাসহ আকর্ষণীয়ভাবে সন্নিবেশিত করা হয়েছে।</p>',
                'des_en' => '<p><strong>Bakuratul Adab</strong> is an acclaimed foundational textbook in Islamic madrasahs for acquiring Arabic literary competence, daily conversational etiquette, and core vocabulary with clear Bengali and Urdu translations.</p>',
                'des_ab' => '<p>كتاب <strong>باكورة الأدب</strong> من أشهر المناهج الدراسية لتعليم مبادئ الأدب والمحادثة العربية للناشئة، يشتمل على جمل تطبيقية ومفردات أساسية مع الترجمة إلى الأردية والبنغالية.</p>',
                'book_image' => 'bakuratul_adab.jpg',
                'pdf_file' => 'bakuratul_adab.pdf',
            ],

            // 2. Esho Nahu Shikhi
            [
                'category_id' => $catArabic->id,
                'subcategory_id' => $subNahw->id,
                'title_bn' => 'এসো নাহ্​ব শিখি',
                'title_en' => 'Esho Nahu Shikhi (Learn Arabic Syntax)',
                'title_ab' => 'تعالوا نتعلم النحو',
                'des_bn' => '<p><strong>এসো নাহ্​ব শিখি</strong> প্রখ্যাত আরবিদাঁ হযরত মাওলানা আবু তাহের মেসবাহ রচিত একটি অনন্য আরবি ব্যাকরণ গ্রন্থ। গতানুগতিক মুখস্থ পদ্ধতির বাইরে গিয়ে সহজ ভাষা, আকর্ষণীয় ছক ও প্রচুর প্রায়োগিক অনুশীলনের মাধ্যমে আরবি ব্যাকরণ (নাহু) আয়ত্ত করার জন্য এটি অত্যন্ত সমাদৃত।</p>',
                'des_en' => '<p><strong>Esho Nahu Shikhi</strong> by Maulana Abu Taher Mesbah is an innovative and highly popular textbook designed to teach Arabic grammar and syntax (Nahw) through accessible explanations, practical examples, and engaging exercises.</p>',
                'des_ab' => '<p>كتاب <strong>تعالوا نتعلم النحو</strong> للشيخ أبي طاهر مصباح، كتاب متميز في تيسير قواعد النحو العربي وتدريب الطلاب على الفهم السليم والأسلوب التطبيقي العملي.</p>',
                'book_image' => 'esho_nahu_shikhi.jpg',
                'pdf_file' => 'esho_nahu_shikhi.pdf',
            ],

            // 3. 40 Hadiths for Children
            [
                'category_id' => $catHadith->id,
                'subcategory_id' => $subKidsHadith->id,
                'title_bn' => 'শিশুদের জন্যে গল্পসহ চল্লিশ হাদীস',
                'title_en' => '40 Hadiths for Children with Stories',
                'title_ab' => 'أربعون حديثاً للأطفال مع القصص',
                'des_bn' => '<p>প্রফেসর ড. ইয়াসার কানডেমীর রচিত এবং বাংলাদেশ ইনস্টিটিউট অব ইসলামিক থট (BIIT) কর্তৃক প্রকাশিত <strong>শিশুদের জন্যে গল্পসহ চল্লিশ হাদীস</strong> বইটি ছোটদের কোমল হৃদয়ে প্রিয় নবীজি (সা.)-এর সুন্নাহ ও চারিত্রিক সৌন্দর্য প্রোথিত করতে সহায়ক। প্রতিটি হাদিসকে সহজবোধ্য নীতিগর্ভ গল্পের মাধ্যমে উপস্থাপন করা হয়েছে।</p>',
                'des_en' => '<p><strong>40 Hadiths for Children with Stories</strong> originally authored by Prof. Dr. M. Yasar Kandemir presents prophetic traditions in an engaging storytelling format to instill Islamic ethics and values in young hearts.</p>',
                'des_ab' => '<p>كتاب <strong>أربعون حديثاً للأطفال مع القصص</strong> يهدف إلى غرس مكارم الأخلاق والقيم النبوية في نفوس الناشئة عبر قصص مشوقة ومواقف تربوية هادفة مستوحاة من السنة المطهرة.</p>',
                'book_image' => '40_hadith_for_children.jpg',
                'pdf_file' => '40_hadith_for_children.pdf',
            ],

            // 4. Sohoj Jamalul Quran
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subTajweed->id,
                'title_bn' => 'সহজ জামালুল কুরআন (তাজবীদ শিক্ষাসহ)',
                'title_en' => 'Sohoj Jamalul Quran (With Tajweed Rules)',
                'title_ab' => 'جمال القرآن مع أحكام التجويد',
                'des_bn' => '<p>হাকীমুল উম্মত হযরত মাওলানা আশরাফ আলী থানভী (রহ.) প্রণীত তাজবীদ শাস্ত্রের কালজয়ী কিতাব <strong>জামালুল কুরআন</strong>-এর সহজ বাংলা সংস্করণ। এতে হরফের মাখরাজ, সিফাত, মাদ ও গুন্নাহর নিয়মাবলী অত্যন্ত স্পষ্ট ভাষায় তুলে ধরা হয়েছে। সাথে সংযোজিত হয়েছে \'দশ মিনিটে তাজবীদ শিক্ষা\' পুস্তিকা।</p>',
                'des_en' => '<p><strong>Sohoj Jamalul Quran</strong> is the renowned treatise on Quranic phonetics and recitation by Hakimul Ummat Maulana Ashraf Ali Thanvi (Rah.), adapted into clear Bengali with practical rules for learners of all levels.</p>',
                'des_ab' => '<p>كتاب <strong>جمال القرآن</strong> لفضيلة حكيم الأمة الشيخ أشرف علي التانوي رحمه الله، من أمهات الكتب المختصرة في إتقان علم التجويد ومخارج الحروف، مع ملحق تعليم التجويد في عشر دقائق.</p>',
                'book_image' => 'sohoj_jamalul_quran.jpg',
                'pdf_file' => 'sohoj_jamalul_quran.pdf',
            ],

            // 5. Karima Pandenama
            [
                'category_id' => $catPersian->id,
                'subcategory_id' => $subPersianKitab->id,
                'title_bn' => 'কারিমা (পান্দেনামা)',
                'title_en' => 'Karima (Pand-e-Nama)',
                'title_ab' => 'كريما (پند نامه)',
                'des_bn' => '<p>ফার্সি সাহিত্যের চিরন্তন নীতিকাব্য <strong>কারিমা</strong>। এতে স্রষ্টার প্রশংসা, নবীপ্রেম, বিনয়, তাকওয়া, পিতামাতার আনুগত্য এবং আত্মার পরিশুদ্ধি বিষয়ক অমূল্য কবিতা সংকলিত হয়েছে। শিক্ষার্থীদের সুবিধার্থে ফার্সি মূল পাঠের সাথে বাংলা উচ্চারণ ও অর্থ প্রদান করা হয়েছে।</p>',
                'des_en' => '<p><strong>Karima</strong> is a celebrated classical Persian poetic masterpiece imparting moral teachings, spiritual wisdom, humility, and devout living, presented with phonetic pronunciation and Bengali translation.</p>',
                'des_ab' => '<p>منظومة <strong>كريما</strong> الفارسية الخالدة في الحكمة والتزكية ومكارم الأخلاق، تتضمن النظم الأصلي مع النطق الحرفي والترجمة البنغالية لطلبة العلم.</p>',
                'book_image' => 'karima_pande_nama.jpg',
                'pdf_file' => 'karima_pande_nama.pdf',
            ],

            // 6. Full Noorani Qaida (MQIA)
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subQaida->id,
                'title_bn' => 'পূর্ণাঙ্গ আরবি নূরানী কায়দা (MQ ইসলামিক একাডেমি)',
                'title_en' => 'Full Noorani Qaida (MQ Islamic Academy)',
                'title_ab' => 'القاعدة النورانية الكاملة (أكاديمية إم كيو)',
                'des_bn' => '<p>পবিত্র কুরআনুল কারীম শুদ্ধ ও সহীহ উচ্চারণে তিলাওয়াত শিক্ষার উদ্দেশ্যে <strong>এম কিউ ইসলামিক একাডেমি (MQ Islamic Academy)</strong> কর্তৃক সংকলিত পূর্ণাঙ্গ আরবি নূরানী কায়দা। এতে আরবি ২৯টি হরফ, মুরাক্কাবাত, হরকত, তানভীন, সাকিন, তাশদীদ, মাদ ও ওয়াকফের নিয়ম সুন্দরভাবে সাজানো হয়েছে।</p>',
                'des_en' => '<p><strong>Full Noorani Qaida</strong> developed by MQ Islamic Academy provides a comprehensive, structured curriculum for beginners to master Arabic letter articulation, vowel markings, Sakin, Tashdeed, and foundational recitation.</p>',
                'des_ab' => '<p><strong>القاعدة النورانية الكاملة</strong> من إصدارات أكاديمية إم كيو الإسلامية، منهج متكامل وشامل لتعليم قراءة الحروف الهجائية والتراكيب والحركات والسكون والشدة للمبتدئين.</p>',
                'book_image' => 'full_noorani_qaida_mqia.jpg',
                'pdf_file' => 'full_noorani_qaida_mqia.pdf',
            ],

            // 7. Noorani Tajweed Shikkha (MQIA)
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subTajweed->id,
                'title_bn' => 'নূরানী তাজবীদ শিক্ষা (সহীহ কুরআন তিলাওয়াত ও মাখরাজ কায়দা)',
                'title_en' => 'Noorani Tajweed Shikkha (MQ Islamic Academy)',
                'title_ab' => 'تعليم التجويد النوراني (أكاديمية إم كيو)',
                'des_bn' => '<p>সহীহ কুরআন তিলাওয়াত ও বিশুদ্ধ মাখরাজ অর্জনের জন্য <strong>এম কিউ ইসলামিক একাডেমি</strong>র বিশেষ তাজবীদ কিতাব। ১৭টি মাখরাজ, নূন সাকিন ও তানভীনের ৪টি নিয়ম (ইযহার, ইদগাম, ইকলাব, ইখফা), মিম সাকিনের নিয়মাবলী ও ওয়াকফের নিয়ম সবিস্তারে ব্যাখ্যা করা হয়েছে।</p>',
                'des_en' => '<p><strong>Noorani Tajweed Shikkha</strong> published by MQ Islamic Academy covers the 17 Makharij, rules of Noon Sakin and Tanween, Meem Sakin rules, Mudood, and stopping points (Waqf) for accurate Quranic recitation.</p>',
                'des_ab' => '<p>كتاب <strong>تعليم التجويد النوراني</strong> الصادر عن أكاديمية إم كيو الإسلامية، يشتمل على دراسة مفصلة لمخارج الحروف السبعة عشر وأحكام النون الساكنة والتنوين والميم الساكنة والمدود والوقف.</p>',
                'book_image' => 'tajweed_book_mqia.jpg',
                'pdf_file' => 'tajweed_book_mqia.pdf',
            ],

            // 8. Sohoj Pande Nama
            [
                'category_id' => $catPersian->id,
                'subcategory_id' => $subPersianKitab->id,
                'title_bn' => 'সহজ পান্দে নামা',
                'title_en' => 'Sohoj Pande Nama (Book of Counsel)',
                'title_ab' => 'سهل پند نامه (كتاب النصائح)',
                'des_bn' => '<p>বিশ্ববিখ্যাত সুফি কবি শায়খ ফরীদ উদ্দীন আত্তার (রহ.) রচিত অমূল্য ফার্সি নীতিকাব্য <strong>পান্দে নামা</strong>। মাওলানা হাফিজুর রহমান যশোরী কর্তৃক প্রাঞ্জল বাংলা অনুবাদ ও ব্যাখ্যায় সমৃদ্ধ এই কিতাবে আত্মিক সংশোধন, বিনম্রতা, মানবসেবা ও পরকালীন মুক্তির পথ নির্দেশ করা হয়েছে।</p>',
                'des_en' => '<p><strong>Sohoj Pande Nama</strong> (The Book of Counsel) by the eminent Persian poet Shaykh Fariduddin Attar (Rah.) offers profound moral guidelines, spiritual self-discipline, and virtuous conduct translated with helpful commentary.</p>',
                'des_ab' => '<p>كتاب <strong>پند نامه</strong> للشاعر الصوفي الكبير الشيخ فريد الدين العطار رحمه الله، يضم أروع الحكم والوصايا التربوية في تهذيب النفوس وصلاح القلوب، مع ترجمة بنغالية ميسرة.</p>',
                'book_image' => 'sohoj_pande_nama.jpg',
                'pdf_file' => 'sohoj_pande_nama.pdf',
            ],

            // 9. Safwatul Masader
            [
                'category_id' => $catArabic->id,
                'subcategory_id' => $subNahw->id,
                'title_bn' => 'আরবী ছাফওয়াতুল মাছাদির (লোগাতে জাদীদাসহ)',
                'title_en' => 'Safwatul Masadir (Arabic Verbs & Roots)',
                'title_ab' => 'صفوة المصادر مع لغات وألفاظ جديدة',
                'des_bn' => '<p>মাওলানা মুশতাক আহমাদ (রহ.) রচিত এবং মাওলানা মুহাম্মদ যুবায়ের অনূদিত <strong>ছাফওয়াতুল মাছাদির</strong> আরবি ব্যাকরণ ও সরফ শাস্ত্রের একটি প্রামাণ্য সহায়ক গ্রন্থ। এতে আরবি ক্রিয়ামূল (মাসদার), বিভিন্ন বাবের রূপান্তর এবং আধুনিক আরবি ভাষার দরকারি শব্দার্থ ও পরিভাষা সন্নিবেশিত রয়েছে।</p>',
                'des_en' => '<p><strong>Safwatul Masadir</strong> is an authoritative Arabic morphology and vocabulary reference detailing verbal roots (Masadir), verb conjugations, and contemporary terminology for serious students of Islamic studies.</p>',
                'des_ab' => '<p>كتاب <strong>صفوة المصادر</strong> في أوزان الأفعال والمصادر العربية وتصريفها للشيخ مشتاق أحمد رحمه الله، مزود بملحق الألفاظ واللغات الحديثة لخدمة الدارسين والباحثين.</p>',
                'book_image' => 'safwatul_masadir.jpg',
                'pdf_file' => 'safwatul_masadir.pdf',
            ],

            // 10. Shochitro Namaz Shikkha
            [
                'category_id' => $catDua->id,
                'subcategory_id' => $subNamaz->id,
                'title_bn' => 'ছোটদের জন্য সচিত্র সহজ নামাজ শিক্ষা (আস-সালাতু মি\'রাজুল মু\'মিন)',
                'title_en' => 'Illustrated Easy Prayer Learning for Children (As-Salatu Mi\'rajul Mu\'min)',
                'title_ab' => 'الصلاة معراج المؤمن - تعليم الصلاة المصور للأطفال',
                'des_bn' => '<p>শিশুদের সুন্দরভাবে নামাজ শেখানোর জন্য সচিত্র রঙিন বই <strong>ছোটদের জন্য সচিত্র সহজ নামাজ শিক্ষা</strong>। অজু, গোসল, তায়াম্মুম, নামাজের বিভিন্ন রুকন, ওয়াজিব ও সুন্নত আমলসমূহ বাস্তবসম্মত ছবির মাধ্যমে প্রাঞ্জলভাবে তুলে ধরা হয়েছে।</p>',
                'des_en' => '<p>An engaging illustrated prayer manual for kids, teaching the step-by-step performance of Wudu, Salah postures, essential Surahs, and supplications with colorful visual illustrations.</p>',
                'des_ab' => '<p>دليل <strong>تعليم الصلاة المصور للأطفال</strong> يوضح كيفية الوضوء والتيمم وأداء الصلوات الخمس بالتفصيل وبالصور الملونة لتيسير الفهم على الصغار والناشئة.</p>',
                'book_image' => 'shochitro_namaz_shikkha.jpg',
                'pdf_file' => 'shochitro_namaz_shikkha.pdf',
            ],

            // 11. Chitro Shoho Tajweed Shikkha
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subTajweed->id,
                'title_bn' => 'চিত্রসহ তাজবীদ শিক্ষা (আত-তাজবীদুল মুসাওওয়ার)',
                'title_en' => 'Illustrated Tajweed (At-Tajweed Al-Musawwar)',
                'title_ab' => 'التجويد المصور (عربي - بنغالي)',
                'des_bn' => '<p>বিশ্ববিখ্যাত তাজবীদ বিশারদ ড. আয়মান রুশদী সুওয়াইদ রচিত বিশ্বনন্দিত কিতাব <strong>আত-তাজবীদুল মুসাওওয়ার</strong> এর বাংলা অনুবাদ। মানব মুখমণ্ডলের ত্রিমাত্রিক চিত্র ও অঙ্গসংস্থানের মাধ্যমে প্রতিটি অক্ষরের সঠিক মাখরাজ ও সিফাত নিখুঁতভাবে চিত্রিত করা হয়েছে।</p>',
                'des_en' => '<p>The Bengali translation of Dr. Ayman Rushdi Suwaid\'s globally acclaimed masterpiece <strong>At-Tajweed Al-Musawwar</strong>, providing detailed anatomical illustrations and charts for Arabic phonetics and Tajweed rules.</p>',
                'des_ab' => '<p>النسخة المترجمة لكتاب <strong>التجويد المصور</strong> للدكتور أيمن رشدي سويد، الذي يعد المرجع المصور الأهم في بيان مخارج الحروف وصفاتها بالرسومات التشريحية الملونة.</p>',
                'book_image' => 'chitro_shoho_tajweed_shikkha.jpg',
                'pdf_file' => 'chitro_shoho_tajweed_shikkha.pdf',
            ],

            // 12. Tilawat Noorani Qaida
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subQaida->id,
                'title_bn' => 'তিলাওয়াত নূরানী কায়দা (আরবী ২৯ হরফ)',
                'title_en' => 'Tilawat Noorani Qaida (Arabic 29 Letters)',
                'title_ab' => 'قاعدة التلاوة النورانية (حروف الهجاء المفردة)',
                'des_bn' => '<p>কুরআন শিক্ষার প্রথম সোপান <strong>তিলাওয়াত নূরানী কায়দা</strong>। এতে শিশুদের সুবিধার্থে বড় ও স্পষ্ট ফন্টে আরবি ২৯টি একক হরফ, হরফের রূপান্তর ও প্রাথমিক উচ্চারণবিধি রঙিন ছকে উপস্থাপন করা হয়েছে।</p>',
                'des_en' => '<p><strong>Tilawat Noorani Qaida</strong> is a beginner-friendly primer focusing on the 29 Arabic alphabet characters, their shapes, and initial phonetic identification in an attractive grid layout.</p>',
                'des_ab' => '<p><strong>قاعدة التلاوة النورانية</strong> لتعليم الحروف الهجائية التسعة والعشرين المفردة ونطقها السليم بالخط الواضح والألوان الميسرة للأطفال والدارسين الجدد.</p>',
                'book_image' => 'tilawat_noorani_qaida.jpg',
                'pdf_file' => 'tilawat_noorani_qaida.pdf',
            ],

            // 13. Dua-e-Masnun
            [
                'category_id' => $catDua->id,
                'subcategory_id' => $subMasnunDua->id,
                'title_bn' => 'কুরআন-হাদীসের আলোকে দো\'আয়ে মাসনূন (দিবা-রাত্রি পড়ার সুন্নত দোয়াসমূহ)',
                'title_en' => 'Quran-Hadither Aloke Du\'a-e-Masnun (Daily Sunnah Supplications)',
                'title_ab' => 'أدعية مسنونة في ضوء القرآن والحديث',
                'des_bn' => '<p>মাওলানা মুহাম্মদ আবদুল হাই নদভী সংকলিত <strong>কুরআন-হাদীসের আলোকে দো\'আয়ে মাসনূন</strong> গ্রন্থে দৈনন্দিন জীবনের সকাল-সন্ধ্যা, খাওয়া-দাওয়া, নিদ্রা, ভ্রমণ, রোগমুক্তি ও বিভিন্ন বিশেষ মুহূর্তের জন্য কুরআন ও সহীহ হাদিস বর্ণিত মাসনুন দোয়াসমূহ আরবি পাঠ, বাংলা উচ্চারণ ও অর্থসহ সংকলিত হয়েছে।</p>',
                'des_en' => '<p><strong>Dua-e-Masnun in Light of Quran & Hadith</strong> compiled by Maulana Muhammad Abdul Hai An-Nadvi brings together authentic daily prophetic supplications for morning, evening, and various life occasions with Bengali transliteration and translation.</p>',
                'des_ab' => '<p>كتيب <strong>أدعية مسنونة في ضوء القرآن والحديث</strong> للشيخ محمد عبد الحي الندوي، يجمع الأذكار والأدعية النبوية اليومية لحفظ المسلم وتوثيق صلته بالله تعالى.</p>',
                'book_image' => 'dua_e_masnun.jpg',
                'pdf_file' => 'dua_e_masnun.pdf',
            ],

            // 14. Sifaat al-Huroof
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subTajweed->id,
                'title_bn' => 'সিফাতুল হুরুফ (হরফের গুণাবলী ও তাজবীদ বিধি)',
                'title_en' => 'Characteristics of the Letter (Sifaat al-Huroof - Tajweed 101)',
                'title_ab' => 'صفات الحروف وأحكام التجويد',
                'des_bn' => '<p>ইসলামিক অনলাইন ইউনিভার্সিটি (IOU) এর তাজবীদ কোর্সের আলোকে প্রণীত <strong>সিফাতুল হুরুফ</strong> নির্দেশিকা। এতে আরবি অক্ষরের স্থায়ী সিফাত (হামস, জাহর, শিদ্দাত, রিখওয়াহ, ইতবাক ইত্যাদি) ও অস্থায়ী সিফাতসমূহ ইংরেজি ও আরবি ভাষায় তুলনামূলক ছকের মাধ্যমে বিশ্লেষিত হয়েছে।</p>',
                'des_en' => '<p><strong>Characteristics of the Letter (Sifaat al-Huroof)</strong> is a specialized Tajweed reference from the Islamic Online University (IOU) detailing permanent and conditional attributes of Arabic letters with comparative phonetics.</p>',
                'des_ab' => '<p>مقرر دراسي في <strong>صفات الحروف</strong> الذاتية والعارضة من إعداد الجامعة الإسلامية المفتوحة (IOU)، يتناول أحكام الهمس والجهر والشدة والاستعلاء والإطباق بأسلوب أكاديمي مقارن.</p>',
                'book_image' => 'sifaat_al_huroof.jpg',
                'pdf_file' => 'sifaat_al_huroof.pdf',
            ],

            // 15. Tajweed Shikkha
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subTajweed->id,
                'title_bn' => 'তাজবীদ শিক্ষা (সহজ নিয়মে কুরআন পড়া)',
                'title_en' => 'Tajweed Shikkha (Easy Quranic Recitation)',
                'title_ab' => 'تعليم التجويد وقواعد التلاوة',
                'des_bn' => '<p>ইসলামিক এডুকেশন সোসাইটি কর্তৃক সংকলিত <strong>তাজবীদ শিক্ষা</strong> বইটিতে সাধারণ পাঠক ও শিক্ষার্থীদের জন্য সহজবোধ্য ভাষায় কুরআন শুদ্ধভাবে পড়ার মৌলিক নিয়মাবলী ও উদাহরণ তুলে ধরা হয়েছে।</p>',
                'des_en' => '<p><strong>Tajweed Shikkha</strong> published by the Islamic Education Society provides practical instructions and illustrative examples for mastering accurate Quranic recitation effortlessly.</p>',
                'des_ab' => '<p>كتاب <strong>تعليم التجويد</strong> من إصدار جمعية التعليم الإسلامي، يهدف إلى تمكين عامة المسلمين والطلاب من تلاوة القرآن الكريم بالتجويد السليم وفق القواعد المعتمدة.</p>',
                'book_image' => 'tajweed_shikkha.jpg',
                'pdf_file' => 'tajweed_shikkha.pdf',
            ],

            // 16. Ad'iyah-e-Masnunah
            [
                'category_id' => $catDua->id,
                'subcategory_id' => $subMasnunDua->id,
                'title_bn' => 'আদ্\'ইয়ায়ে মাছনূনাহ্ (দৈনন্দিন মাসনুন দোয়া)',
                'title_en' => 'Ad\'iyah-e-Masnunah (Daily Supplications)',
                'title_ab' => 'الأدعية المسنونة اليومية',
                'des_bn' => '<p>নাদিয়াতুল ক্বোরআন (মুসলিম শিশু শিক্ষা উন্নয়ন সংস্থা বাংলাদেশ) কর্তৃক প্রকাশিত <strong>আদ্\'ইয়ায়ে মাছনূনাহ্</strong>। এতে শিক্ষার্থী ও সাধারণ মুসলমানদের প্রাত্যহিক জীবনের প্রয়োজনীয় দোআ, দরূদ ও মুনাজাত বাংলা উচ্চারণ ও অর্থসহ পরিচ্ছন্নভাবে বিন্যস্ত করা হয়েছে।</p>',
                'des_en' => '<p><strong>Ad\'iyah-e-Masnunah</strong> published by Nadiyatul Quran is a pocket guide of essential daily Sunnah supplications, Salawat, and prayers formatted for effortless daily memorization.</p>',
                'des_ab' => '<p>كتيب <strong>الأدعية المسنونة</strong> الصادر عن مؤسسة نادية القرآن، يضم باقة من الأدعية النبوية المأثورة والأذكار المباركة لليوم والليلة.</p>',
                'book_image' => 'adiyah_e_masnunah.jpg',
                'pdf_file' => 'adiyah_e_masnunah.pdf',
            ],

            // 17. Color Coded Taher Ampara
            [
                'category_id' => $catQuran->id,
                'subcategory_id' => $subQaida->id,
                'title_bn' => 'তাজবীদ কালার কোডেড তাহের আমপারা (৩০তম পারা)',
                'title_en' => 'Color Coded Taher Ampara (30th Para - Juz Amma)',
                'title_ab' => 'جزء عم الملون بأحكام التجويد',
                'des_bn' => '<p>পবিত্র কুরআনুল কারীমের ৩০তম পারা (আমপারা) তাজবীদ কালার কোডিং সংবলিত বিশেষ সংস্করণ <strong>তাহের আমপারা</strong>। এতে ইদগাম, ইখফা, কলকলা, গুন্নাহ ও মদের হরফসমূহ পৃথক রঙে চিহ্নিত হওয়ায় শিশু ও শিক্ষার্থীরা তাজবীদের নিয়মানুযায়ী সঠিক উচ্চারণে সূরাসমূহ মুখস্থ ও তিলাওয়াত করতে পারে।</p>',
                'des_en' => '<p><strong>Color Coded Taher Ampara</strong> features the complete 30th Para of the Holy Quran (Juz Amma) enhanced with Tajweed color-coding for letters of Ghunnah, Ikhfa, Qalqalah, and Madd, enabling students to recite with flawless Tajweed.</p>',
                'des_ab' => '<p>مصحف <strong>جزء عم الملون بأحكام التجويد</strong> المتميز بتلوين الحروف الدالة على أحكام الغنة والإخفاء والإدغام والمدود، لتيسير الحفظ والتلاوة المتقنة على الطلاب والناشئة.</p>',
                'book_image' => 'color_coded_taher_ampara.jpg',
                'pdf_file' => 'color_coded_taher_ampara.pdf',
            ],
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
}
