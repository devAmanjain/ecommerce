<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;




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

Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Handle the route related to the category
 Route::controller(CategoryController::class)->prefix('category')->group(function(){
    Route::get('index','index')->name('category.index');
    Route::get('form','categoryForm')->name('add_category.form');
    Route::post('add','store')->name('add.category');
    Route::get('show/{id}','edit')->name('edit.category');
    Route::get('delete/{id}','destroy')->name('delete.category');

 });


// Handle the route related to the sub_category
Route::controller(SubCategoryController::class)->prefix('sub_category')->group(function(){
    Route::get('index','index')->name('sub_category.index');
    Route::get('form','categoryForm')->name('add_sub_category.form');
    Route::post('add','store')->name('add.sub_category');
    Route::get('show/{id}','edit')->name('edit.sub_category');
    Route::get('delete/{id}','destroy')->name('delete.sub_category');
    Route::post('getsubCategories','getsubCategories')->name('get_subcategories');

 });


 // Handle the route related to the products
Route::controller(ProductController::class)->prefix('product')->group(function(){
    Route::get('index','index')->name('product.index');
    Route::get('form','productForm')->name('add_product.form');
    Route::post('add','store')->name('add.product');
    Route::get('show/{id}','edit')->name('edit.product');
    Route::get('delete/{id}','destroy')->name('delete.product');

 });


