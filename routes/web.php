<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:admin'])->group(function (){
    Route::group(['prefix' => 'admin',],function () {
        Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
        Route::get('profile/edit', [AdminProfileController::class, 'EditProfile'])->name('admin.profile.edit');
        Route::post('profile/store', [AdminProfileController::class, 'storeProfile'])->name('admin.profile.store');
        Route::get('profile/change_password', [AdminProfileController::class, 'changePassword'])->name('profile.change.password');
        Route::post('profile/change_password/store', [AdminProfileController::class, 'storePassword'])->name('update.change.password.store');
        ####################Brands Routes ############################
        Route::prefix('brand')->group(function () {
            Route::get('view', [BrandController::class, 'brandView'])->name('brands.view');
            Route::post('store', [BrandController::class, 'brandStore'])->name('brands.store');
            Route::get('edit/{id}', [BrandController::class, 'brandEdit'])->name('brands.edit');
            Route::post('update', [BrandController::class, 'brandUpdate'])->name('brands.update');
            Route::get('delete/{id}', [BrandController::class, 'brandDelete'])->name('brands.delete');


        });
####################    End Brands Routes ############################
        ####################Category Routes ############################
        Route::prefix('category')->group(function () {
            Route::get('view', [CategoryController::class, 'categoryView'])->name('category.view');
            Route::post('store', [CategoryController::class, 'categoryStore'])->name('category.store');
            Route::get('edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
            Route::post('update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
            Route::get('delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
            ####################subCategory Routes ############################
            Route::prefix('subcategory')->group(function () {
                Route::get('view', [SubCategoryController::class, 'subCategoryView'])->name('subcategory.view');
                Route::post('store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
                Route::get('edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
                Route::post('update', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
                Route::get('delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');
                Route::get('ajax/{category_id}', [SubCategoryController::class, 'getSubCategoryAjax']);
                ####################End subCategory Routes ############################

                ####################subsubCategory Routes ############################
                Route::prefix('sub')->group(function () {
                    Route::get('view', [SubCategoryController::class, 'subSubCategoryView'])->name('subsubcategory.view');
                    Route::post('store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
                    Route::get('edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
                    Route::post('update', [SubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
                    Route::get('delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
                    Route::get('ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategoryAjax']);
                    ####################End SubsubCategory Routes ############################
                });//end of subCategory Routes
            });//end of subCategory Routes

        });//end of Category Routes
        ####################products Routes ############################
        Route::prefix('product')->group(function () {
            Route::get('add', [ProductController::class, 'AddProduct'])->name('product.add');
            Route::post('store', [ProductController::class, 'productStore'])->name('product.store');
            Route::get('manage', [ProductController::class, 'manageProduct'])->name('product.manage');
            Route::get('edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
            Route::post('update', [ProductController::class, 'productUpdate'])->name('product.update');
            Route::post('multiimage/update', [ProductController::class, 'multiImageUpdate'])->name('image.update');
            Route::post('thumbnail/update', [ProductController::class, 'thumbUpdate'])->name('update.thumbnail');
            Route::get('delete/', [ProductController::class, 'multiImgDelete'])->name('prod.image.delete');
            Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
            Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
            Route::get('delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
            ####################End products Routes ############################

        });
        ######################################Slider Routes########################
        Route::prefix('slider')->group(function() {

            Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
            Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
            Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
            Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
            Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
            Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

        });
        ######################################EndSlider Routes########################

    });//end of admin Routes

});


####################user Routes ############################
    Route::group(['prefix' => 'user',], function () {

        Route::get('logout', [UserController::class, 'destroy'])->name('user.logout');
        Route::get('home', [UserController::class, 'userHome'])->name('user.home');
        Route::get('profile/change_password', [UserController::class, 'changePassword'])->name('user.change.password');
        Route::post('profile/change_password/store', [UserController::class, 'storePassword'])->name('user.change.password.store');
        Route::get('user/profile', [UserController::class, 'userProfile'])->name('user.profile');
        Route::post('profile/store', [UserController::class, 'storeProfile'])->name('user.profile.store');
    });

#################### End user Routes ############################
    Route::get('test', function () {
        return view('frontend.index');
    });

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
        return view('admin.index');

    })->name('admin.dashboard')->middleware('auth:admin');

    Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
        return view('frontend.dashboard');
    })->name('dashboard');

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});
Route::get('/', [IndexController::class, 'index']);
Route::get('product/details/{id}', [IndexController::class, 'productDetails']);
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('/subsubcategory/product/{subsubcat_id}', [IndexController::class, 'SubSubCatWiseProduct']);


//languages Routes
Route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

