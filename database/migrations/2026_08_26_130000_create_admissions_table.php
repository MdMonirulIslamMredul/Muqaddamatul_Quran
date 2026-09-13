<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // Tracking & Academic Info
            $table->string('application_no', 50)->unique()->nullable();
            $table->string('academic_year', 30)->nullable(); // e.g. 2026, 2026-2027
            $table->string('desired_class', 60)->nullable(); // যে শ্রেণিতে ভর্তি হতে ইচ্ছুক
            $table->string('department_division', 60)->nullable(); // বিভাগ: নূরানী / নাজেরা / হিফয / শুনানী / প্রতিযোগিতা
            $table->string('residential_type', 40)->nullable(); // আবাসিক / অনাবাসিক / ডে-কেয়ার

            // ১. শিক্ষার্থীর নাম (বাংলা ও ইংরেজি) & সাধারণ তথ্যাবলী
            $table->string('student_name_bn', 120)->nullable();
            $table->string('student_name_en', 120)->nullable();
            $table->date('dob')->nullable(); // ৪. জন্ম তারিখ
            $table->string('age', 30)->nullable(); // বয়স
            $table->string('blood_group', 15)->nullable(); // ৫. রক্তের গ্রুপ
            $table->string('nationality', 50)->default('বাংলাদেশী')->nullable(); // জাতীয়তা
            $table->string('religion', 50)->default('ইসলাম')->nullable(); // ধর্ম
            $table->string('student_photo', 190)->nullable(); // শিক্ষার্থীর ছবি

            // ৮. বর্তমান ঠিকানা
            $table->text('present_address')->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email', 100)->nullable();

            // ৯. স্থায়ী ঠিকানা
            $table->string('permanent_village', 100)->nullable();
            $table->string('permanent_post_office', 100)->nullable();
            $table->string('permanent_post_code', 20)->nullable();
            $table->string('permanent_upazila', 80)->nullable();
            $table->string('permanent_district', 80)->nullable();

            // ১০. পূর্ববর্তী প্রতিষ্ঠানের তথ্য
            $table->string('previous_institute_name', 150)->nullable();
            $table->text('previous_institute_address')->nullable();
            $table->string('previous_class', 50)->nullable();

            // ২. পিতার নাম ও তথ্যাবলী
            $table->string('father_name_bn', 120)->nullable();
            $table->string('father_name_en', 120)->nullable();
            $table->string('father_education', 80)->nullable();
            $table->string('father_profession', 80)->nullable();
            $table->string('father_designation', 80)->nullable();
            $table->string('father_contact', 50)->nullable();
            $table->string('father_photo', 190)->nullable();

            // ৩. মাতার নাম ও তথ্যাবলী
            $table->string('mother_name_bn', 120)->nullable();
            $table->string('mother_name_en', 120)->nullable();
            $table->string('mother_education', 80)->nullable();
            $table->string('mother_profession', 80)->nullable();
            $table->string('mother_designation', 80)->nullable();
            $table->string('mother_contact', 50)->nullable();
            $table->string('mother_photo', 190)->nullable();

            // ১১. প্রকৃত অভিভাবক
            $table->string('guardian_name', 120)->nullable();
            $table->string('guardian_father_name', 120)->nullable();
            $table->string('guardian_education', 80)->nullable();
            $table->string('guardian_profession', 80)->nullable();
            $table->string('guardian_designation', 80)->nullable();
            $table->text('guardian_workplace_address')->nullable();
            $table->text('guardian_present_address')->nullable();
            $table->string('guardian_permanent_village', 100)->nullable();
            $table->string('guardian_permanent_post_office', 100)->nullable();
            $table->string('guardian_permanent_post_code', 20)->nullable();
            $table->string('guardian_permanent_upazila', 80)->nullable();
            $table->string('guardian_permanent_district', 80)->nullable();
            $table->string('guardian_relation_info', 100)->nullable();
            $table->string('guardian_annual_income', 50)->nullable();
            $table->string('guardian_income_source', 80)->nullable();
            $table->string('guardian_mobile', 30)->nullable();
            $table->string('guardian_email', 100)->nullable();
            $table->string('guardian_photo', 190)->nullable();

            // ১২. ক্যাম্পাস/হোস্টেল থেকে শিক্ষার্থীকে যিনি আনা-নেওয়া করবেন
            $table->string('pick_drop_name', 120)->nullable();
            $table->text('pick_drop_address')->nullable();
            $table->string('pick_drop_relation', 60)->nullable();
            $table->string('pick_drop_mobile', 30)->nullable();
            $table->string('pick_drop_phone', 30)->nullable();
            $table->string('pick_drop_photo', 190)->nullable();

            // ১৩. স্থানীয় অভিভাবক
            $table->string('local_guardian_name', 120)->nullable();
            $table->text('local_guardian_address')->nullable();
            $table->string('local_guardian_relation', 60)->nullable();
            $table->string('local_guardian_mobile', 30)->nullable();
            $table->string('local_guardian_phone', 30)->nullable();
            $table->string('local_guardian_photo', 190)->nullable();

            // ১৪. রেফারেল
            $table->string('ref_name', 120)->nullable();
            $table->string('ref_profession', 80)->nullable();
            $table->string('ref_designation', 80)->nullable();
            $table->text('ref_organization_address')->nullable();
            $table->text('ref_special_info')->nullable();
            $table->string('ref_relation', 60)->nullable();
            $table->string('ref_mobile', 30)->nullable();
            $table->string('ref_phone', 30)->nullable();
            $table->string('ref_photo', 190)->nullable();

            // ১৮. শিক্ষার্থীর বিশেষ তথ্য
            $table->string('siblings_info', 100)->nullable(); // ভাই বোন
            $table->text('birth_details')->nullable(); // জন্ম বৃত্তান্ত
            $table->string('height', 30)->nullable(); // উচ্চতা
            $table->string('weight', 30)->nullable(); // ওজন
            $table->string('complexion', 40)->nullable(); // গায়ের রং
            $table->string('identification_mark', 120)->nullable(); // বিশেষ চিহ্ন
            $table->text('special_disease')->nullable(); // বিশেষ রোগ

            // ২১. আবেদনপত্রের সাথে যা সংযুক্ত করতে হবে (চেকলিস্ট ও আপলোডকৃত ফাইল)
            $table->boolean('doc_student_photos')->default(false);
            $table->boolean('doc_guardian_photos')->default(false);
            $table->boolean('doc_birth_certificate')->default(false);
            $table->boolean('doc_nid')->default(false);
            $table->boolean('doc_tc')->default(false);
            $table->string('birth_certificate_file', 190)->nullable();
            $table->string('nid_file', 190)->nullable();
            $table->string('tc_file', 190)->nullable();

            // ১৯. ভর্তি পরীক্ষার ফলাফল (অফিস কর্তৃক পূরণীয়)
            $table->decimal('marks_hifz_nazera', 5, 2)->nullable(); // max 50
            $table->decimal('marks_tajweed', 5, 2)->nullable(); // max 30
            $table->decimal('marks_pronunciation', 5, 2)->nullable(); // max 20
            $table->decimal('marks_bangla', 5, 2)->nullable(); // max 20
            $table->decimal('marks_english', 5, 2)->nullable(); // max 20
            $table->decimal('marks_math', 5, 2)->nullable(); // max 20
            $table->decimal('marks_general_knowledge', 5, 2)->nullable(); // max 40
            $table->decimal('obtained_marks', 5, 2)->nullable(); // total marks (out of 200)
            $table->decimal('percentage_marks', 5, 2)->nullable(); // percentage (%)

            // ২০. ভর্তি পরীক্ষার ফলাফল ও তিলাওয়াত অবস্থা
            $table->date('admission_test_date')->nullable();
            $table->string('admission_test_result', 60)->nullable(); // উত্তীর্ণ / অনুত্তীর্ণ / অপেক্ষমান
            $table->text('quran_recitation_status')->nullable(); // কুরআন তিলাওয়াতের অবস্থা

            // ২২. ভর্তির অনুমোদন
            $table->enum('status', ['pending', 'under_review', 'test_scheduled', 'passed', 'approved', 'rejected', 'completed'])->default('pending');
            $table->string('assigned_roll_no', 40)->nullable(); // রোল নং
            $table->string('approved_class', 60)->nullable(); // অনুমোদিত ক্লাস
            $table->string('approved_department', 60)->nullable(); // অনুমোদিত বিভাগ
            $table->date('approval_date')->nullable();
            $table->text('admin_notes')->nullable();

            // Submission type & IP
            $table->string('entry_type', 30)->default('online'); // online, offline_office
            $table->string('ip_address', 45)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
