<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::middleware(["auth", "admin"])->group(function (){
    Route::get('/', [WebController::class, "home"]);
    Route::get('/home', [WebController::class, "home"]);
    Route::get('/about-us', [WebController::class, "aboutUs"]);
    Route::get("/category", [CategoryController::class, "all"]);
    Route::get('/product', [ProductController::class, "all"]);
    Route::get('/product/add-new-product', [ProductController::class, "addNewProduct"]);
    Route::get("/category/new", [CategoryController::class, "newCategory"]);
    Route::get("/category/edit/{category_id}", [CategoryController::class, "edit_category"]);
    Route::post("/category/update/{category_id}", [CategoryController::class, "update_category"]);
    Route::get("/category/delete/{category_id}", [CategoryController::class, "delete_category"]);
    Route::post("/category/save", [CategoryController::class, "save"]);
    Route::post("/product/save", [ProductController::class, "saveNewProduct"]);
    Route::post("/product/update/{product_id}", [ProductController::class, "update_product"]);
    Route::get("/product/new", [ProductController::class, "addNewProduct"]);
    Route::get("/product/edit/{product_id}", [ProductController::class, "edit_product"]);
    Route::get("/product/delete/{product_id}", [ProductController::class, "delete_product"]);

    Route::get('/brand', [BrandController::class, "all_brand"]);
    Route::get('/brand/new', [BrandController::class, "add_brand"]);
    Route::post('/brand/save', [BrandController::class, "save_brand"]);
    Route::get('/brand/edit/{brand_id}', [BrandController::class, "edit_brand"]);
    Route::post('/brand/update/{brand_id}', [BrandController::class, "update_brand"]);
    Route::get('/brand/delete/{brand_id}', [BrandController::class, "delete_brand"]);
});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

