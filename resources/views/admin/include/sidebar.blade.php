<aside class="left-sidebar" style="background-color: #ffffff; border-right: 1px solid #e2e8f0;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-1">

                <!-- Section: CORE MANAGEMENT (প্রধান কার্যক্রম) -->
                <li class="nav-small-cap text-uppercase fw-bold px-3 py-2 text-muted" style="font-size: 11px; letter-spacing: 1px;">
                    <span class="hide-menu">প্রধান ব্যবস্থাপনা</span>
                </li>

                <!-- 1. Dashboard -->
                <li class="{{ request()->routeIs('admin.home') ? 'active' : '' }}"> 
                    <a class="waves-effect waves-dark" href="{{ route('admin.home') }}" aria-expanded="false">
                        <i class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
                            <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">ড্যাশবোর্ড</span>
                    </a>
                </li>

                <!-- 2. Admissions / Offline Program -->
                <li class="{{ request()->routeIs('admissions.*') || request()->routeIs('admission-guidelines.*') || request()->routeIs('admin.offline-syllabi.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">অফলাইন প্রোগ্রাম</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admissions.index') }}" class="{{ request()->routeIs('admissions.index') ? 'active' : '' }}">সকল আবেদন (All Applications)</a></li>
                        <li><a href="{{ route('admissions.create') }}" class="{{ request()->routeIs('admissions.create') ? 'active' : '' }}">নতুন আবেদন এন্ট্রি (Add Entry)</a></li>
                        <li><a href="{{ route('admission-guidelines.index') }}" class="{{ request()->routeIs('admission-guidelines.*') ? 'active' : '' }}">নির্দেশিকা ও ফি (Guidelines)</a></li>
                        <li><a href="{{ route('admin.offline-syllabi.index') }}" class="{{ request()->routeIs('admin.offline-syllabi.*') ? 'active' : '' }}">অফলাইন সিলেবাস (Offline Syllabus)</a></li>
                        <li><a href="{{ route('admission.offline.form') }}" target="_blank">অফলাইন ফরম (Print Blank)</a></li>
                    </ul>
                </li>

                <!-- Online Program Admissions -->
                <li class="{{ request()->routeIs('admin.online-admissions.*') || request()->routeIs('admin.online-syllabi.*') || request()->routeIs('admin.online-notices.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                            <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">অনলাইন প্রোগ্রাম </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.online-admissions.index') }}" class="{{ request()->routeIs('admin.online-admissions.index') ? 'active' : '' }}">সকল অনলাইন আবেদন (All Applications)</a></li>
                        <li><a href="{{ route('admin.online-admissions.index', ['status' => 'pending']) }}">অপেক্ষমান আবেদন (Pending)</a></li>
                        <li><a href="{{ route('admin.online-admissions.index', ['status' => 'under_review']) }}">যাচাইধীন আবেদন (Under Review)</a></li>
                        <li><a href="{{ route('admin.online-admissions.index', ['status' => 'approved']) }}">অনুমোদিত আবেদন (Approved)</a></li>
                        <li><a href="{{ route('admin.online-admissions.payments') }}" class="{{ request()->routeIs('admin.online-admissions.payments') ? 'active' : '' }}">অনলাইন পেমেন্টস (Payments)</a></li>
                        <li><a href="{{ route('online_program.fees') }}" target="_blank">ফি চার্ট ও ক্যালকুলেটর (Fee Chart)</a></li>
                        <li><a href="{{ route('admin.online-syllabi.index') }}" class="{{ request()->routeIs('admin.online-syllabi.*') ? 'active' : '' }}">অনলাইন সিলেবাস (Online Syllabus)</a></li>
                        <li><a href="{{ route('admin.online-notices.index') }}" class="{{ request()->routeIs('admin.online-notices.*') ? 'active' : '' }}">অনলাইন নোটিশ ও ঘোষণা (Online Notices)</a></li>
                    </ul>
                </li>

                <!-- Madrasah Mashq Admissions -->
                <li class="{{ request()->routeIs('admin.madrasah-mashq.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #059669;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">মাদ্রাসা মাশ্ক্ব এডমিশন</span>
                        @php
                            $pendingMashqBadge = \App\Models\MadrasahMashqAdmission::where('status', 'pending')->count();
                        @endphp
                        @if($pendingMashqBadge > 0)
                            <span class="badge badge-pill badge-warning text-dark font-weight-bold ml-auto" style="font-size: 11px;">{{ $pendingMashqBadge }}</span>
                        @endif
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.madrasah-mashq.index') }}" class="{{ request()->routeIs('admin.madrasah-mashq.index') && !request()->has('status') ? 'active' : '' }}">সকল আবেদন (All Applications)</a></li>
                        <li><a href="{{ route('admin.madrasah-mashq.index', ['status' => 'pending']) }}">অপেক্ষমান আবেদন (Pending)</a></li>
                        <li><a href="{{ route('admin.madrasah-mashq.index', ['status' => 'contacted']) }}">যোগাযোগকৃত (Contacted)</a></li>
                        <li><a href="{{ route('admin.madrasah-mashq.index', ['status' => 'approved']) }}">অনুমোদিত (Approved)</a></li>
                    </ul>
                </li>

                <!-- 3. Students -->
                <li class="{{ request()->routeIs('students.*') || request()->routeIs('student-classes.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #0d6efd;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">শিক্ষার্থীবৃন্দ </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.index') ? 'active' : '' }}">সকল ছাত্র তালিকা (All Students)</a></li>
                        <li><a href="{{ route('students.create') }}" class="{{ request()->routeIs('students.create') ? 'active' : '' }}">নতুন ছাত্র যুক্ত করুন (Add Student)</a></li>
                        <li><a href="{{ route('student-classes.index') }}" class="{{ request()->routeIs('student-classes.*') ? 'active' : '' }}">শ্রেণি ব্যবস্থাপনা (Classes)</a></li>
                    </ul>
                </li>

                <!-- 4. Teachers -->
                <li class="{{ request()->routeIs('teachers.*') || request()->routeIs('teacher-categories.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #d97706;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">শিক্ষকমণ্ডলী </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.index') ? 'active' : '' }}">সকল শিক্ষক (All Teachers)</a></li>
                        <li><a href="{{ route('teachers.create') }}" class="{{ request()->routeIs('teachers.create') ? 'active' : '' }}">নতুন শিক্ষক যুক্ত করুন (Add Teacher)</a></li>
                        <li><a href="{{ route('teacher-categories.index') }}" class="{{ request()->routeIs('teacher-categories.*') ? 'active' : '' }}">শিক্ষক ক্যাটাগরি (Categories)</a></li>
                    </ul>
                </li>

                <!-- 14. Notices -->
                <li class="{{ request()->routeIs('notices.*') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="{{ request()->routeIs('notices.*') ? 'true' : 'false' }}">
                        <i style="color: #ea580c;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15h-1a1 1 0 0 1-.992-.883L2.735 9.475C1.049 9.176 0 7.828 0 6.5s1.049-2.676 2.735-2.975l.783-4.642A1 1 0 0 1 4.51 0h1a1 1 0 0 1 .983 1.171l-.405 2.712C8.51 4.123 10.838 4.725 13 5.966V2.5z"/>
                        </svg></i>
                        <span class="hide-menu">নোটিশ ও বিজ্ঞপ্তি</span>
                    </a>
                    <ul aria-expanded="{{ request()->routeIs('notices.*') ? 'true' : 'false' }}" class="collapse {{ request()->routeIs('notices.*') ? 'in' : '' }}">
                        <li class="{{ request()->routeIs('notices.index') ? 'active' : '' }}"><a href="{{ route('notices.index') }}">সকল নোটিশ (All Notices)</a></li>
                        <li class="{{ request()->routeIs('notices.create') ? 'active' : '' }}"><a href="{{ route('notices.create') }}">নতুন নোটিশ প্রকাশ (Add Notice)</a></li>
                    </ul>
                </li>

                <!-- 5. Donation -->
                {{-- <li class="{{ request()->routeIs('add.donate.data') || request()->routeIs('donate.payment.data') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">অনুদান ও ফান্ড (Donation)</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.donate.data') }}">অনুদান সেটিংস (Settings)</a></li>
                        <li><a href="{{ route('donate.payment.data') }}">পেমেন্ট তালিকা (Payments)</a></li>
                    </ul>
                </li> --}}

                <!-- Section: WEBSITE & CONTENT SETTINGS (ওয়েবসাইট ও সেটিংস) -->
                <li class="nav-small-cap text-uppercase fw-bold px-3 py-2 text-muted mt-3" style="font-size: 11px; letter-spacing: 1px; border-top: 1px dashed #cbd5e1;">
                    <span class="hide-menu">ওয়েবসাইট ও কনটেন্ট সেটিংস</span>
                </li>

                <!-- 6. About Madrasah -->
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                        </svg></i>
                        <span class="hide-menu">আমাদের সম্পর্কে</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.about') }}">About Settings</a></li>
                    </ul>
                </li>

                <!-- 7. Departments -->
                {{-- <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #6366f1;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z"/>
                        </svg></i>
                        <span class="hide-menu">শিক্ষা বিভাগ</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('department.index') }}">সকল বিভাগ (Departments)</a></li>
                    </ul>
                </li> --}}

                <!-- 8. Books & Library -->
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #8b5cf6;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg></i>
                        <span class="hide-menu">বই ও লাইব্রেরি</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('bookcategories.index') }}">বই ক্যাটাগরি (Category)</a></li>
                        <li><a href="{{ route('booksubcategories.index') }}">সাব-ক্যাটাগরি (Subcategory)</a></li>
                        <li><a href="{{ route('books.index') }}">সকল বই (Books List)</a></li>
                    </ul>
                </li>

                <!-- 9. Live TV & Media -->
                {{-- <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #ef4444;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-tv-fill" viewBox="0 0 16 16">
                            <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM2 2h12s2 0 2 2v6s0 2-2 2H2s-2 0-2-2V4s0-2 2-2z"/>
                        </svg></i>
                        <span class="hide-menu">লাইভ টিভি (Live TV)</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('tvs.index') }}">Live TV Videos</a></li>
                    </ul>
                </li> --}}

                <!-- 10. Audio Corner -->
                {{-- <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #ec4899;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.895 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
                            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
                        </svg></i>
                        <span class="hide-menu">অডিও কর্নার (Audio)</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('categories.index') }}">Audio Category</a></li>
                        <li><a href="{{ route('subcategories.index') }}">Audio Subcategory</a></li>
                        <li><a href="{{ route('audios.index') }}">Audio List</a></li>
                    </ul>
                </li> --}}

                <!-- 11. Gallery -->
                <!-- 11. Gallery -->
                <li class="{{ request()->routeIs('add.gallery') || request()->routeIs('edit.gallery') || (request()->routeIs('gallery.categories.*') && request('type') == 'photo') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1v10l3.707-3.707a1 1 0 0 1 1.414 0L10 11.172l1.879-1.879a1 1 0 0 1 1.414 0L14 10V2z"/>
                        </svg></i>
                        <span class="hide-menu">ছবি গ্যালারি</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.gallery') }}">সকল ছবি (Photo Gallery)</a></li>
                        <li><a href="{{ route('gallery.categories.index', ['type' => 'photo']) }}">ছবি ক্যাটাগরি (Categories)</a></li>
                    </ul>
                </li>

                <!-- 12. Video Gallery -->
                <li class="{{ request()->routeIs('add.video.gallery') || request()->routeIs('edit.video.gallery') || (request()->routeIs('gallery.categories.*') && request('type') == 'video') ? 'active' : '' }}"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
                        </svg></i>
                        <span class="hide-menu">ভিডিও গ্যালারি</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.video.gallery') }}">সকল ভিডিও (Video Gallery)</a></li>
                        <li><a href="{{ route('gallery.categories.index', ['type' => 'video']) }}">ভিডিও ক্যাটাগরি (Categories)</a></li>
                    </ul>
                </li>

                <!-- 13. Activities -->
                {{-- <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #0284c7;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg></i>
                        <span class="hide-menu">কার্যক্রম</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.activities') }}">Activity Settings</a></li>
                    </ul>
                </li> --}}
                
                 <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #06b6d4;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                            <path d="M15.532 1.924a.5 5.5 0 0 1 .532.196l1.692 4.15a.5.5 0 0 1-.051.525l-3.49 3.5a.5.5 0 0 1-.774-.101l-.564-1.135a.5.5 0 0 1 .174-.656l2.5-2.5a.5.5 0 0 0 0-.708l-2.5-2.5a.5.5 0 0 1-.174-.656l.564-1.135a.5.5 0 0 1 .774-.101l3.49 3.5zM8.687 6.196l.564-1.135a.5.5 0 0 1 .774.101L13.48 11a.5.5 0 0 1-.051.525l-2.231 2.28a.5.5 0 0 1-.774-.101l-2.23-2.28a.5.5 0 0 1 .051-.525l1.687-4.15a.5.5 0 0 1 .22-.215zM2.5 12.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zm0 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM6.5 5.5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5zm-4 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5zM9.5 3a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5z"/>
                        </svg></i>
                        <span class="hide-menu">ব্লগ পোস্ট (Blogs)</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.blogs') }}">Blog Settings</a></li>
                    </ul>
                </li>

              

                <!-- 15. Partners & Counter & Volunteers -->
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i style="color: #64748b;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                        </svg></i>
                        <span class="hide-menu">অন্যান্য কনটেন্ট</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add.partners') }}">সহযোগী প্রতিষ্ঠান (Partners)</a></li>
                        <li><a href="{{ route('add.counter') }}">কাউন্টার ডাটা (Counters)</a></li>
                        {{-- <li><a href="{{ route('volunteer.list') }}">স্বেচ্ছাসেবক (Volunteers)</a></li>
                        <li><a href="{{ route('subscribe.list') }}">সাবস্ক্রাইবার (Subscribers)</a></li> --}}
                        {{-- <li><a href="{{ route('add.blogs') }}">ব্লগ ও প্রবন্ধ (Blogs)</a></li> --}}
                    </ul>
                </li>

                <!-- 16. General Settings -->
                <li class="{{ request()->routeIs('general.settings') ? 'active' : '' }}"> 
                    <a class="waves-effect waves-dark" href="{{ route('general.settings') }}" aria-expanded="false">
                        <i style="color: #475569;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                            <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.424A4.98 4.98 0 0 0 3 8c0 .7.14 1.372.4 1.984L7.56 8.5 4.617 4.391zM7.56 7.5 3.4 9.984A4.98 4.98 0 0 0 8 13c1.378 0 2.628-.561 3.535-1.464L7.56 7.5z"/>
                        </svg></i>
                        <span class="hide-menu fw-bold">সাইট সেটিংস (Settings)</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
