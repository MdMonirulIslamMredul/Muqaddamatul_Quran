<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if($isFilled)
            ভর্তি আবেদন ফরম - {{ $admission->application_no }} ({{ $admission->student_name_bn ?: $admission->student_name_en }})
        @else
            মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা - ভর্তি আবেদন ফরম (অফলাইন প্রিন্ট কপি)
        @endif
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* ================= BASE PRINT & A4 STYLES ================= */
        * {
            box-sizing: border-box;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: 'Hind Siliguri', 'SolaimanLipi', Arial, sans-serif;
            color: #111827;
            font-size: 13.5px;
            line-height: 1.42;
        }

        /* Floating Actions Toolbar */
        .print-toolbar {
            position: fixed;
            top: 15px;
            right: 20px;
            z-index: 9999;
            display: flex;
            gap: 10px;
            background: rgba(255, 255, 255, 0.95);
            padding: 10px 16px;
            border-radius: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border: 1px solid #cbd5e1;
        }
        .print-btn {
            background: #166534;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .print-btn:hover {
            background: #14532d;
            color: #ffffff;
        }
        .print-btn-secondary {
            background: #475569;
        }
        .print-btn-secondary:hover {
            background: #334155;
        }

        /* A4 Page Container (Physical Booklet Aspect Ratio) */
        .page-container {
            width: 210mm;
            min-height: 297mm;
            margin: 25px auto;
            background: #ffffff;
            padding: 14mm 15mm 12mm 15mm;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: relative;
            page-break-after: always;
            border: 1px solid #e2e8f0;
            background-color: #fcfefc;
            /* Subtle Arabesque Geometric Pattern */
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(45, 106, 79, 0.04) 12%, transparent 13%),
                radial-gradient(circle at 0% 0%, rgba(45, 106, 79, 0.03) 12%, transparent 13%),
                radial-gradient(circle at 100% 100%, rgba(45, 106, 79, 0.03) 12%, transparent 13%);
            background-size: 24px 24px;
        }

        .page-inner-border {
            border: 2px solid #2d6a4f;
            min-height: calc(297mm - 26mm);
            padding: 12px 14px 10px 14px;
            position: relative;
            background-color: rgba(255, 255, 255, 0.95);
        }

        /* Arabic Calligraphy Header */
        .bismillah {
            font-family: 'Amiri', 'Traditional Arabic', serif;
            font-size: 21px;
            text-align: center;
            margin: 0 0 2px 0;
            color: #1b4332;
            font-weight: bold;
        }
        .madrasah-title {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 4px 0;
            color: #081c15;
            letter-spacing: 0.3px;
        }
        .form-badge-wrap {
            text-align: center;
            margin-bottom: 10px;
        }
        .form-badge {
            display: inline-block;
            background: #1b4332;
            color: #ffffff;
            padding: 3px 20px;
            border-radius: 14px;
            font-size: 14.5px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Photo Box */
        .photo-box {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 82px;
            height: 98px;
            border: 1.5px solid #2d6a4f;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            background: #fafafa;
            overflow: hidden;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-box-inline {
            width: 76px;
            height: 88px;
            border: 1.5px solid #2d6a4f;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            color: #555;
            background: #fafafa;
            float: right;
            margin-left: 10px;
            margin-bottom: 4px;
            overflow: hidden;
        }
        .photo-box-inline img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Application Header Lines */
        .salutation-text {
            font-size: 13.5px;
            margin-bottom: 8px;
            line-height: 1.55;
        }
        .fill-blank {
            display: inline-block;
            border-bottom: 1px dotted #333;
            min-width: 90px;
            text-align: center;
            font-weight: 600;
            color: #0b3c5d;
            padding: 0 4px;
        }

        /* Form Row Layouts */
        .form-section-item {
            margin-bottom: 6px;
            clear: both;
        }
        .item-label {
            font-weight: 600;
            color: #111;
            display: inline-block;
        }
        .dotted-fill {
            flex: 1;
            border-bottom: 1px dotted #555;
            min-height: 19px;
            font-weight: 600;
            color: #0f172a;
            padding: 0 4px;
        }
        .dotted-row {
            display: flex;
            align-items: flex-end;
            margin-bottom: 5px;
            gap: 6px;
        }

        /* Checkboxes */
        .checkbox-custom {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-right: 16px;
            font-weight: 500;
        }
        .box-square {
            display: inline-block;
            width: 15px;
            height: 15px;
            border: 1.5px solid #222;
            text-align: center;
            line-height: 13px;
            font-size: 12px;
            font-weight: bold;
            vertical-align: middle;
        }

        /* Tables */
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin: 6px 0;
            font-size: 13px;
        }
        .form-table th, .form-table td {
            border: 1px solid #333;
            padding: 4px 6px;
            text-align: center;
        }
        .form-table th {
            background-color: #edf5ee;
            font-weight: 700;
        }
        .form-table td.text-left {
            text-align: left;
        }

        /* Section Headings */
        .sec-title {
            font-weight: 700;
            font-size: 14px;
            color: #0f172a;
            margin-top: 6px;
            margin-bottom: 4px;
        }

        /* Terms / Rules lists */
        .rules-list {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
            line-height: 1.5;
        }
        .rules-list li {
            margin-bottom: 3px;
        }
        .bullet-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 13px;
            line-height: 1.5;
        }
        .bullet-list li {
            position: relative;
            padding-left: 14px;
            margin-bottom: 3px;
        }
        .bullet-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            font-size: 16px;
            color: #1b4332;
        }

        /* Signatures Area */
        .sig-block {
            margin-top: 12px;
            padding-top: 4px;
        }
        .sig-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 22px;
            font-size: 13px;
            font-weight: 600;
        }
        .sig-item {
            text-align: center;
            min-width: 140px;
            border-top: 1px dotted #333;
            padding-top: 4px;
        }

        /* Page Number Watermark / Footer */
        .page-footer-note {
            position: absolute;
            bottom: 4px;
            left: 14px;
            right: 14px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #64748b;
            border-top: 1px solid #e2e8f0;
            padding-top: 2px;
        }

        /* Print Media Query */
        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }
            .print-toolbar {
                display: none !important;
            }
            .page-container {
                width: 100% !important;
                min-height: 100vh !important;
                margin: 0 !important;
                padding: 8mm 8mm 8mm 8mm !important;
                box-shadow: none !important;
                border: none !important;
                page-break-after: always !important;
            }
            .page-inner-border {
                min-height: 275mm !important;
            }
        }
    </style>
