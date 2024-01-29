<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\Properties\CategoryController;
use App\Http\Controllers\Admin\Properties\PropertiesController;

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

Route::get('/admin-login',[AuthenticationController::class,'index']);
Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);
Route::get('/logout',[AuthenticationController::class,'logout']);


//admin
Route ::group(['middleware' =>['admin']],function(){
Route::get('/admin-dashboard',[AdminDashController::class,'index']);

////propertyCategory
Route::get('/admin-dashboard/properties/catgories',[CategoryController::class,'index']);
Route::post('/admin-dashboard/categorySubmit',[CategoryController::class,'submitProcc']);
Route::get('/admin-dashboard/category/delete/{id}',[CategoryController::class,'delete']);

////sizes
Route::get('/admin-dashboard/sizes/{slug}',[CategoryController::class,'sizes']);
Route::post('/admin-dashboard/sizeSubmit',[CategoryController::class,'sizeSubmit']);
Route::get('/admin-dashboard/sizes/delete/{id}',[CategoryController::class,'sizedelete']);

////sizes
Route::get('/admin-dashboard/features/{slug}',[CategoryController::class,'features']);
Route::post('/admin-dashboard/featureSubmit',[CategoryController::class,'featureSubmit']);
Route::get('/admin-dashboard/feature/delete/{id}',[CategoryController::class,'featuredelete']);

////Property
Route::get('admin-dashboard/properties',[PropertiesController::class,'list']);
Route::get('admin-dashboard/properties/add',[PropertiesController::class,'index']);
Route::post('admin-dashboard/properties/addProcc',[PropertiesController::class,'submitProcc']);

Route::get('admin-dashboard/properties/view/{id}',[PropertiesController::class,'view']);
Route::get('admin-dashboard/properties/delete/{id}',[PropertiesController::class,'delete']);
Route::post('admin-dashboard/getsizesandfeatures',[PropertiesController::class,'getSizesAndFeatures']);

Route::post('admin-dashboard/storage/submitProcc',[PropertiesController::class,'storageSubmit']);

});
