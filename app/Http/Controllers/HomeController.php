<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\CoCurricular;
use App\Models\DirectorsCategory;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Directors;
use App\Models\FAQ;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Notice;
use App\Models\VerificationOfLandInformation;
use App\Models\LandServiceAndSoftware;

use App\Models\LandRelatedMediaLink;
use App\Models\FestiableImage;
use App\Models\LandRelatedVideoLink;
use App\Models\RecentUpdate;
use App\Models\SchoolActivities;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*     public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::count();
        $noticesCount = Notice::count();
        $directors =Directors::count();
        $directors_categories= DirectorsCategory::count();
        $school_activities= SchoolActivities::count();
        $academic= Academic::count();
        $co_curricular = CoCurricular::count();
        $verificationOfLandInformationCount = VerificationOfLandInformation::count();
        $appsAndSoftwaresCount = LandServiceAndSoftware::count();
        $faqsCount = FAQ::count();
        $landRelatedMediaLinksCount = LandRelatedMediaLink::count();
        $festivalsImagesCount = FestiableImage::count(); // Add this line
        $landVideoLinksCount = LandRelatedVideoLink::count(); // Add this line
        $recentUpdatesCount = RecentUpdate::count();



        return view('home', compact(
            'sliders',
            'noticesCount',
            'directors',
            'directors_categories',
            'school_activities',
            'academic',
            'co_curricular',
            'verificationOfLandInformationCount',
            'appsAndSoftwaresCount',
            'faqsCount',
            'landRelatedMediaLinksCount',
            'festivalsImagesCount',
            'landVideoLinksCount',
            'recentUpdatesCount'
        ));
    }
}
