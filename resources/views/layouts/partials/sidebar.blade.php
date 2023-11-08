<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white-primary elevation-4"
    style="position: fixed; top: 0; left: 0; bottom: 0; width: 250px;">

    <!-- -----Brand Logo----- -->

    <div id="header_logo">
        <a href="{{ route('home') }}" style="" class="">

            @if (@App\Models\Setting::first()->school_logo)
                <img src="{{ Storage::url(App\Models\Setting::first()->school_logo) }}"
                    style=" height: 85px; width: 100%;" alt="Logo" class="brand-image">
            @else
                <img src="{{ asset('uploads/logo.png') }}" style="height: 90px;" alt="Logo" class="">
            @endif

        </a>
        <h6 class="mt-2">{{ @App\Models\Setting::first()->school_name }}</h6>

    </div>

    <!-- ----- End of Brand Logo----- -->

    <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');

        body {
            font-family: 'Kalpurush', Arial, sans-serif !important;
        }

        .nav-sidebar .nav-link p {
            color: black;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #298dab;
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(41, 130, 171, 0.5);
        }

        body:not(.layout-fixed) .main-sidebar {
            background-color: white;
        }

        .menu-open>.nav-link>.fa-angle-left {
            transform: rotate(-90deg);
        }

        .menu-open .nav-treeview {
            display: block;
        }

        #header_logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        /* body:not(.layout-fixed) .main-sidebar {
            height: 65rem; // To set 'Sidebar' white background height position
        } */
    </style>

    <!--Start Sidebar -->
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt text-dark"></i>
                        <p class="ml-2">ড্যাশবোর্ড</p>
                    </a>
                </li>

                {{--                <li class="nav-item has-treeview"> --}}
                {{--                    <a href="{{ route('menu-lists.index') }}" class="nav-link {{ activeSegment('menu-lists') }}"> --}}
                {{--                        <i class="fa-solid fa-bars text-dark"></i> --}}
                {{--                        <p class="ml-2">মেনু তালিকা</p> --}}
                {{--                    </a> --}}
                {{--                </li> --}}

                <!-- Start section of Home Page Menu -->

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-home text-dark"></i>
                        <p class="ml-2 active ">হোম পেইজ</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link {{ activeSegment('sliders') }} ml-4">
                                <i class="fa-solid fa-sliders text-dark"></i>
                                <p class=" active">স্লাইডার</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- End section of Home Page Menu --}}

                <li class="nav-item has-treeview">
                    <a href="{{ route('notices.index') }}" class="nav-link {{ activeSegment('notices') }}">
                        <i class="fa-solid fa-triangle-exclamation text-dark"></i>
                        <p class="ml-2">নোটিশ</p>
                    </a>
                </li>

                {{-- srart saection of category --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-layer-group text-dark"></i>
                        <p class="ml-2">পরিচালনা পর্ষদ ও শিক্ষকমন্ডলী</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">

                        <!-- Start section of সেবা -->

                        <li class="nav-item has-treeview">
                            <a href="{{ route('directors_categories.index') }}"
                                class="nav-link {{ activeSegment('services') }} ml-4">
                                <i class="fa-solid fa-toolbox text-dark"></i>
                                <p class="">ক্যাটাগরি</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('directors.index') }}"
                                class="nav-link {{ activeSegment('services') }} ml-4">
                                <i class="fa-solid fa-toolbox text-dark"></i>
                                <p class="">যুক্ত করুন</p>
                            </a>
                        </li>
                        <!-- End section of সেবা -->
                    </ul>
                </li>


                {{-- School activities start --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('schoolActivities.index') }}"
                        class="nav-link {{ activeSegment('schoolActivities') }}">
                        <i class="fa-solid fa-triangle-exclamation text-dark"></i>
                        <p class="ml-2">স্কুল কার্যক্রম</p>
                    </a>
                </li>


                {{-- Academic section start --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('academic.index') }}" class="nav-link {{ activeSegment('academic') }}">
                        <i class="fa-solid fa-triangle-exclamation text-dark"></i>
                        <p class="ml-2">একাডেমিক</p>
                    </a>
                </li>
                <!------- End section of Academic সমূহ ------->


                {{-- Education section start --}}

                <li class="nav-item has-treeview">
                    <a href="{{ route('coCurricular.index') }}" class="nav-link {{ activeSegment('coCurricular') }}">
                        <i class="fa-solid fa-triangle-exclamation text-dark"></i>
                        <p class="ml-2">সহ - পাঠক্রম</p>
                    </a>
                </li>
                <!------- End section of Education section ------->



                {{-- Admission section start --}}

                <li class="nav-item has-treeview">
                    <a href="{{ route('admission.index') }}" class="nav-link {{ activeSegment('admission') }}">
                        <i class="fa-solid fa-triangle-exclamation text-dark"></i>
                        <p class="ml-2">ভর্তি সংক্রান্ত</p>
                    </a>
                </li>
                <!------- End section of Admission section ------->


                <!-- Start section of প্রকল্প সম্পর্কিত -->

          {{--       <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-dharmachakra text-dark"></i>
                        <p class="ml-2">প্রকল্প সম্পর্কিত</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('prokolpo_sarsongkheps.index') }}"
                                class="nav-link {{ activeSegment('prokolpo_sarsongkheps') }} ml-4">
                                <i class="fa-solid fa-diagram-project text-dark"></i>
                                <p class=""> প্রকল্প সারসংক্ষেপ</p>
                            </a>
                        </li>
                        < class="nav-item">
                            <a href="{{ route('uddessho_lokkhos.index') }}"
                                class="nav-link {{ activeSegment('uddessho_lokkhos') }} ml-4">
                                <i class="fa-solid fa-bullseye text-dark"></i>
                                <p class="ml-2">উদ্দেশ্যে ও লক্ষ্য</p>
                            </a>
                        </>
                        <li class="nav-item">
                            <a href="{{ route('nagoriker_subidhas.index') }}"
                                class="nav-link {{ activeSegment('nagoriker_subidhas') }} ml-4">
                                <i class="fa-solid fa-users-rectangle text-dark"></i>
                                <p class="ml-2">নাগরিকের সুবিধা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('prokolper_outputs.index') }}"
                                class="nav-link {{ activeSegment('prokolper_outputs') }} ml-4">
                                <i class="fa-solid fa-right-from-bracket text-dark"></i>
                                <p class="ml-2">প্রকল্পের আউটপুট</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <!-- End section of প্রকল্প সম্পর্কিত -->



                <!------- Start section of ডিজিটাল গার্ড ফাইল ------->

               {{--  <li class="nav-item has-treeview" id="digital-guard-file">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-file-archive text-dark"></i>
                        <p class="ml-2">ডিজিটাল গার্ড ফাইল <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ayinbidhis.index') }}"
                                class="nav-link {{ activeSegment('ayinbidhis') }} ml-4">
                                <i class="fa-solid fa-gavel text-dark"></i>
                                <p class="">আইন-ও-বিধি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('poripotro_proggapons.index') }}"
                                class="nav-link {{ activeSegment('poripotro_proggapons') }} ml-4">
                                <i class="fa-solid fa-paperclip text-dark"></i>
                                <p class="">পরিপত্র/প্রজ্ঞাপন</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nitimalas.index') }}"
                                class="nav-link {{ activeSegment('nitimalas') }} ml-4">
                                <i class="fa-solid fa-arrow-up-a-z text-dark"></i>
                                <p class="">নীতিমালা ও শর্তাবলী</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manuals.index') }}"
                                class="nav-link {{ activeSegment('manuals') }} ml-4">
                                <i class="fa-solid fa-handshake text-dark"></i>
                                <p class="">ভূমির ম্যানুয়াল সমূহ</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <!------- End section of ডিজিটাল গার্ড ফাইল -------->



         {{--        <li class="nav-item has-treeview" id="digital-guard-file">
                    <a href="{{ route('vhumi_sheba_forms.index') }}"
                        class="nav-link {{ activeSegment('vhumi_sheba_forms') }}">
                        <i class="fa-solid fa-sheet-plastic text-dark"></i>
                        <p class="ml-2">ভূমিসেবা ফর্ম</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('faqs.index') }}" class="nav-link {{ activeSegment('faqs') }}">
                        <i class="fa-regular fa-circle-question text-dark"></i>
                        <p class="ml-2">সাধারণ জিজ্ঞাসা</p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="{{ route('recent-updates.index') }}"
                        class="nav-link {{ activeSegment('recent-updates') }}">
                        <i class="fa-regular fa-pen-to-square text-dark"></i>
                        <p class="ml-2">সাম্প্রতিক আপডেট</p>
                    </a>
                </li>
--}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                        <i class="nav-icon fas fa-cogs text-dark"></i>
                        <p class="ml-2">সেটিংস</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="fas fa-sign-out-alt text-dark"></i>
                        <p class="ml-2">লগ আউট </p>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li> 
            </ul>
        </nav>
        <!--End of sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const digitalGuardFileDropdown = document.getElementById('digital-guard-file');
        const submenuItems = digitalGuardFileDropdown.querySelectorAll('.nav-item');

        digitalGuardFileDropdown.addEventListener('click', function(event) {
            event.stopPropagation();
            digitalGuardFileDropdown.classList.toggle('menu-open');
        });


        document.addEventListener('click', function(event) {
            if (!digitalGuardFileDropdown.contains(event.target)) {
                digitalGuardFileDropdown.classList.remove('menu-open');
            }
        });


        submenuItems.forEach(function(submenuItem) {
            submenuItem.addEventListener('click', function(event) {
                event.stopPropagation();

            });
        });
    });
</script>
