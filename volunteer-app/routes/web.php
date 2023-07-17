<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\RoleController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;

use App\Http\Controllers\User\ReviewController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// middleware for rerouting url
//Admin Dashboard

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->
    name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->
    name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->
    name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->
    name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->
    name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->
    name('update.password');
});

//Organization Dashboard

Route::middleware(['auth','role:organization'])->group(function() {
    Route::get('/organization/dashboard', [OrganizationController::class, 'OrganizationDashboard'])->
    name('organization.dashboard');

    Route::get('/organization/logout', [OrganizationController::class, 'OrganizationDestroy'])->
    name('organization.logout');

    Route::get('/organization/profile', [OrganizationController::class, 'OrganizationProfile'])->
    name('organization.profile');

    Route::post('/organization/profile/store', [OrganizationController::class, 'OrganizationProfileStore'])->
    name('organization.profile.store');


});
/*
Route::middleware(['auth','role:organization'])->group(function() {

    Route::get('/organization/dashboard', [OrganizationController::class, 'VendorDashboard'])->name('organization.dashobard');

    Route::get('/organization/logout', [OrganizationController::class, 'VendorDestroy'])->name('organization.logout');

    Route::get('/organization/profile', [OrganizationController::class, 'VendorProfile'])->name('organization.profile');

    Route::post('/organization/profile/store', [OrganizationController::class, 'VendorProfileStore'])->name('organization.profile.store');

    Route::get('/organization/change/password', [OrganizationController::class, 'VendorChangePassword'])->name('organization.change.password');

    Route::post('/organization/update/password', [OrganizationController::class, 'VendorUpdatePassword'])->name('organization.update.password');

});

*/

Route::get('/admin/login', [AdminController::class, 'AdminLogin']);

Route::get('/organization/login', [OrganizationController::class, 'OrganizationLogin']);

