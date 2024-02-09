<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\Properties\CategoryController;
use App\Http\Controllers\Admin\Properties\PropertiesController;
use App\Http\Controllers\Admin\Application\ApplicationController;
use App\Http\Controllers\Admin\Payment\PaymentController;
use App\Http\Controllers\Admin\Maintance\MaintanceController;
use App\Http\Controllers\Admin\Expenses\ExpensesController;
use App\Http\Controllers\Admin\Residents\ResidentsLeaseController;
use App\Http\Controllers\Admin\Account\AccountSettingController;
use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Http\Controllers\Admin\Testimonials\TestimonialsController;

use App\Http\Controllers\Front\StorageSearchController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontMetaPagesController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\Admin\SiteContent;

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

Route::get('/',[FrontHomeController::class,'index']);
Route::post('getSizes',[FrontHomeController::class,'getSizes']);
Route::post('getFeatures',[FrontHomeController::class,'getFeatures']);
Route::post('filterResponse',[StorageSearchController::class,'filterResponse']);
Route::post('inexFilterResponse',[StorageSearchController::class,'indexFilterResponse']);

// Route::get('/test',[AdminDashController::class,'test']);
Route::get('/storage-search',[StorageSearchController::class,'index']);
Route::get('/storage-search/{slug}',[StorageSearchController::class,'StorageDetail']);


Route::get('/admin-login',[AuthenticationController::class,'index']);
Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);
Route::get('/logout',[AuthenticationController::class,'logout']);

Route::post('stripe/webhook',[StripeWebhookController::class,'index']);


///blog
Route::get('blogs/{slug?}',[FrontBlogController::class,'index']);
Route::get('blogs-detail/{slug}',[FrontBlogController::class,'deatilPage']);

Route::get('storage-facilities',[FrontMetaPagesController::class,'storageFacilities']);
Route::get('support',[FrontMetaPagesController::class,'support']);
Route::get('company-info',[FrontMetaPagesController::class,'companyInfo']);

//admin
Route ::group(['middleware' =>['admin']],function(){
Route::get('/admin-dashboard',[AdminDashController::class,'index'])->name('admin-dashboard');

////propertyCategory
Route::get('/admin-dashboard/properties/catgories',[CategoryController::class,'index'])->name('categories');
Route::post('/admin-dashboard/categorySubmit',[CategoryController::class,'submitProcc']);
Route::get('/admin-dashboard/category/delete/{id}',[CategoryController::class,'delete']);

////sizes00
Route::get('/admin-dashboard/sizes/{slug}',[CategoryController::class,'sizes'])->name('sizes');
Route::post('/admin-dashboard/sizeSubmit',[CategoryController::class,'sizeSubmit']);
Route::get('/admin-dashboard/sizes/delete/{id}',[CategoryController::class,'sizedelete']);

////sizes
Route::get('/admin-dashboard/features/{slug}',[CategoryController::class,'features'])->name('features');
Route::post('/admin-dashboard/featureSubmit',[CategoryController::class,'featureSubmit']);
Route::get('/admin-dashboard/feature/delete/{id}',[CategoryController::class,'featuredelete']);

////Property
Route::get('admin-dashboard/properties',[PropertiesController::class,'list'])->name('properites');
Route::get('admin-dashboard/properties/add',[PropertiesController::class,'index'])->name('add-properties');
Route::get('admin-dashboard/properties/edit/{id}',[PropertiesController::class,'edit'])->name('update-properties');
Route::post('admin-dashboard/properties/addProcc',[PropertiesController::class,'submitProcc']);
Route::post('admin-dashboard/properties/updateProcc',[PropertiesController::class,'updateProcc']);
Route::post('admin-dashboard/media/delete/',[PropertiesController::class,'deleteImages']);

Route::get('admin-dashboard/properties/view/{id}',[PropertiesController::class,'view'])->name('propertie-detail');
Route::get('admin-dashboard/properties/delete/{id}',[PropertiesController::class,'delete']);
Route::post('admin-dashboard/getsizesandfeatures',[PropertiesController::class,'getSizesAndFeatures']);

/////Storages
Route::post('admin-dashboard/storage/submitProcc',[PropertiesController::class,'storageSubmit']);
Route::post('admin-dashboard/storage/updateProcc',[PropertiesController::class,'storageUpdate']);
Route::get('admin-dashboard/storage/delete/{id}',[PropertiesController::class,'storageDelete']);
Route::get('admin-dashboard/storage/update/{id}',[PropertiesController::class,'updateStorage']);

///blogs
Route::get('admin-dashboard/blogs',[AdminBlogController::class,'index']);
Route::get('admin-dashboard/blogs/add/{id?}',[AdminBlogController::class,'add']);
Route::post('admin-dashboard/blogs/submitProcc',[AdminBlogController::class,'submitProcc']);
Route::get('admin-dashboard/blog/delete/{id}',[AdminBlogController::class,'deleteBlog']);

Route::get('admin-dashboard/blogs/categories',[AdminBlogController::class,'categories']);
Route::post('admin-dashboard/blogs/categories/submitProcc',[AdminBlogController::class,'categorySubmit']);
Route::get('admin-dashboard/blogs/categories/delete/{id}',[AdminBlogController::class,'categoryDelete']);

///Testonomials
Route::get('admin-dashboard/testimonials',[TestimonialsController::class,'index']);
Route::get('admin-dashboard/testimonials/add/{id?}',[TestimonialsController::class,'add']);
Route::post('admin-dashboard/testimonials/addProcc',[TestimonialsController::class,'addProcc']);
Route::get('admin-dashboard/testimonials/delete/{id?}',[TestimonialsController::class,'delete']);

////Applications
Route::get('admin-dashboard/applications',[ApplicationController::class,'index'])->name('applications');

///payments
Route::get('admin-dashboard/payments',[PaymentController::class,'index'])->name('payments');

///maintance
Route::get('admin-dashboard/maintenance',[MaintanceController::class,'index'])->name('maintenance');

///Expenses
Route::get('admin-dashboard/expenses',[ExpensesController::class,'index'])->name('expenses');

//Residents and lease
Route::get('admin-dashboard/residents',[ResidentsLeaseController::class,'index'])->name('residents');

///accountsetting
Route::get('admin-dashboard/account-setting',[AccountSettingController::class,'index']);
Route::post('admin-dashboard/updateProfile',[AccountSettingController::class,'updateProfile']);

//sitecontent
Route::get('admin-dashboard/site-content',[SiteContent::class,'homepage']);
Route::post('admin-dashboard/site-content/submitProcc',[SiteContent::class,'saveHome']);
Route::get('admin-dashboard/site-features',[SiteContent::class,'features']);
Route::post('admin-dashboard/featureSubmit',[SiteContent::class,'featureSubmit']);
Route::get('admin-dashboard/featureDelete/{id}',[SiteContent::class,'featureDelete']);

Route::get('admin-dashboard/facilitiesContent/',[SiteContent::class,'facilitiesContent']);
Route::post('admin-dashboard/facilitiesContent/submitProcc',[SiteContent::class,'facilitySubmit']);

});
