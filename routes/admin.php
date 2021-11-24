<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocailController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SponserController;
use App\Http\Controllers\Admin\BrandController;
use App\Models\Statistic;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ //...

	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::prefix('dashboard')->group(function () {


            Route::get('/', function () {
                return view('admin.index');
            })->middleware(['auth'])->name('dashboard');
           Route::resource('/slider', SliderController::class);
           Route::resource('/package', PackageController::class);
           Route::resource('/team', TeamController::class);
           Route::resource('/testimonial', TestimonialController::class);
           Route::resource('/social', SocialController::class);
           Route::resource('/partner', PartnerController::class);
           Route::resource('/sponsers', SponserController::class);
           Route::resource('/page', PageController::class);
           Route::resource('/statistic', StatisticController::class);
           Route::resource('/brands', BrandController::class);

           Route::get('/setting', 'App\Http\Controllers\Admin\SettingController@index')->name('setting');
           Route::put('/setting_update', 'App\Http\Controllers\Admin\SettingController@update')->name('setting_update');
    });
// });

require __DIR__.'/auth.php';
