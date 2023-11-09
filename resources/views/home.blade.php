@extends('layouts.admin')

@section('content-header', 'অ্যাডমিন ড্যাশবোর্ডে স্বাগতম')

<style>
    @import url('https://fonts.maateen.me/kalpurush/font.css');

    .green-border {
        border: 3px solid #9ccaa7;
        padding: 1rem;
    }

    body {
        font-family: 'Kalpurush', Arial, sans-serif !important;
    }

    @media (max-width: 768px) {

        .small-box.green-border {
            margin-bottom: 80px;
        }

        .small-box.green-border p {
            text-align: center;
        }

        .content-header h1 {
            text-align: center;
        }
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!------- Slider Information ------->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success">{{ bnNum($sliders) }}</h3>
                        <p class="text-center">স্লাইডার</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="ion ion-ios-albums"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('sliders.index') }}" class="text-dark">এক্টিভ স্লাইডার দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

             <!------- Notice Information ------->

             <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-success text-center">{{ bnNum($noticesCount) }}</h3>
                        <p class="text-center">নোটিশসমূহ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle mr-5"></i>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('notices.index') }}" class="btn btn-success">
                            সকল নোটিশসমূহ
                            <i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                    </div>

                </div>
            </div>
            <!------- Directors Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success"> {{ bnNum($directors) }}</h3>
                        <p class="text-center">পরিচালনা পর্ষদ ও শিক্ষকমন্ডলী</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('directors.index') }}" class="text-dark">এক্টিভ দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- Directors Categories Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success"> {{ bnNum($directors_categories) }}</h3>
                        <p class="text-center">পরিচালনা পর্ষদ ক্যাটাগরি</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('directors_categories.index') }}" class="text-dark">এক্টিভ দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- School Activities Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success"> {{ bnNum($school_activities) }}</h3>
                        <p class="text-center">স্কুল কার্যক্রম</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('schoolActivities.index') }}" class="text-dark">এক্টিভ দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- Ecucational Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success"> {{ bnNum($academic) }}</h3>
                        <p class="text-center">একাডেমিক</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('academic.index') }}" class="text-dark">এক্টিভ দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!------- Co-Curricular Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success"> {{ bnNum($co_curricular) }}</h3>
                        <p class="text-center">সহ-পাঠক্রম</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-solid fa-toolbox"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('coCurricular.index') }}" class="text-dark">এক্টিভ দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- App & Software Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success">{{ bnNum($appsAndSoftwaresCount) }}</h3>
                        <p class="text-center">জমির তথ্য ও সফটওয়্যার</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fa-brands fa-uncharted"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('apps-and-softwares.index') }}" class="text-dark">এক্টিভ তথ্য ও সফটওয়্যার দেখুন
                            <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- FAQs Information ------->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class="small-box green-border">
                    <div class="inner">
                        <h3 class="text-center text-success">{{ bnNum($faqsCount) }}</h3>
                        <p class="text-center">প্রশ্নাবলী</p>
                    </div>
                    <div class="icon mb-3">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('faqs.index') }}" class="text-dark">এক্টিভ প্রশ্নাবলী দেখুন <br>
                            <i class="fa-solid fa-arrow-right ml-3 text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!------- Add the canvas element for the Visitor Chart ------->

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <canvas id="horizontalBar"></canvas>
                </div>
            </div>

           
            <!-------Start জমি সংক্রান্ত মিডিয়া লিঙ্ক Information ------->

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
                <div class="small-box green-border">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="mb-2">
                            <b>জমি সংক্রান্ত মিডিয়া লিঙ্ক</b>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-question text-success"></i>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="https://mutation.land.gov.bd/">ই-নামজারি আবেদন</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank" href="https://ldtax.gov.bd/">ভূমি উন্নয়ন
                                    কর</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank" href="https://www.eporcha.gov.bd/  ">আর.এস
                                    খতিয়ান</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="http://devlsgportal.mysoftheaven.com/services/service-details/3">হোল্ডিং ট্যাকিং
                                    সফটওয়্যার</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('land-related-media-links.index') }}" class="btn btn-success">
                            সকল মিডিয়া লিঙ্ক সমূহ<i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-------End of জমি সংক্রান্ত মিডিয়া লিঙ্ক Information ------->

            <!-------Start প্রকল্প সম্পর্কিত Information ------->


            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
                <div class="small-box green-border">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="mb-2">
                            <b class="">প্রকল্প সম্পর্কিত</b>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-question text-success"></i>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="https://mutation.land.gov.bd/">প্রকল্প সারসংক্ষেপ</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="https://mutation.land.gov.bd/">উদ্দেশ্যে ও লক্ষ্য</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="https://mutation.land.gov.bd/">প্রকল্পের আউটপুট</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <p><a style="text-decoration: none;" target="_blank"
                                    href="https://mutation.land.gov.bd/">নাগরিকের সুবিধা</a></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-arrow-right text-success"></i>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <a href="http://devlsgportal.mysoftheaven.com/" target="_blank" class="btn btn-success">
                            আরও তথ্য দেখুন<i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-------End of প্রকল্প সম্পর্কিত Information ------->

        </div>
    </div>
@endsection



<script>
    new Chart(document.getElementById("horizontalBar"), {
        "type": "horizontalBar",
        "data": {
            "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
            "datasets": [{
                "label": "My First Dataset",
                "data": [22, 33, 55, 12, 86, 23, 14],
                "fill": false,
                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                    "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                ],
                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                    "rgb(201, 203, 207)"
                ],
                "borderWidth": 1
            }]
        },
        "options": {
            "scales": {
                "xAxes": [{
                    "ticks": {
                        "beginAtZero": true
                    }
                }]
            }
        }
    });
</script>
