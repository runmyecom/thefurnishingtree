<?php

use App\Models\Item;
use App\Livewire\Checkout;
use App\Livewire\ImportSheet;
use App\Livewire\Client\Items;
use App\Livewire\ShoppingCart;
use App\Livewire\Admin\Products;
use App\Livewire\Client\BrandByType;
use App\Livewire\Client\ModelBySize;
use App\Livewire\Client\SizeByColor;
use App\Livewire\Admin\CreateProduct;
use App\Livewire\Client\ItemsByModel;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Item\ItemIndex;
use App\Livewire\Admin\Node\NodeIndex;
use App\Livewire\Admin\Order\ThankYou;
use App\Livewire\Admin\Size\SizeIndex;
use App\Livewire\Admin\Type\TypeIndex;
use App\Livewire\Admin\Brand\BrandIndex;
use App\Livewire\Admin\Color\ColorIndex;
use App\Livewire\Admin\Model\ModelIndex;
use App\Livewire\Admin\Order\OrderIndex;
use App\Livewire\Client\BrandByCategory;
use App\Livewire\Client\ColorByMaterial;
use App\Livewire\Client\MaterialByBrand;
use App\Livewire\Admin\SubCategory\SubIndex;
use App\Livewire\Admin\Category\CategoryBulk;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Material\MaterialIndex;
use App\Livewire\Admin\Category\CategoryBulkUpdate;

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
    $data = Item::paginate(4);
    return view('welcome', [
        'items' => $data
    ]);
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/orders', OrderIndex::class)->name('order.index');

    Route::get('/category', CategoryIndex::class)->name('category.index');
    Route::get('/category/bulk-upload', CategoryBulk::class);
    Route::get('/category/bulk-update', CategoryBulkUpdate::class);

    Route::get('/sub-category', SubIndex::class)->name('sub_category.index');

    Route::get('/types', TypeIndex::class)->name('type.index');

    Route::get('/material', MaterialIndex::class)->name('material.index');

    Route::get('/brands', BrandIndex::class)->name('brand.index');

    Route::get('/models', ModelIndex::class)->name('model.index');

    Route::get('/sizes', SizeIndex::class)->name('size.index');

    Route::get('/colors', ColorIndex::class)->name('color.index');

    Route::get('/items', ItemIndex::class)->name('item.index');
    Route::get('/items/bulk-upload', ImportSheet::class);

    Route::get('/nodes', NodeIndex::class)->name('node.index');

    // Client FrontStore
    Route::get('/item/sub-category/{id}', BrandByCategory::class)->name('brand-by-sub-category'); //sub_category_id
    Route::get('/item/type/{id}', BrandByType::class)->name('brand-by-type'); //type_id
    Route::get('/item/brand/{id}', MaterialByBrand::class)->name('material-by-brand'); //brand_id
    Route::get('/item/color/{id}', ColorByMaterial::class)->name('color-by-material'); //material_id
    Route::get('/item/size/{id}', SizeByColor::class)->name('size-by-color');  //color_id
    Route::get('/item/model/{id}', ModelBySize::class)->name('model-by-size'); //size_id
    Route::get('/item/{id}', ItemsByModel::class)->name('item-by-model'); //model_id

    // Shopping Cart
    Route::get('/shopping-cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/thank-you', ThankYou::class)->name('thank-you');

});
