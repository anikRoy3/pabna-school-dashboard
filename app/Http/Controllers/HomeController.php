<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Notice;
use App\Models\VerificationOfLandInformation;
use App\Models\LandServiceAndSoftware;
use App\Models\Faq;
use App\Models\LandRelatedMediaLink;
use App\Models\FestiableImage;
use App\Models\LandRelatedVideoLink;
use App\Models\RecentUpdate;
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
        $serviceCount = Service::count();
        $noticesCount = Notice::count();
        $verificationOfLandInformationCount = VerificationOfLandInformation::count();
        $appsAndSoftwaresCount = LandServiceAndSoftware::count();
        $faqsCount = Faq::count();
        $landRelatedMediaLinksCount = LandRelatedMediaLink::count();
        $festivalsImagesCount = FestiableImage::count(); // Add this line
        $landVideoLinksCount = LandRelatedVideoLink::count(); // Add this line
        $recentUpdatesCount = RecentUpdate::count();



        return view('home', compact(
            'sliders',
            'serviceCount',
            'noticesCount',
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
