<?php

use App\Http\Controllers\FrontStoreController;
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
use App\Livewire\Admin\Brand\BulkDelete;
use App\Livewire\Admin\Color\ColorIndex;
use App\Livewire\Admin\Model\ModelIndex;
use App\Livewire\Admin\Order\OrderIndex;
use App\Livewire\Client\BrandByCategory;
use App\Livewire\Client\ColorByMaterial;
use App\Livewire\Client\MaterialByBrand;
use App\Livewire\Admin\Item\ItemBulkDelete;
use App\Livewire\Admin\Item\ItemBulkUpdate;
use App\Livewire\Admin\Item\ItemBulkUpload;
use App\Livewire\Admin\Size\SizeBulkDelete;
use App\Livewire\Admin\Size\SizeBulkUpdate;
use App\Livewire\Admin\Size\SizeBulkUpload;
use App\Livewire\Admin\Type\TypeBulkDelete;
use App\Livewire\Admin\Type\TypeBulkUpdate;
use App\Livewire\Admin\Type\TypeBulkUpload;
use App\Livewire\Admin\SubCategory\SubIndex;
use App\Livewire\Admin\Brand\BrandBulkUpdate;
use App\Livewire\Admin\Brand\BrandBulkUpload;
use App\Livewire\Admin\Category\CategoryBulk;
use App\Livewire\Admin\Color\ColorBulkDelete;
use App\Livewire\Admin\Color\ColorBulkUpdate;
use App\Livewire\Admin\Color\ColorBulkUpload;
use App\Livewire\Admin\Model\ModelBulkDelete;
use App\Livewire\Admin\Model\ModelBulkUpdate;
use App\Livewire\Admin\Model\ModelBulkUpload;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Material\MaterialIndex;
use App\Livewire\Admin\Category\CategoryBulkDelete;
use App\Livewire\Admin\Category\CategoryBulkUpdate;
use App\Livewire\Admin\Material\MaterialBulkDelete;
use App\Livewire\Admin\Material\MaterialBulkUpdate;
use App\Livewire\Admin\Material\MaterialBulkUpload;
use App\Livewire\Admin\SubCategory\SubCategoryBulkDelete;
use App\Livewire\Admin\SubCategory\SubCategoryBulkUpdate;
use App\Livewire\Admin\SubCategory\SubCategoryBulkUpload;

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
])->prefix('admin')->group(function () {
    Route::get('/orders', OrderIndex::class)->name('order.index');

    Route::get('/categories/all', CategoryIndex::class)->name('category.index');
    Route::get('/category/bulk-upload', CategoryBulk::class);
    Route::get('/category/bulk-update', CategoryBulkUpdate::class);
    Route::get('/category/bulk-delete', CategoryBulkDelete::class);

    Route::get('/sub-category/all', SubIndex::class)->name('sub_category.index');
    Route::get('/sub-category/bulk-upload', SubCategoryBulkUpload::class);
    Route::get('/sub-category/bulk-update', SubCategoryBulkUpdate::class);
    Route::get('/sub-category/bulk-delete', SubCategoryBulkDelete::class);

    Route::get('/types/all', TypeIndex::class)->name('type.index');
    Route::get('/types/bulk-upload', TypeBulkUpload::class);
    Route::get('/types/bulk-update', TypeBulkUpdate::class);
    Route::get('/types/bulk-delete', TypeBulkDelete::class);

    Route::get('/brands/all', BrandIndex::class)->name('brand.index');
    Route::get('/brands/bulk-upload', BrandBulkUpload::class);
    Route::get('/brands/bulk-update', BrandBulkUpdate::class);
    Route::get('/brands/bulk-delete', BulkDelete::class);

    Route::get('/materials/all', MaterialIndex::class)->name('material.index');
    Route::get('/material/bulk-upload', MaterialBulkUpload::class);
    Route::get('/material/bulk-update', MaterialBulkUpdate::class);
    Route::get('/material/bulk-delete', MaterialBulkDelete::class);

    Route::get('/colors/all', ColorIndex::class)->name('color.index');
    Route::get('/colors/bulk-upload', ColorBulkUpload::class);
    Route::get('/colors/bulk-update', ColorBulkUpdate::class);
    Route::get('/colors/bulk-delete', ColorBulkDelete::class);

    Route::get('/sizes/all', SizeIndex::class)->name('size.index');
    Route::get('/sizes/bulk-upload', SizeBulkUpload::class);
    Route::get('/sizes/bulk-update', SizeBulkUpdate::class);
    Route::get('/sizes/bulk-delete', SizeBulkDelete::class);

    Route::get('/models/all', ModelIndex::class)->name('model.index');
    Route::get('/models/bulk-upload', ModelBulkUpload::class);
    Route::get('/models/bulk-update', ModelBulkUpdate::class);
    Route::get('/models/bulk-delete', ModelBulkDelete::class);

    Route::get('/items/all', ItemIndex::class)->name('item.index');
    Route::get('/items/bulk-upload', ItemBulkUpload::class);
    Route::get('/items/bulk-update', ItemBulkUpdate::class);
    Route::get('/items/bulk-delete', ItemBulkDelete::class);

    Route::get('/nodes/all', NodeIndex::class)->name('node.index');

    // Shopping Cart
    Route::get('/shopping-cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/thank-you', ThankYou::class)->name('thank-you');
});


// Client FrontStore



Route::get('{type}', [FrontStoreController::class, 'brandsByType'])->name('brand-by-type');
