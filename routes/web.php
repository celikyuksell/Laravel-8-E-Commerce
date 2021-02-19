<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MesssageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopcartController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('homepage');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/sendmessage', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::get('/product/{id}/{slug}', [HomeController::class, 'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/productlist/{search}', [HomeController::class, 'productlist'])->name('productlist');
//Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->whereNumber('id')->whereAlpha('name')->name('test');

// Admin
Route::middleware('auth')->prefix('admin')->group(function () {

    #Admin role
    Route::middleware('admin')->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
        # Category
        Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
        Route::get('category/add', [\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin_category_add');
        Route::post('category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
        Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_delete');
        Route::get('category/show', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');

        #Product
        Route::prefix('product')->group(function () {
            // Route assigned name "admin.users"...
            Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin_products');
            Route::get('create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin_product_add');
            Route::post('store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin_product_store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin_product_edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin_product_update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin_product_delete');
            Route::get('show', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin_product_show');
        });

        #Product
        Route::prefix('messages')->group(function () {
            // Route assigned name "admin.users"...
            Route::get('/', [MesssageController::class, 'index'])->name('admin_message');
            Route::get('edit/{id}', [MesssageController::class, 'edit'])->name('admin_message_edit');
            Route::post('update/{id}', [MesssageController::class, 'update'])->name('admin_message_update');
            Route::get('delete/{id}', [MesssageController::class, 'destroy'])->name('admin_message_delete');
            Route::get('show', [MesssageController::class, 'show'])->name('admin_message_show');
        });

        #Product Image Gallery
        Route::prefix('image')->group(function () {
            Route::get('create/{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
            Route::post('store/{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
            Route::get('delete/{id}/{product_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
            Route::get('show', [\App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
        });

        #Review
        Route::prefix('review')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('admin_review');
            Route::post('update/{id}', [ReviewController::class, 'update'])->name('admin_review_update');
            Route::get('delete/{id}', [ReviewController::class, 'destroy'])->name('admin_review_delete');
            Route::get('show/{id}', [ReviewController::class, 'show'])->name('admin_review_show');
        });
        # Setting
        Route::get('setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
        Route::post('setting/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');


        #Faq
        Route::prefix('faq')->group(function () {
            // Route assigned name "admin.users"...
            Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
            Route::get('create', [FaqController::class, 'create'])->name('admin_faq_add');
            Route::post('store', [FaqController::class, 'store'])->name('admin_faq_store');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit');
            Route::post('update/{id}', [FaqController::class, 'update'])->name('admin_faq_update');
            Route::get('delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete');
            Route::get('show', [FaqController::class, 'show'])->name('admin_faq_show');
        });

        #Order
        Route::prefix('order')->group(function () {
            // Route assigned name "admin.users"...
            Route::get('/', [AdminOderController::class, 'index'])->name('admin_orders');
            Route::get('list/{status}', [AdminOderController::class, 'list'])->name('admin_order_list');
            Route::post('create', [AdminOderController::class, 'create'])->name('admin_order_add');
            Route::post('store', [AdminOderController::class, 'store'])->name('admin_order_store');
            Route::get('edit/{id}', [AdminOderController::class, 'edit'])->name('admin_order_edit');
            Route::post('update/{id}', [AdminOderController::class, 'update'])->name('admin_order_update');
            Route::post('itemupdate/{id}', [AdminOderController::class, 'itemupdate'])->name('admin_order_item_update');
            Route::get('delete/{id}', [AdminOderController::class, 'destroy'])->name('admin_order_delete');
            Route::get('show/{id}', [AdminOderController::class, 'show'])->name('admin_order_show');
        });

        #User
        Route::prefix('user')->group(function () {
            // Route assigned name "admin.users"...
            Route::get('/', [UserController::class, 'index'])->name('admin_users');
            Route::post('create', [UserController::class, 'create'])->name('admin_user_add');
            Route::post('store', [UserController::class, 'store'])->name('admin_user_store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin_user_edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('admin_user_update');
            Route::get('delete/{id}', [UserController::class, 'destroy'])->name('admin_user_delete');
            Route::get('show/{id}', [UserController::class, 'show'])->name('admin_user_show');
            Route::get('userrole/{id}', [UserController::class, 'user_roles'])->name('admin_user_roles');
            Route::post('userrolestore/{id}', [UserController::class, 'user_role_store'])->name('admin_user_role_add');
            Route::get('userroledelete/{userid}/{roleid}', [UserController::class, 'user_role_delete'])->name('admin_user_role_delete');
        });


    }); # admin
}); #auth

Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('myprofile');
    Route::get('/myreviews', [UserController::class, 'myreviews'])->name('myreviews');
    Route::get('/destroymyreview/{id}', [ReviewController::class, 'destroymyreview'])->name('user_review_delete');

});

Route::middleware('auth')->prefix('user')->namespace('user')->group(function () {

    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');

    #Product
    Route::prefix('product')->group(function () {
        // Route assigned name "admin.users"...
        Route::get('/', [ProductController::class, 'index'])->name('user_products');
        Route::get('create', [ProductController::class, 'create'])->name('user_product_add');
        Route::post('store', [ProductController::class, 'store'])->name('user_product_store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('user_product_edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('user_product_update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('user_product_delete');
        Route::get('show', [ProductController::class, 'show'])->name('user_product_show');
    });

    #Product Image Gallery
    Route::prefix('image')->group(function () {
        Route::get('create/{product_id}', [ImageController::class, 'create'])->name('user_image_add');
        Route::post('store/{product_id}', [ImageController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id}/{product_id}', [ImageController::class, 'destroy'])->name('user_image_delete');
        Route::get('show', [ImageController::class, 'show'])->name('admin_image_show');
    });

    #ShopCart
    Route::prefix('shopcart')->group(function () {
        // Route assigned name "admin.users"...
        Route::get('/', [ShopcartController::class, 'index'])->name('user_shopcart');
        Route::post('store/{id}', [ShopcartController::class, 'store'])->name('user_shopcart_add');
        Route::post('update/{id}', [ShopcartController::class, 'update'])->name('user_shopcart_update');
        Route::get('delete/{id}', [ShopcartController::class, 'destroy'])->name('user_shopcart_delete');
    });

    #Order
    Route::prefix('order')->group(function () {
        // Route assigned name "admin.users"...
        Route::get('/', [OrderController::class, 'index'])->name('user_orders');
        Route::post('create', [OrderController::class, 'create'])->name('user_order_add');
        Route::post('store', [OrderController::class, 'store'])->name('user_order_store');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('user_order_edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('user_order_update');
        Route::get('delete/{id}', [OrderController::class, 'destroy'])->name('user_order_delete');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('user_order_show');
    });
});


Route::get('/admin/login', [HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck', [HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


