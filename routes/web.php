<?php

use App\Models\Item;

use App\Livewire\AboutUs;
use App\Livewire\Checkout;

use App\Livewire\ShoppingCart;

use App\Livewire\Client\ItemByType;
use App\Livewire\Client\SingleItem;
use App\Livewire\Client\BrandByType;
use App\Livewire\Client\ItemByColor;
use App\Livewire\Client\ItemsByModel;

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Item\ItemIndex;
use App\Livewire\Admin\Node\NodeIndex;

use App\Livewire\Admin\Order\ThankYou;
use App\Livewire\Admin\Size\SizeIndex;
use App\Livewire\Admin\Type\TypeIndex;
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
use App\Livewire\Admin\Variants\BrandIndex;
use App\Livewire\Admin\Variants\ColorIndex;
use App\Livewire\Admin\SubCategory\SubIndex;
use App\Livewire\Admin\Category\CategoryBulk;
use App\Livewire\Admin\Model\ModelBulkDelete;
use App\Livewire\Admin\Model\ModelBulkUpdate;
use App\Livewire\Admin\Model\ModelBulkUpload;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Variants\MaterialIndex;
use App\Livewire\Admin\Category\CategoryBulkDelete;
use App\Livewire\Admin\Category\CategoryBulkUpdate;
use App\Livewire\Admin\SubCategory\SubCategoryBulkDelete;
use App\Livewire\Admin\SubCategory\SubCategoryBulkUpdate;
use App\Livewire\Admin\SubCategory\SubCategoryBulkUpload;
use App\Livewire\CancellationRefund;
use App\Livewire\ContactUs;
use App\Livewire\PrivacyPolicy;
use App\Livewire\ReturnPolicy;
use App\Livewire\TermsCondition;

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

Route::get('/about-us', AboutUs::class)->name('about');
Route::get('/cancellation-and-refund', CancellationRefund::class)->name('cancellation-refund');
Route::get('/contact-us', ContactUs::class)->name('contact-us');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('/return-policy', ReturnPolicy::class)->name('return-policy');
Route::get('/terms-and-condition', TermsCondition::class)->name('terms-and-condition');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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

    Route::get('/items/all', ItemIndex::class)->name('item.index');
    Route::get('/items/bulk-upload', ItemBulkUpload::class);
    Route::get('/items/bulk-update', ItemBulkUpdate::class);
    Route::get('/items/bulk-delete', ItemBulkDelete::class);

    Route::get('/nodes/all', NodeIndex::class)->name('node.index');

    Route::get('/sizes/all', SizeIndex::class)->name('size.index');
    Route::get('/sizes/bulk-upload', SizeBulkUpload::class);
    Route::get('/sizes/bulk-update', SizeBulkUpdate::class);
    Route::get('/sizes/bulk-delete', SizeBulkDelete::class);

    Route::get('/models/all', ModelIndex::class)->name('model.index');
    Route::get('/models/bulk-upload', ModelBulkUpload::class);
    Route::get('/models/bulk-update', ModelBulkUpdate::class);
    Route::get('/models/bulk-delete', ModelBulkDelete::class);

    // Variants
    Route::get('/brands/all', BrandIndex::class)->name('brand.index');
    Route::get('/materials/all', MaterialIndex::class)->name('material.index');
    Route::get('/colors/all', ColorIndex::class)->name('color.index');

    // Shopping Cart
    Route::get('/shopping-cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/thank-you', ThankYou::class)->name('thank-you');
});

// Client FrontStore
Route::get('/{type?}', ItemByType::class)->name('itemListByType');
Route::get('/single/{slug?}', SingleItem::class)->name('singleItem');

Route::name('item-')->group(function () {
    Route::get('/sub-category/{id?}', BrandByCategory::class)->name('brand-by-sub-category');
    Route::get('/i/{type?}', BrandByType::class)->name('brands');
    Route::get('/i/{type?}/{brand?}', MaterialByBrand::class)->name('materials');
    Route::get('/i/{type?}/{brand?}/{material?}', ColorByMaterial::class)->name('colors');
    Route::get('/i/{type?}/{brand?}/{material?}/{color?}', ItemByColor::class)->name('by-color');
});
