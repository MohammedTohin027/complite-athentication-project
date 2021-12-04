<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\admin\AjaxController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\DivisionController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\admin\SubSubCategoryController;

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

//   Admin Route
Route::group(['prefix' => 'admin', 'middleware' =>['admin', 'auth', 'permission'] ], function(){
    Route::get('dashbard', [AdminController::class, 'index'])->name('admin.dashboard');

    //  Profile Route
    Route::prefix('profile')->group(function () {
        Route::get('view', [AdminController::class, 'viewProfile'])->name('view.profile');
        Route::post('update-ifno', [AdminController::class, 'updateProfileInfo'])->name('admin.update.profile-info');
        Route::get('update-image', [AdminController::class, 'changeImage'])->name('admin.change.image');
        Route::post('update-image', [AdminController::class, 'updateImage'])->name('admin.update.image');
        Route::get('update-password', [AdminController::class, 'changePassword'])->name('admin.change.password');
        Route::post('update-password', [AdminController::class, 'updatePassword'])->name('admin.update.password');
    });

    //  Slider Route
    Route::get('/slider-index', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/published/{id}', [SliderController::class, 'published'])->name('slider.published');
    Route::get('/slider/unpublished/{id}', [SliderController::class, 'unpublished'])->name('slider.unpublished');
    Route::get('/slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update', [SliderController::class, 'update'])->name('slider.update');

     //  Brand Route
     Route::get('/brand-index', [BrandController::class, 'index'])->name('brand.index');
     Route::post('/brand-store', [BrandController::class, 'store'])->name('brand.store');
     Route::get('/brand/published/{id}', [BrandController::class, 'published']);
     Route::get('/brand/unpublished/{id}', [BrandController::class, 'unpublished']);
     Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);
     Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
     Route::post('/brand/update', [BrandController::class, 'update'])->name('update.brand');

    //  Category Route
    Route::get('/category-index', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/published/{id}', [CategoryController::class, 'published']);
    Route::get('/category/unpublished/{id}', [CategoryController::class, 'unpublished']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update', [CategoryController::class, 'update'])->name('update.category');

     //  Sub Category Route
     Route::get('/subcategory-index', [SubCategoryController::class, 'index'])->name('subcategory.index');
     Route::post('/subcategory-store', [SubCategoryController::class, 'store'])->name('subcategory.store');
     Route::get('/subcategory/published/{id}', [SubCategoryController::class, 'published']);
     Route::get('/subcategory/unpublished/{id}', [SubCategoryController::class, 'unpublished']);
     Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'delete']);
     Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit']);
     Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->name('update.subcategory');

    //  Ajax Controller
    Route::get('/subcategory/ajax/{id}', [AjaxController::class, 'getSubCategory']);
    Route::get('/sub-subcategory/ajax/{id}', [AjaxController::class, 'getSubSubCategory']);
    Route::get('/district/ajax/{id}', [AjaxController::class, 'getDistrict']);

     //  Sub Sub Category Route
    Route::get('/sub-subcategory-index', [SubSubCategoryController::class, 'index'])->name('subsubcategory.index');
    Route::post('/sub-subcategory-store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
    Route::get('/sub-subcategory/published/{id}', [SubSubCategoryController::class, 'published']);
    Route::get('/sub-subcategory/unpublished/{id}', [SubSubCategoryController::class, 'unpublished']);
    Route::get('/sub-subcategory/delete/{id}', [SubSubCategoryController::class, 'delete']);
    Route::get('/sub-subcategory/edit/{id}', [SubSubCategoryController::class, 'edit']);
    Route::post('/sub-subcategory/update', [SubSubCategoryController::class, 'update'])->name('update.subsubcategory');

     //  Product Route
     Route::get('/add-product', [ProductController::class, 'add'])->name('add.product');
     Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
     Route::get('/manage-product', [ProductController::class, 'manage'])->name('manage.product');
     Route::get('/product/published/{id}', [ProductController::class, 'published']);
     Route::get('/product/unpublished/{id}', [ProductController::class, 'unpublished']);
     Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
     Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
     Route::post('/product/update', [ProductController::class, 'update'])->name('update.product');
     Route::post('/product-thambnail/update', [ProductController::class, 'productThambnailUpdate'])->name('update.product_thambnail');
     Route::get('/product/multi_image/delete/{id}', [ProductController::class, 'productMultiImageDelete']);
     Route::post('/product/multi_img/update', [ProductController::class, 'productMultiImageUpdate'])->name('product.multi_img.update');

    //  Coupon Route
    Route::get('/coupon-index', [CouponController::class, 'index'])->name('coupon.index');
    Route::post('/coupon-store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/coupon/published/{id}', [CouponController::class, 'published'])->name('coupon.published');
    Route::get('/coupon/unpublished/{id}', [CouponController::class, 'unpublished'])->name('coupon.unpublished');
    Route::get('/coupon/delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
    Route::get('/coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/coupon/update', [CouponController::class, 'update'])->name('coupon.update');

    //  Division Route
    Route::get('/division-index', [DivisionController::class, 'index'])->name('division.index');
    Route::post('/division-store', [DivisionController::class, 'store'])->name('division.store');
    Route::get('/division/published/{id}', [DivisionController::class, 'published'])->name('division.published');
    Route::get('/division/unpublished/{id}', [DivisionController::class, 'unpublished'])->name('division.unpublished');
    Route::get('/division/delete/{id}', [DivisionController::class, 'delete'])->name('division.delete');
    Route::get('/division/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
    Route::post('/division/update', [DivisionController::class, 'update'])->name('division.update');

    //  District Route
    Route::get('/district-index', [DistrictController::class, 'index'])->name('district.index');
    Route::post('/district-store', [DistrictController::class, 'store'])->name('district.store');
    Route::get('/district/published/{id}', [DistrictController::class, 'published'])->name('district.published');
    Route::get('/district/unpublished/{id}', [DistrictController::class, 'unpublished'])->name('district.unpublished');
    Route::get('/district/delete/{id}', [DistrictController::class, 'delete'])->name('district.delete');
    Route::get('/district/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
    Route::post('/district/update', [DistrictController::class, 'update'])->name('district.update');

    //  State Route
    Route::get('/state-index', [StateController::class, 'index'])->name('state.index');
    Route::post('/state-store', [StateController::class, 'store'])->name('state.store');
    Route::get('/state/published/{id}', [StateController::class, 'published'])->name('state.published');
    Route::get('/state/unpublished/{id}', [StateController::class, 'unpublished'])->name('state.unpublished');
    Route::get('/state/delete/{id}', [StateController::class, 'delete'])->name('state.delete');
    Route::get('/state/edit/{id}', [StateController::class, 'edit'])->name('state.edit');
    Route::post('/state/update', [StateController::class, 'update'])->name('state.update');

    //  Role Route
    Route::prefix('role')->group(function () {
        Route::get('view', [RoleController::class, 'index'])->name('role.index');
        Route::post('store', [RoleController::class, 'store'])->name('role.store');
        Route::get('update/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });

    //  Permission Route
    Route::prefix('permission')->group(function () {
        Route::get('view', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('update/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    });

    //  Subadmin Route
    Route::prefix('subadmin')->group(function () {
        Route::get('view', [SubAdminController::class, 'index'])->name('subadmin.index');
        Route::post('store', [SubAdminController::class, 'store'])->name('subadmin.store');
        Route::get('update/{id}', [SubAdminController::class, 'edit'])->name('subadmin.edit');
        Route::put('update/{id}', [SubAdminController::class, 'update'])->name('subadmin.update');
        Route::get('delete/{id}', [SubAdminController::class, 'delete'])->name('subadmin.delete');
    });

    Route::get('all/user', [AdminController::class, 'allUser'])->name('all.user.view');
    Route::get('user/banned/{id}', [AdminController::class, 'userBanned'])->name('user.banned');
    Route::get('user/unbanned/{id}', [AdminController::class, 'userUnbanned'])->name('user.unbanned');

});

//    ==============================   Socialite Route   ==================================
//   Google Route
    Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [LoginController::class, 'callbackToGoogle']);
//   Facebook Route
    Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [LoginController::class, 'callbackToFacebook']);



//   User Route
Route::group(['prefix' => 'user', 'middleware' =>['user', 'auth'] ], function(){
    Route::get('dashbard', [UserController::class, 'index'])->name('user.dashboard');

    //  Profile Route
    Route::prefix('profile')->group(function () {

     Route::post('update-info', [UserController::class, 'updateProfile'])->name('update.profile');
        Route::get('update-image', [UserController::class, 'changeImage'])->name('change.image');
        Route::post('update-image', [UserController::class, 'updateImage'])->name('update.image');
        Route::get('update-password', [UserController::class, 'changePassword'])->name('change.password');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('update.password');
    });

});