</head>
<body>

    <!-- Print / Action Toolbar (Hidden during print) -->
    <div class="print-toolbar">
        <a href="{{ route('online.admission') }}" class="print-btn print-btn-secondary">
            <i class="fa fa-arrow-left"></i> অনলাইন আবেদন
        </a>
        <a href="{{ route('admission.guidelines') }}" class="print-btn print-btn-secondary">
            <i class="fa fa-book"></i> ভর্তি নির্দেশিকা
        </a>
        <button type="button" class="print-btn" onclick="window.print()">
            <i class="fa fa-print"></i> ফরম প্রিন্ট করুন (Print A4)
        </button>
    </div>

    <!-- ========================================================================= -->
    <!-- ========================= PAGE 1 (IMAGE 2) ============================== -->
    <!-- ========================================================================= -->
    <div class="page-container">
        <div class="page-inner-border">

            <!-- Top Photo Box -->
            <div class="photo-box">
                @if($isFilled && $admission->student_photo)
                    <img src="{{ asset($admission->student_photo) }}" alt="Student">
                @else
                    ছবি<br><span style="font-size:10px; font-weight:normal">(১ কপি)</span>
                @endif
            </div>

            <!-- Header -->
            <p class="bismillah">بِسْمِ ٱللّٰهِ ٱلرَّحْمٰنِ ٱلرَّحِيمِ</p>
            <h1 class="madrasah-title">{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</h1>
            <div class="form-badge-wrap">
                <span class="form-badge">আবেদন ফরম</span>
            </div>

            <div class="salutation-text">
                বরাবর<br>
                প্রিন্সিপাল,<br>
                {{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}<br>
                জনাব,<br>
                আসসালামু আলাইকুম।<br>
                আমি আপনার মাদরাসায় <span class="fill-blank" style="min-width: 100px;">{{ $isFilled ? ($admission->academic_year ?? date('Y')) : '..............' }}</span> শিক্ষাবর্ষে <span class="fill-blank" style="min-width: 110px;">{{ $isFilled ? ($admission->desired_class ?? '') : '..............' }}</span> শ্রেণিতে ভর্তির জন্য নিম্নোক্ত তথ্য প্রদান করলাম।
            </div>

            <!-- ১. শিক্ষার্থীর নাম -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">১. শিক্ষার্থীর নাম : বাংলায় :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->student_name_bn : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 95px;">
                    <span class="item-label">ইংরেজিতে :</span>
                    <span class="dotted-fill">{{ $isFilled ? strtoupper($admission->student_name_en ?? '') : '' }}</span>
                </div>
            </div>

            <!-- ২. পিতার নাম -->
            <div class="form-section-item">
                <div class="photo-box-inline">
                    @if($isFilled && $admission->father_photo)
                        <img src="{{ asset($admission->father_photo) }}" alt="Father">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="dotted-row">
                    <span class="item-label">২. পিতার নাম : বাংলায় :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->father_name_bn : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 78px;">
                    <span class="item-label">ইংরেজিতে :</span>
                    <span class="dotted-fill">{{ $isFilled ? strtoupper($admission->father_name_en ?? '') : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 78px;">
                    <span class="item-label">তথ্যাবলী : শিক্ষাগত যোগ্যতা :</span>
                    <span class="dotted-fill" style="max-width: 130px;">{{ $isFilled ? $admission->father_education : '' }}</span>
                    <span class="item-label">পেশা :</span>
                    <span class="dotted-fill" style="max-width: 130px;">{{ $isFilled ? $admission->father_profession : '' }}</span>
                    <span class="item-label">পদবি :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->father_designation : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 78px;">
                    <span class="item-label">যোগাযোগ :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->father_contact : '' }}</span>
                </div>
            </div>

            <!-- ৩. মাতার নাম -->
            <div class="form-section-item">
                <div class="photo-box-inline">
                    @if($isFilled && $admission->mother_photo)
                        <img src="{{ asset($admission->mother_photo) }}" alt="Mother">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="dotted-row">
                    <span class="item-label">৩. মাতার নাম : বাংলায় :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->mother_name_bn : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 80px;">
                    <span class="item-label">ইংরেজিতে :</span>
                    <span class="dotted-fill">{{ $isFilled ? strtoupper($admission->mother_name_en ?? '') : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 80px;">
                    <span class="item-label">তথ্যাবলী : শিক্ষাগত যোগ্যতা :</span>
                    <span class="dotted-fill" style="max-width: 130px;">{{ $isFilled ? $admission->mother_education : '' }}</span>
                    <span class="item-label">পেশা :</span>
                    <span class="dotted-fill" style="max-width: 130px;">{{ $isFilled ? $admission->mother_profession : '' }}</span>
                    <span class="item-label">পদবি :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->mother_designation : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 80px;">
                    <span class="item-label">যোগাযোগ :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->mother_contact : '' }}</span>
                </div>
            </div>

            <!-- ৪ & ৫. জন্ম তারিখ, বয়স, জাতীয়তা ও ধর্ম -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">৪. জন্ম তারিখ ও বয়স : জন্ম তারিখ :</span>
                    <span class="dotted-fill" style="max-width: 160px;">{{ $isFilled && $admission->dob ? $admission->dob->format('d/m/Y') : '' }}</span>
                    <span class="item-label">বয়স :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->age : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label">৫. জাতীয়তা ও ধর্ম : রক্তের গ্রুপ :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->blood_group : '' }}</span>
                    <span class="item-label">জাতীয়তা :</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->nationality : 'বাংলাদেশী' }}</span>
                    <span class="item-label">ধর্ম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->religion : 'ইসলাম' }}</span>
                </div>
            </div>

            <!-- ৬ & ৭. যে শ্রেণিতে ভর্তি হতে ইচ্ছুক ও ধরন -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">৬. যে শ্রেণিতে ভর্তি হতে ইচ্ছুক : শ্রেণি :</span>
                    <span class="dotted-fill" style="max-width: 220px;">{{ $isFilled ? $admission->desired_class : '' }}</span>
                    <span class="item-label">বিভাগ :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->department_division : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label">৭. ধরন :</span>
                    <span class="checkbox-custom" style="margin-left: 20px;">
                        আবাসিক <span class="box-square">{{ $isFilled && in_array($admission->residential_type, ['residential', 'আবাসিক']) ? '✓' : '' }}</span>
                    </span>
                    <span class="checkbox-custom" style="margin-left: 30px;">
                        অনাবাসিক <span class="box-square">{{ $isFilled && in_array($admission->residential_type, ['non_residential', 'অনাবাসিক']) ? '✓' : '' }}</span>
                    </span>
                    <span class="checkbox-custom" style="margin-left: 30px;">
                        ডে-কেয়ার <span class="box-square">{{ $isFilled && in_array($admission->residential_type, ['day_care', 'ডে-কেয়ার']) ? '✓' : '' }}</span>
                    </span>
                </div>
            </div>

            <!-- ৮. বর্তমান ঠিকানা -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">৮. বর্তমান ঠিকানা :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->present_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 95px;">
                    <span class="item-label">মোবাইল :</span>
                    <span class="dotted-fill" style="max-width: 170px;">{{ $isFilled ? $admission->mobile : '' }}</span>
                    <span class="item-label">ফোন :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->phone : '' }}</span>
                    <span class="item-label">ই-মেইল :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->email : '' }}</span>
                </div>
            </div>

            <!-- ৯. স্থায়ী ঠিকানা -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">৯. স্থায়ী ঠিকানা : গ্রাম :</span>
                    <span class="dotted-fill" style="max-width: 180px;">{{ $isFilled ? $admission->permanent_village : '' }}</span>
                    <span class="item-label">ডাকঘর :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->permanent_post_office : '' }}</span>
                    <span class="item-label">পোস্টকোড :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->permanent_post_code : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 80px;">
                    <span class="item-label">থানা/উপজেলা :</span>
                    <span class="dotted-fill" style="max-width: 200px;">{{ $isFilled ? $admission->permanent_upazila : '' }}</span>
                    <span class="item-label">জেলা :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->permanent_district : '' }}</span>
                </div>
            </div>

            <!-- ১০. পূর্ববর্তী প্রতিষ্ঠানের নাম -->
            <div class="form-section-item">
                <div class="dotted-row">
                    <span class="item-label">১০. পূর্ববর্তী প্রতিষ্ঠানের নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->previous_institute_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 30px;">
                    <span class="item-label">ঠিকানা :</span>
                    <span class="dotted-fill" style="max-width: 320px;">{{ $isFilled ? $admission->previous_institute_address : '' }}</span>
                    <span class="item-label">সর্বশেষ শ্রেণি :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->previous_class : '' }}</span>
                </div>
            </div>

            <div class="page-footer-note">
                <span>{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</span>
                <span>ফরম নং / ট্র্যাকিং: {{ $isFilled ? $admission->application_no : '....................' }}</span>
                <span>পৃষ্ঠা - ১</span>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- ========================= PAGE 2 (IMAGE 3) ============================== -->
    <!-- ========================================================================= -->
    <div class="page-container">
        <div class="page-inner-border">

            <!-- ১১. প্রকৃত অভিভাবক -->
            <div class="form-section-item">
                <div class="photo-box-inline" style="margin-top: 10px;">
                    @if($isFilled && $admission->guardian_photo)
                        <img src="{{ asset($admission->guardian_photo) }}" alt="Guardian">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="sec-title" style="margin-top: 0;">১১. প্রকৃত অভিভাবক :</div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">পিতার নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_father_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">শিক্ষাগত যোগ্যতা :</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->guardian_education : '' }}</span>
                    <span class="item-label">পেশা :</span>
                    <span class="dotted-fill" style="max-width: 130px;">{{ $isFilled ? $admission->guardian_profession : '' }}</span>
                    <span class="item-label">পদবি :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_designation : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">ঠিকানা (কর্মস্থল) :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_workplace_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">বর্তমান ঠিকানা :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_present_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">স্থায়ী ঠিকানা : গ্রাম:</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->guardian_permanent_village : '' }}</span>
                    <span class="item-label">ডাকঘর:</span>
                    <span class="dotted-fill" style="max-width: 120px;">{{ $isFilled ? $admission->guardian_permanent_post_office : '' }}</span>
                    <span class="item-label">পোস্টকোড:</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_permanent_post_code : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 90px;">
                    <span class="item-label">উপজেলা:</span>
                    <span class="dotted-fill" style="max-width: 180px;">{{ $isFilled ? $admission->guardian_permanent_upazila : '' }}</span>
                    <span class="item-label">জেলা:</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_permanent_district : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">সম্পর্ক ও বিশেষ তথ্য :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_relation_info : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">বার্ষিক আয় :</span>
                    <span class="dotted-fill" style="max-width: 200px;">{{ $isFilled ? $admission->guardian_annual_income : '' }}</span>
                    <span class="item-label">আয়ের উৎস :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_income_source : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">যোগাযোগ : মোবাইল:</span>
                    <span class="dotted-fill" style="max-width: 200px;">{{ $isFilled ? $admission->guardian_mobile : '' }}</span>
                    <span class="item-label">ই-মেইল :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->guardian_email : '' }}</span>
                </div>
            </div>

            <!-- ১২. ক্যাম্পাস/হোস্টেল থেকে শিক্ষার্থীকে যিনি বাড়িতে আনা-নেওয়া করবেন -->
            <div class="form-section-item" style="margin-top: 12px;">
                <div class="photo-box-inline">
                    @if($isFilled && $admission->pick_drop_photo)
                        <img src="{{ asset($admission->pick_drop_photo) }}" alt="Pick Drop">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="sec-title">১২. ক্যাম্পাস/হোস্টেল থেকে শিক্ষার্থীকে যিনি বাড়িতে আনা-নেওয়া করবেন :</div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->pick_drop_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">ঠিকানা :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->pick_drop_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">সম্পর্ক :</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->pick_drop_relation : '' }}</span>
                    <span class="item-label">মোবাইল :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->pick_drop_mobile : '' }}</span>
                    <span class="item-label">ফোন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->pick_drop_phone : '' }}</span>
                </div>
            </div>

            <!-- ১৩. স্থানীয় অভিভাবক -->
            <div class="form-section-item" style="margin-top: 12px;">
                <div class="photo-box-inline">
                    @if($isFilled && $admission->local_guardian_photo)
                        <img src="{{ asset($admission->local_guardian_photo) }}" alt="Local Guardian">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="sec-title">১৩. স্থানীয় অভিভাবক :</div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->local_guardian_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">ঠিকানা :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->local_guardian_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">সম্পর্ক :</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->local_guardian_relation : '' }}</span>
                    <span class="item-label">মোবাইল :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->local_guardian_mobile : '' }}</span>
                    <span class="item-label">ফোন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->local_guardian_phone : '' }}</span>
                </div>
            </div>

            <!-- ১৪. রেফারেল -->
            <div class="form-section-item" style="margin-top: 12px;">
                <div class="photo-box-inline">
                    @if($isFilled && $admission->ref_photo)
                        <img src="{{ asset($admission->ref_photo) }}" alt="Reference">
                    @else
                        ছবি
                    @endif
                </div>
                <div class="sec-title">১৪. রেফারেল :</div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->ref_name : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">পেশা :</span>
                    <span class="dotted-fill" style="max-width: 220px;">{{ $isFilled ? $admission->ref_profession : '' }}</span>
                    <span class="item-label">পদবি :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->ref_designation : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">ঠিকানা/প্রতিষ্ঠান :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->ref_organization_address : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">বিশেষ তথ্য (যদি থাকে) :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->ref_special_info : '' }}</span>
                </div>
                <div class="dotted-row" style="margin-left: 20px;">
                    <span class="item-label">সম্পর্ক :</span>
                    <span class="dotted-fill" style="max-width: 140px;">{{ $isFilled ? $admission->ref_relation : '' }}</span>
                    <span class="item-label">মোবাইল :</span>
                    <span class="dotted-fill" style="max-width: 150px;">{{ $isFilled ? $admission->ref_mobile : '' }}</span>
                    <span class="item-label">ফোন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->ref_phone : '' }}</span>
                </div>
            </div>

            <!-- নমুনা স্বাক্ষর ও তারিখ -->
            <div class="sig-block" style="margin-top: 16px;">
                <div class="dotted-row">
                    <span class="item-label">পিতার নাম :</span>
                    <span class="dotted-fill" style="max-width: 240px;">{{ $isFilled ? $admission->father_name_bn : '' }}</span>
                    <span class="item-label">নমুনা স্বাক্ষর ও তারিখ :</span>
                    <span class="dotted-fill"></span>
                </div>
                <div class="dotted-row">
                    <span class="item-label">মাতার নাম :</span>
                    <span class="dotted-fill" style="max-width: 240px;">{{ $isFilled ? $admission->mother_name_bn : '' }}</span>
                    <span class="item-label">নমুনা স্বাক্ষর ও তারিখ :</span>
                    <span class="dotted-fill"></span>
                </div>
                <div class="dotted-row">
                    <span class="item-label">প্রকৃত অভিভাবকের নাম :</span>
                    <span class="dotted-fill" style="max-width: 240px;">{{ $isFilled ? $admission->guardian_name : '' }}</span>
                    <span class="item-label">নমুনা স্বাক্ষর ও তারিখ :</span>
                    <span class="dotted-fill"></span>
                </div>
                <div class="dotted-row">
                    <span class="item-label">পরিচয়দানকারীর নাম :</span>
                    <span class="dotted-fill" style="max-width: 240px;">{{ $isFilled ? $admission->ref_name : '' }}</span>
                    <span class="item-label">নমুনা স্বাক্ষর ও তারিখ :</span>
                    <span class="dotted-fill"></span>
                </div>
            </div>

            <div class="page-footer-note">
                <span>{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</span>
                <span>ফরম নং / ট্র্যাকিং: {{ $isFilled ? $admission->application_no : '....................' }}</span>
                <span>পৃষ্ঠা - ২</span>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- ========================= PAGE 3 (IMAGE 5) ============================== -->
    <!-- ========================================================================= -->
    <div class="page-container">
        <div class="page-inner-border">

            <h3 style="text-align: center; margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1b4332; border-bottom: 1.5px solid #2d6a4f; padding-bottom: 4px;">
                ১৫. অভিভাবকের জ্ঞাতব্য বিষয় ও সম্মতি
            </h3>

            <ul class="bullet-list" style="margin-bottom: 8px;">
                <li>প্রতিষ্ঠানের সকল বিধি-বিধান ও নিয়ম-কানুন জেনে সন্তানকে ভর্তির সিদ্ধান্ত নেবেন।</li>
                <li>অভিভাবকের জন্য প্রযোজ্য বিধি-বিধান ও নিয়মসমূহ মেনে চলতে একান্তভাবে চেষ্টা করবেন।</li>
                <li>মহিলা অভিভাবকগণ হিজাব/পর্দা সহকারে শালীন পোশাক পরিধান করে প্রতিষ্ঠানে আগমন করবেন।</li>
                <li>শিক্ষার্থীকে প্রতিষ্ঠানের বিধি-বিধান মেনে চলতে দৃঢ় পদক্ষেপ করবেন।</li>
                <li>শিক্ষার্থী প্রতিষ্ঠানের কোনো নিয়ম-কানুন কিংবা আচরণবিধি ভঙ্গ করলে প্রতিষ্ঠানের সিদ্ধান্ত মেনে নেবেন।</li>
                <li>শিক্ষার্থীর ডায়েরি নিয়মিত পর্যবেক্ষণ করে ব্যবস্থা গ্রহণ করবেন।</li>
                <li>CW ও HW খাতা নিয়মিত চেক করবেন এবং শিক্ষকের সাথে যোগাযোগ করবেন।</li>
                <li>CT, MT ও সাময়িক পরীক্ষার প্রস্তুতি পর্যবেক্ষণ করবেন এবং পরীক্ষা শেষে শিক্ষার্থীর মূল্যায়নপত্র দেখে যথাযথ ব্যবস্থা গ্রহণ করবেন।</li>
                <li>অভিভাবক সমাবেশ-এ উপস্থিত থেকে শিক্ষার্থীর সার্বিক মানোন্নয়নে প্রতিষ্ঠানের করণীয় সম্পর্কে পরামর্শ দিবেন ও অবহিত হবেন।</li>
                <li>শিক্ষার মান উন্নয়নসহ প্রতিষ্ঠানের সার্বিক কার্যক্রমে গঠনমূলক পরামর্শ দিয়ে প্রত্যক্ষ ও পরোক্ষ ভূমিকা পালন করবেন।</li>
                <li>কোন শিক্ষার্থী কর্তৃপক্ষের অজ্ঞাতসারে প্রতিষ্ঠান/হোস্টেল থেকে চলে গেলে এর দায়-দায়িত্ব প্রতিষ্ঠান বহন করবে না।</li>
                <li>যে-কোন পরামর্শ, অভিযোগ, ইনফরমেশন এবং সমালোচনা সরাসরি কিংবা টেলিফোন ও মোবাইলের মাধ্যমে প্রতিষ্ঠান প্রধানকে অবহিত করবেন।</li>
            </ul>

            <div class="sec-title" style="color: #1b4332; border-bottom: 1px dashed #666; padding-bottom: 2px;">• বেতন/পাওনা পরিশোধ:</div>
            <ol class="rules-list">
                <li>জরিমানা এড়াতে প্রতি মাসের যাবতীয় ফি ৭ তারিখের মধ্যে পরিশোধ করবেন।</li>
                <li>প্রতিষ্ঠানের যাবতীয় লেনদেন ক্যাশমেমো ছাড়া করবেন না।</li>
                <li>ছুটি বা শিক্ষার্থীর ব্যক্তিগত কারণে প্রতিষ্ঠানে না আসলে কিংবা হোস্টেলে না থাকলে সেক্ষেত্রে কোন ফি মওকুফ করা হবে না।</li>
            </ol>

            <div class="sec-title" style="color: #1b4332; border-bottom: 1px dashed #666; padding-bottom: 2px; margin-top: 6px;">• শিক্ষার্থীর অসুস্থতা ও দুর্ঘটনা:</div>
            <ol class="rules-list">
                <li>শিক্ষার্থীর প্রতিভার যথাযথ বিকাশে এবং তাকে সুন্দরভাবে অভীষ্ট লক্ষ্যে নিয়ে যাবার জন্য তার পারিবারিক ও ব্যক্তিগত তথ্যাবলি যেমন-ব্যবহার, আচরণ, মেজাজ, রুচিবোধ, জন্মগত অভ্যাস সম্পর্কিত তথ্যাবলি কর্তৃপক্ষের জানা বিশেষ প্রয়োজন। এক্ষেত্রে কোন বিষয় একান্ত পারিবারিক বা গোপনীয় হলেও শিক্ষার্থীর কল্যাণার্থে অভিভাবক সেগুলো কর্তৃপক্ষকে অবহিত করবেন।</li>
                <li>ভর্তি পরবর্তী সময়ে কোন শিক্ষার্থীর মারাত্মক রোগ ধরা পড়লে অথবা দুরারোগ্য রোগে আক্রান্ত হলে তার দায়-দায়িত্ব ও চিকিৎসার ব্যয়ভার অভিভাবক বহন করবেন।</li>
                <li>প্রাকৃতিক দুর্যোগ, দৈব-দুর্বিপাক কিংবা অনিচ্ছাকৃতভাবে কোন দুর্ঘটনা ঘটলে তার দায়-দায়িত্ব প্রতিষ্ঠান বহন করবে না।</li>
            </ol>

            <div class="sec-title" style="color: #1b4332; border-bottom: 1px dashed #666; padding-bottom: 2px; margin-top: 6px;">• ছুটি, অনুপস্থিতি ও জরিমানা:</div>
            <ol class="rules-list">
                <li>০৩ (তিন) দিনের বেশি অনুপস্থিত থাকলে অভিভাবকসহ উপস্থিত হতে হবে।</li>
                <li>অভিভাবকের স্বাক্ষর ব্যতীত কোন ধরনের ছুটি মঞ্জুর করা হবে না।</li>
                <li>জরুরী বা বিশেষ যে-কোন ছুটির জন্য আগে প্রিন্সিপালের নিকট থেকে অগ্রিম ছুটি নিতে হবে।</li>
                <li>কোন কারণে অনুপস্থিত থাকলে পরদিন প্রিন্সিপাল বরাবর ছুটি মঞ্জুরের জন্য দরখাস্ত জমা দিতে হবে।</li>
            </ol>

            <div class="sig-row" style="margin-top: 35px;">
                <div class="sig-item">
                    অভিভাবকের স্বাক্ষর ও তারিখ
                </div>
                <div class="sig-item">
                    শিক্ষার্থীর স্বাক্ষর ও তারিখ
                </div>
            </div>

            <div class="page-footer-note">
                <span>{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</span>
                <span>ফরম নং / ট্র্যাকিং: {{ $isFilled ? $admission->application_no : '....................' }}</span>
                <span>পৃষ্ঠা - ৩</span>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- ========================= PAGE 4 (IMAGE 1) ============================== -->
    <!-- ========================================================================= -->
    <div class="page-container">
        <div class="page-inner-border">

            <!-- ১৬. শিক্ষার্থীর ওয়াদা -->
            <div class="sec-title" style="font-size: 14.5px; color: #1b4332;">
                ১৬. শিক্ষার্থীর ওয়াদা : আমি এই মর্মে ওয়াদা করছি যে,
            </div>
            <ul class="bullet-list" style="margin-left: 10px; margin-bottom: 10px;">
                <li>অত্র প্রতিষ্ঠানের সকল নিয়ম-কানুন মেনে চলবো</li>
                <li>প্রতিদিনের নির্ধারিত রুটিন অনুসরণ করবো</li>
                <li>প্রতিষ্ঠান ও রাষ্ট্রের শৃঙ্খলা বিরোধী কোন কাজে অংশগ্রহণ থেকে বিরত থাকবো।</li>
            </ul>
            <div style="text-align: right; margin-bottom: 14px;">
                <span style="border-top: 1px dotted #333; padding: 3px 15px; font-weight: 600; font-size: 13px;">
                    শিক্ষার্থীর নাম: স্বাক্ষর ও তারিখ
                </span>
            </div>

            <!-- ১৭. পুনঃভর্তি/ভর্তি বাতিল/বহিষ্কার/টিসি প্রদান -->
            <div class="sec-title" style="font-size: 14.5px; color: #1b4332; border-top: 1px dashed #888; padding-top: 6px;">
                ১৭. পুনঃভর্তি/ভর্তি বাতিল/বহিষ্কার/টিসি প্রদান :
            </div>
            <ol class="rules-list" style="margin-bottom: 12px;">
                <li>বিনা কারণে অথবা বিনা অনুমতিতে কোন শিক্ষার্থী ০১ (এক) মাস ক্লাসে অনুপস্থিত থাকলে তাকে পুনঃভর্তি হতে হবে।</li>
                <li>কোন শিক্ষার্থী কিংবা তার অভিভাবক প্রতিষ্ঠানের স্বার্থ-বিরোধী ও আইন-শৃঙ্খলা পরিপন্থী কোন কাজে জড়িত হলে এবং বিধি-বিধান ভঙ্গ করলে সে শিক্ষার্থীকে বহিষ্কার করা হবে।</li>
                <li>ছাত্রের নৈতিক চরিত্রের অবনতি ঘটলে অভিভাবককে অবহিত করে তাকে অর্থদণ্ডসহ বহিষ্কার করা হবে।</li>
                <li>কর্তৃপক্ষ, শিক্ষক, সিনিয়র শিক্ষার্থী ও স্টাফের সাথে কোন শিক্ষার্থী অসদাচরণ করলে তাকে বহিষ্কার করা হবে।</li>
                <li>ভর্তি পরবর্তী সময়ে কোন শিক্ষার্থীর ছোঁয়াচে, মারাত্মক অথবা বিকৃত রোগ ধরা পড়লে তাকে টিসি দিয়ে দেয়া হবে।</li>
                <li>কোন শিক্ষার্থী নিয়মিত পড়া না পারলে, অপরিচ্ছন্ন থাকলে, ক্লাসে বই-খাতা নিয়ে না আসলে এবং পরীক্ষায় বারবার রেজাল্ট খারাপ করলে তাকে টিসি দিয়ে দেয়া হবে।</li>
                <li>কোন শিক্ষার্থী ভর্তি প্রক্রিয়া সম্পন্ন হওয়ার পর ৩দিনের মধ্যে চলে যেতে চাইলে সেক্ষেত্রে ভর্তির টাকার এক চতুর্থাংশ রেখে বাকী টাকা ফেরত নিতে পারবে। তবে ৩ দিনের বেশি হলে কোন টাকা ফেরত দেওয়া হবে না।</li>
            </ol>

            <div class="sig-row" style="margin-top: 12px; margin-bottom: 16px;">
                <div class="sig-item">
                    অভিভাবকের স্বাক্ষর ও তারিখ
                </div>
                <div class="sig-item">
                    শিক্ষার্থীর স্বাক্ষর ও তারিখ
                </div>
            </div>

            <!-- ১৮. শিক্ষার্থীর বিশেষ তথ্য -->
            <div class="sec-title" style="font-size: 14.5px; color: #1b4332; border-top: 1px dashed #888; padding-top: 6px;">
                ১৮. শিক্ষার্থীর বিশেষ তথ্য :
            </div>
            <div class="form-section-item" style="margin-top: 4px;">
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">শিক্ষার্থীর নাম :</span>
                    <span class="dotted-fill">{{ $isFilled ? ($admission->student_name_bn ?: $admission->student_name_en) : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">ভাই বোন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->siblings_info : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">রক্তের গ্রুপ :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->blood_group : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">জন্ম বৃত্তান্ত :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->birth_details : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">উচ্চতা :</span>
                    <span class="dotted-fill" style="max-width: 250px;">{{ $isFilled ? $admission->height : '' }}</span>
                    <span class="item-label">ওজন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->weight : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">রং :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->complexion : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">বিশেষ চিহ্ন :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->identification_mark : '' }}</span>
                </div>
                <div class="dotted-row">
                    <span class="item-label" style="min-width: 90px;">বিশেষ রোগ :</span>
                    <span class="dotted-fill">{{ $isFilled ? $admission->special_disease : '' }}</span>
                </div>
            </div>

            <div style="text-align: right; margin-top: 12px;">
                <span style="border-top: 1px dotted #333; padding: 3px 15px; font-weight: 600; font-size: 13px;">
                    শিক্ষার্থীর নাম: স্বাক্ষর ও তারিখ
                </span>
            </div>

            <div class="page-footer-note">
                <span>{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</span>
                <span>ফরম নং / ট্র্যাকিং: {{ $isFilled ? $admission->application_no : '....................' }}</span>
                <span>পৃষ্ঠা - ৪</span>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- ========================= PAGE 5 (IMAGE 4) ============================== -->
    <!-- ========================================================================= -->
    <div class="page-container">
        <div class="page-inner-border">

            <!-- ১৯. ভর্তি পরীক্ষার ফলাফল -->
            <div class="sec-title" style="font-size: 14.5px; color: #1b4332;">
                ১৯. ভর্তি পরীক্ষার ফলাফল:
            </div>
            <table class="form-table">
                <thead>
                    <tr>
                        <th>হিফয/নাযেরা = ৫০</th>
                        <th>তাজভীদ = ৩০</th>
                        <th>উচ্চারণ = ২০</th>
                        <th>বাংলা = ২০</th>
                        <th>ইংরেজি = ২০</th>
                        <th>গণিত = ২০</th>
                        <th>সাধারণ জ্ঞান = ৪০</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 34px;">
                        <td>{{ $isFilled && $admission->marks_hifz_nazera !== null ? $admission->marks_hifz_nazera : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_tajweed !== null ? $admission->marks_tajweed : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_pronunciation !== null ? $admission->marks_pronunciation : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_bangla !== null ? $admission->marks_bangla : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_english !== null ? $admission->marks_english : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_math !== null ? $admission->marks_math : '' }}</td>
                        <td>{{ $isFilled && $admission->marks_general_knowledge !== null ? $admission->marks_general_knowledge : '' }}</td>
                    </tr>
                    <tr style="font-weight: bold; background: #fafafa;">
                        <td colspan="4" style="text-align: right; padding-right: 12px;">সর্বমোট প্রাপ্ত নম্বর (২০০ এর মধ্যে) :</td>
                        <td colspan="3" style="text-align: left; padding-left: 12px;">
                            {{ $isFilled && $admission->obtained_marks !== null ? $admission->obtained_marks . ' ( ' . $admission->percentage_marks . '% )' : '' }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- ২০. ভর্তি পরীক্ষার ফলাফল (অফিস কর্তৃক পূরণীয়) -->
            <div style="margin-top: 10px; position: relative;">
                <div style="position: absolute; top: 0; right: 10px; font-weight: 700; color: #475569; background: #e2e8f0; padding: 2px 10px; border-radius: 4px; font-size: 11.5px;">
                    অফিস কর্তৃক পূরণীয়
                </div>
                <div class="sec-title" style="font-size: 14.5px; color: #1b4332;">
                    ২০. ভর্তি পরীক্ষার ফলাফল
                </div>
                <div class="form-section-item" style="margin-top: 6px;">
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ শিক্ষার্থীর নাম :</span>
                        <span class="dotted-fill">{{ $isFilled ? ($admission->student_name_bn ?: $admission->student_name_en) : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ পিতার নাম :</span>
                        <span class="dotted-fill">{{ $isFilled ? $admission->father_name_bn : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ ভর্তি পরীক্ষার তারিখ :</span>
                        <span class="dotted-fill">{{ $isFilled && $admission->admission_test_date ? $admission->admission_test_date->format('d/m/Y') : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ ভর্তি পরীক্ষার ফলাফল :</span>
                        <span class="dotted-fill">{{ $isFilled ? $admission->admission_test_result : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ ভর্তি পরীক্ষায় প্রাপ্ত মোট নম্বর :</span>
                        <span class="dotted-fill">{{ $isFilled && $admission->obtained_marks !== null ? $admission->obtained_marks : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ ভর্তি পরীক্ষায় প্রাপ্ত মোট নম্বর [শতকরা হার] :</span>
                        <span class="dotted-fill">{{ $isFilled && $admission->percentage_marks !== null ? $admission->percentage_marks . '%' : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 150px;">▪ কুরআন তিলাওয়াতের অবস্থা :</span>
                        <span class="dotted-fill">{{ $isFilled ? $admission->quran_recitation_status : '' }}</span>
                    </div>
                </div>
            </div>

            <!-- ২১. আবেদনপত্রের সাথে যা সংযুক্ত করতে হবে -->
            <div style="margin-top: 10px;">
                <div class="sec-title" style="font-size: 14.5px; color: #1b4332;">
                    ২১. আবেদনপত্রের সাথে যা সংযুক্ত করতে হবে
                </div>
                <table class="form-table" style="margin-top: 4px;">
                    <thead>
                        <tr>
                            <th class="text-left" style="width: 75%;">বিবরণ</th>
                            <th style="width: 12.5%;">✓</th>
                            <th style="width: 12.5%;">✕</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">▪ শিক্ষার্থীর ছবি (৪ কপি)</td>
                            <td>{{ $isFilled && $admission->doc_student_photos ? '✓' : '' }}</td>
                            <td>{{ $isFilled && !$admission->doc_student_photos ? '✕' : '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">▪ অভিভাবকের ছবি (২ কপি)</td>
                            <td>{{ $isFilled && $admission->doc_guardian_photos ? '✓' : '' }}</td>
                            <td>{{ $isFilled && !$admission->doc_guardian_photos ? '✕' : '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">▪ জন্ম-নিবন্ধন সনদ</td>
                            <td>{{ $isFilled && ($admission->doc_birth_certificate || $admission->birth_certificate_file) ? '✓' : '' }}</td>
                            <td>{{ $isFilled && (!$admission->doc_birth_certificate && !$admission->birth_certificate_file) ? '✕' : '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">▪ অভিভাবকের জাতীয় পরিচয়পত্রের ফটোকপি</td>
                            <td>{{ $isFilled && ($admission->doc_nid || $admission->nid_file) ? '✓' : '' }}</td>
                            <td>{{ $isFilled && (!$admission->doc_nid && !$admission->nid_file) ? '✕' : '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">▪ পূর্ববর্তী প্রতিষ্ঠানের ছাড়পত্র</td>
                            <td>{{ $isFilled && ($admission->doc_tc || $admission->tc_file) ? '✓' : '' }}</td>
                            <td>{{ $isFilled && (!$admission->doc_tc && !$admission->tc_file) ? '✕' : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ২২. ভর্তির অনুমোদন -->
            <div style="margin-top: 10px;">
                <div class="sec-title" style="font-size: 14.5px; color: #1b4332;">
                    ২২. ভর্তির অনুমোদন
                </div>
                <div class="form-section-item" style="margin-top: 4px;">
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 100px;">▪ শিক্ষার্থীর নাম :</span>
                        <span class="dotted-fill">{{ $isFilled ? ($admission->student_name_bn ?: $admission->student_name_en) : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 100px;">▪ পিতার নাম :</span>
                        <span class="dotted-fill">{{ $isFilled ? $admission->father_name_bn : '' }}</span>
                    </div>
                    <div class="dotted-row">
                        <span class="item-label" style="min-width: 100px;">▪ ভর্তির ক্লাস :</span>
                        <span class="dotted-fill" style="max-width: 220px;">{{ $isFilled ? ($admission->approved_class ?: $admission->desired_class) : '' }}</span>
                        <span class="item-label">রোল নং :</span>
                        <span class="dotted-fill">{{ $isFilled ? $admission->assigned_roll_no : '' }}</span>
                    </div>
                    <div class="dotted-row" style="margin-top: 5px;">
                        <span class="item-label" style="min-width: 100px;">▪ বিভাগ :</span>
                        @php
                            $dept = $isFilled ? ($admission->approved_department ?: $admission->department_division) : '';
                        @endphp
                        <span class="checkbox-custom">
                            নূরানী <span class="box-square">{{ strpos($dept, 'নূরানী') !== false ? '✓' : '' }}</span>
                        </span>
                        <span class="checkbox-custom">
                            নাজেরা <span class="box-square">{{ strpos($dept, 'নাজেরা') !== false || strpos($dept, 'নাযেরা') !== false ? '✓' : '' }}</span>
                        </span>
                        <span class="checkbox-custom">
                            হিফয <span class="box-square">{{ strpos($dept, 'হিফয') !== false || strpos($dept, 'হিফজ') !== false ? '✓' : '' }}</span>
                        </span>
                        <span class="checkbox-custom">
                            শুনানী <span class="box-square">{{ strpos($dept, 'শুনানী') !== false ? '✓' : '' }}</span>
                        </span>
                        <span class="checkbox-custom">
                            প্রতিযোগিতা <span class="box-square">{{ strpos($dept, 'প্রতিযোগিতা') !== false ? '✓' : '' }}</span>
                        </span>
                    </div>
                </div>

                <div class="sig-row" style="margin-top: 30px;">
                    <div class="sig-item">
                        প্রশাসনিক কর্মকর্তার স্বাক্ষর
                    </div>
                    <div class="sig-item">
                        ভাইস-প্রিন্সিপালের স্বাক্ষর
                    </div>
                    <div class="sig-item">
                        প্রিন্সিপালের স্বাক্ষর
                    </div>
                    <div class="sig-item">
                        উপদেষ্টার স্বাক্ষর
                    </div>
                </div>
            </div>

            <div class="page-footer-note">
                <span>{{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}</span>
                <span>ফরম নং / ট্র্যাকিং: {{ $isFilled ? $admission->application_no : '....................' }}</span>
                <span>পৃষ্ঠা - ৫</span>
            </div>

        </div>
    </div>

</body>
</html>
