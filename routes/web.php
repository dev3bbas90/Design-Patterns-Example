<?php

//back

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HallController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TheaterController;
use App\Http\Controllers\Admin\CastTypeController;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\ProgramCategoriesController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ContactFormController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HallTimeFrameController;
use App\Http\Controllers\Admin\ReportController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//front
use App\Http\Controllers\Front\BookingController AS FrontBookingController;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Auth;


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
Auth::routes(['register' => false]);

Route::get('get_columns',[HomeController::class,'get_columns'])->name('get_columns');
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::post('contact_submit',[IndexController::class, 'contact_submit' ])->name('contact_submit');
    Route::post('newsletter',[IndexController::class, 'newsletter' ])->name('newsletter');
    Route::get('/', [IndexController::class,'index'])->name('index');
    Route::group(['prefix'=>'theaters'], function(){
        Route::get('/', [IndexController::class,'theaters'])->name('front.theaters');
        Route::get('/{theater}', [IndexController::class,'theater'])->name('front.theater');
    });
    Route::group(['prefix'=>'programs'], function(){
        Route::get('/', [IndexController::class,'programs'])->name('front.programs');
        Route::get('/{program}', [IndexController::class,'program'])->name('front.program');
    });
    Route::get('booking',[FrontBookingController::class,'booking'])->name('front.booking');
    Route::get('get_events',[FrontBookingController::class,'get_events'])->name('front.events.get');
    Route::get('get_time_frames',[FrontBookingController::class,'get_time_frames'])->name('front.time_frames.get');
    Route::get('booking_seats',[FrontBookingController::class,'booking_seats'])->name('booking_seats');
    Route::post('checkout',[FrontBookingController::class,'checkout'])->name('checkout');
    Route::get('booking_details/{token}',[FrontBookingController::class,'booking_details'])->name('booking_details');
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [HomeController::class,'index'])->name('admin');
    Route::resource('users', UserController::class);
    /** Theaters */
    Route::resource('theaters', TheaterController::class); // done
    Route::resource('categories', CategoryController::class); //done
    Route::resource('halls', HallController::class); //done
    Route::resource('hall_time_frames', HallTimeFrameController::class); //done
    Route::resource('events', EventController::class); // done
    /** Programs */
    Route::resource('program-category', ProgramCategoriesController::class); // done
    Route::resource('programs', ProgramController::class); // done
    Route::resource('casts-type', CastTypeController::class); // done
    Route::resource('casts', CastController::class); // done

    /** Partners */
    Route::resource('partners', PartnerController::class); //done

    /** slider */
    Route::resource('slider', SliderController::class);

    /** newsletters */
    Route::resource('newsletters', NewsletterController::class);

    /** form */
    Route::resource('contact', ContactFormController::class);
    Route::resource('booking', BookingController::class);
    // Route::resource('hall_programs', HallProgramController::class);

    /** ajax */
    Route::get('halls/get/{theater_id?}',[HallController::class,'get'])->name('halls.get');
    Route::group(['prefix'=>'ajax'],function(){
        Route::get('hall_time_frames/get_data',[HallTimeFrameController::class,'get_data'])->name('ajax.time_frames.get_data');
    });

    /** reports */
    Route::group(['prefix'=>'reports'],function(){
            Route::get('booking',[ReportController::class,'booking'])->name('reports.booking');
    });

});
