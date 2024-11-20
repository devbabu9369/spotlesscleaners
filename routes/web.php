<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CarController;
use App\Http\Controllers\admin\PartnerController;

use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\webpages\PagesController;
use App\Http\Controllers\webpages\ContactUsController;
use App\Http\Controllers\webpages\UserRegisterController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MakeNewPageController;
use App\Http\Controllers\admin\ContactInfController;
use App\Http\Controllers\admin\ContactUsController as UserContactUsContrller;




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

 

Route::get('/admin', [AdminLoginController::class, 'loginform'])->name('admin');
Route::POST('/admin/login', [AdminLoginController::class, 'login'])->name('login');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'check.device']], function () {

    Route::any('/dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/products', [AdminDashboardController::class, 'products'])->name('products');
    Route::match(['get', 'post'], '/orders', [AdminDashboardController::class, 'orders'])->name('orders');
    Route::get('/orders/details/{id}', [AdminDashboardController::class, 'orderDetails'])->name('orderDetails');
    Route::post('/change-order-status', [AdminDashboardController::class, 'changeOrderStatus'])->name('changeOrderStatus');
    Route::post('/change-payment-status', [AdminDashboardController::class, 'changePaymentStatus'])->name('changePaymentStatus');
    Route::get('/discount', [AdminDashboardController::class, 'discount'])->name('discount');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::post('/logo/delete', [AdminDashboardController::class, 'deleteData'])->name('deleteData');
    Route::get('/editData/{id}', [AdminDashboardController::class, 'editData'])->name('editData');
    Route::get('getsubcategory/{id}', [CommonController::class, 'getSubcate']);
    Route::post('/change-status', [CommonController::class, 'changeStatus'])->name('checkbox');
    Route::get('orders-assing', [AdminDashboardController::class, 'ordersAssing'])->name('orders-assing');
    Route::post('orders-assign', [AdminDashboardController::class, 'AssingToPartner'])->name('assignToPartner');


    // CATEGORY AREA START
    Route::resource('category', CategoryController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('contactInfo', ContactInfController::class);
    Route::resource('cars', CarController::class);
    Route::resource('pages', MakeNewPageController::class);

    Route::get('/contact-us-list', [UserContactUsContrller::class, 'index'])->name('contact-us-list');

    Route::get('/about-us', [UserContactUsContrller::class, 'AboutUs'])->name('about-us');
    Route::put('/about-us/{id}', [UserContactUsContrller::class, 'Update'])->name('aboutUs.update');


    Route::any('/be-come-partner', [AdminDashboardController::class, 'becomePartner'])->name('show-partner');
    Route::post('order/send-invoice', [AdminDashboardController::class, 'sendInvoiceAjax'])->name('order.sendInvoiceAjax');

    Route::post('extra-work', [AdminDashboardController::class, 'StoreExtraWork'])->name('extra.work.store');
    Route::post('payment-add', [AdminDashboardController::class, 'paymentAdd'])->name('payment_add');
    Route::get('orders-review', [AdminDashboardController::class, 'ReviewList'])->name('orders-review-list');
    Route::post('/admin/change-password', [AdminDashboardController::class, 'changePassword'])->name('admin.changePassword');
});


Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/services/{slug}', [PagesController::class, 'services'])->name('services');
Route::get('/category/{slug}', [PagesController::class, 'getCategory'])->name('category');
Route::get('/category-subcategory/{slug}', [PagesController::class, 'getCategorySubcategory'])->name('categorysubcategory');
Route::get('/subcategory-services/{slug}', [PagesController::class, 'getSubcategoryService'])->name('getSubcategoryService');


Route::Post('/contact-us', [ContactUsController::class, 'store'])->name('contactus.store');

Route::Post('/become-partner', [ContactUsController::class, 'saveBecomePartner'])->name('saveBecome');
// Route::get('/view-cart', [PagesController::class, 'cart'])->name('cart');
Route::get('/login', [PagesController::class, 'userLogin'])->name('userLogin')->middleware(['check.device']);
Route::get('/register', [PagesController::class, 'userRegister'])->name('userRegister');
// Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-and-conditions', [PagesController::class, 'termsAndConditions'])->name('termsAndConditions');


Route::post('/user-register', [UserRegisterController::class, 'userRegister'])->name('user-register');
Route::post('/user-login', [UserRegisterController::class, 'userLogin'])->name('loginRequest');
// Route::post('/user-login', [UserRegisterController::class, 'sendotp'])->name('loginRequest');
Route::get('/logout', [UserRegisterController::class, 'logout'])->name('logout');



// otp verification

Route::post('/send-otp', [UserRegisterController::class, 'sendRequestOtp'])
    ->name('send.otp');

Route::post('/verify-otp', [UserRegisterController::class, 'verifyCode'])
    ->name('verify.otp');


Route::get('/otp/request', [UserRegisterController::class, 'showOtpForm'])->name('otp.verifyForm');
 


Route::get('/service-details/{id}', [PagesController::class, 'serviceDetails'])->name('serviceDetails');

Route::get('/service-list', [PagesController::class, 'serviceList'])->name('serviceList');
Route::get('/user-profile', [PagesController::class, 'userProfile'])->name('userProfile');
Route::post('/cancel-order', [PagesController::class, 'cancelOrder'])->name('cancelOrder');
//cart route ==============

// Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);

Route::get('/cart-status/{serviceId}', [CartController::class, 'checkCartStatus'])->name('check.cart.status');

// Route to add an item to the cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');




Route::post('/update-cart-data', [CartController::class, 'updateQuantity'])->name('update.cart-data');

// Route for removing an item
Route::post('/remove-cart-item', [CartController::class, 'removeItem'])->name('remove.cart.item');



Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');

// routes/web.php
Route::post('/order/update-date', [PagesController::class, 'updateDate'])->name('order.update_date');
Route::POST('/profile/update', [PagesController::class, 'update'])->name('profile.update');
Route::get('/updatePaymentStatus/{id}', [PagesController::class, 'updatePaymentStatus'])->name('updatePaymentStatus');



// Handle review submission
Route::post('/review', [PagesController::class, 'submitReview'])->name('review.submit');
Route::post('/store-rating', [PagesController::class, 'StoreRating'])->name('store-rating');

Route::middleware(['auth.check'])->group(function () {

    //   Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
    Route::post('/update-user-detials', [PagesController::class, 'updateUserDetails'])->name('update-user-details');
    Route::post('/payment/success', [PagesController::class, 'paymentSuccess'])->name('payment.success');
    Route::post('razorpay-payment', [PagesController::class, 'store'])->name('razorpay.payment.store');
    Route::get('/checkout/{id?}', [PagesController::class, 'checkout'])
        // ->middleware(['verified_phone','check.device'])
        ->name('checkout');
});
// Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
Route::get('/forget-password', [PagesController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password', [PagesController::class, 'forgetPasswordSend'])->name('forgetPasswordSend');
Route::get('/forget-password-link/{token}', [PagesController::class, 'forgetPasswordLink'])->name('forgetpasswordlink');

Route::post('password/forget', [PagesController::class, 'forget'])->name('passwordforget');
 
Route::post('/store-date-time', [UserRegisterController::class, 'DateTimeStore'])->name('dateTime.store')->middleware('verified_phone');
 
 Route::get('/{slug}', [PagesController::class, 'showPage'])->name('newPagesDyn.show');
  
