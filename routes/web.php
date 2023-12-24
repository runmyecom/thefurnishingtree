<?php

use App\Livewire\Admin\Products;
use App\Livewire\Admin\CreateProduct;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\SubCategory\SubIndex;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Material\MaterialIndex;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin - Product Route
Route::get('/products', Products::class)->name('product.index');
Route::get('/products/create', CreateProduct::class);

// Admin - Category | Sub-Category | Material | Brand | Sizes | Model | Inventory Route
Route::get('/category', CategoryIndex::class)->name('category.index');
Route::get('/sub-category', SubIndex::class)->name('sub_category.index');
Route::get('/material', MaterialIndex::class)->name('material.index');