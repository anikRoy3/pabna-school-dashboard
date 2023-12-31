<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CoCurricularController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\SchoolActivitiesController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SliderController;

use App\Http\Controllers\DirectorsCategoryController;
use App\Http\Controllers\DirectorsController;
use App\Http\Controllers\OurAchievementController;
use App\Http\Controllers\TeachersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::resource('sliders', SliderController::class);
Route::resource('directors_categories', DirectorsCategoryController::class);
Route::resource('notices', NoticeController::class);
// Route::resource('verification-infoes', VerificationOfLandInformationController::class);
// Route::resource('apps-and-softwares', LandServiceAndSoftwareController::class);
Route::resource('faqs', FaqController::class);
// Route::resource('land-related-media-links', LandRelatedMediaLinkController::class);
// Route::resource('festivals-images', FestiableImageController::class);
// Route::resource('land-related-video-links', LandRelatedVideoLinkController::class);
// Route::resource('recent-updates', RecentUpdateController::class);
// Route::resource('services', ServiceController::class);
// Route::resource('menu-lists', MenuListController::class);


// Route::resource('ayinbidhis', AyinbidhiController::class);
// Route::resource('poripotro_proggapons', PoripotroProggaponController::class);
// Route::resource('manuals', ManualController::class);
// Route::resource('nitimalas', NitimalaController::class);
// Route::resource('vhumi_sheba_forms', VhumiShebaFormController::class);
// Route::resource('prokolpo_sarsongkheps', ProkolpoSarsongkhepController::class);
// Route::resource('uddessho_lokkhos', UddesshoLokkhoController::class);
// Route::resource('nagoriker_subidhas', NagorikerSubidhaController::class);
// Route::resource('prokolper_outputs', ProkolperOutputController::class);
// Route::resource('user_ask_questions', UserAskQuestionController::class);
Route::resource('directors', DirectorsController::class);
Route::resource('schoolActivities', SchoolActivitiesController::class);
Route::resource('academic', AcademicController::class);
Route::resource('coCurricular', CoCurricularController::class);
Route::resource('ourAchievements', OurAchievementController::class);
Route::resource('admission', AdmissionController::class);
Route::resource('teachers', TeachersController::class);
Route::resource('settings', SettingsController::class);
Route::resource('rules', RulesController::class);