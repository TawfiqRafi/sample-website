<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\FrontendController@index')->name('home');
Route::get('/privacy-policy','App\Http\Controllers\FrontendController@privacy')->name('privacy');
Route::get('/terms-condition','App\Http\Controllers\FrontendController@terms')->name('terms');
Route::get('/about-us','App\Http\Controllers\FrontendController@about')->name('about-us');
Route::get('/services','App\Http\Controllers\FrontendController@services')->name('services');
Route::get('/service/{slug}','App\Http\Controllers\FrontendController@serviceDetails')->name('service-details');
Route::get('/courses','App\Http\Controllers\FrontendController@courses')->name('courses');
Route::get('/course/{slug}','App\Http\Controllers\FrontendController@courseDetails')->name('course-details');
Route::get('/contact','App\Http\Controllers\FrontendController@contact')->name('contact');
Route::post('/contact/submit','App\Http\Controllers\FrontendController@contactStore')->name('contact.submit');
Route::post('/newsletter/submit','App\Http\Controllers\FrontendController@newsletterStore')->name('newsletter.submit');
Route::get('locale/{locale}','App\Http\Controllers\FrontendController@switch');

Route::get('/admin', function () {
    return redirect('dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', function () {
    return redirect('login');
});

Route::get('home', function () {
    return redirect('admin');
});

Route::get('admin', function () {
    return redirect('admin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function ($router) {
    $router->get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    $router->group(['prefix' => 'home', 'as' => 'home.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
        $router->post('/store', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('store');
    });

    $router->group(['prefix' => 'about-us', 'as' => 'about-us.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\AboutUsController::class, 'index'])->name('index');
        $router->post('/store', [App\Http\Controllers\Admin\AboutUsController::class, 'store'])->name('store');
    });

    $router->group(['prefix' => 'privacy-policy', 'as' => 'privacy-policy.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'index'])->name('index');
        $router->post('/store', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'store'])->name('store');
    });

    $router->group(['prefix' => 'terms-condition', 'as' => 'terms-condition.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\TermsConditionController::class, 'index'])->name('index');
        $router->post('/store', [App\Http\Controllers\Admin\TermsConditionController::class, 'store'])->name('store');
    });

    $router->group(['prefix' => 'settings', 'as' => 'settings.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\SiteSettingsController::class, 'index'])->name('index');
        $router->post('/store', [App\Http\Controllers\Admin\SiteSettingsController::class, 'store'])->name('store');
    });

    $router->group(['prefix' => 'subscribers', 'as' => 'subscribers.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('index');
    });

    $router->group(['prefix' => 'messages', 'as' => 'messages.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
    });

    $router->group(['prefix' => 'service', 'as' => 'service.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('list');
        $router->get('/create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('create');
        $router->post('/create', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('store');
        $router->get('/edit/{slug}', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('edit');
        $router->put('/edit/{slug}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('update');
        $router->delete('/destroy/{slug}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('destroy');
    });

    $router->group(['prefix' => 'course', 'as' => 'course.'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('list');
        $router->get('/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('create');
        $router->post('/create', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('store');
        $router->get('/edit/{slug}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('edit');
        $router->put('/edit/{slug}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('update');
        $router->delete('/destroy/{slug}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('destroy');
    });
});
