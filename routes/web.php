<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CashierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Client\CienltController;
use App\Http\Controllers\Pos\BillController;
use App\Http\Controllers\Pos\OrderController;
use App\Http\Controllers\Pos\PosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/404', function () {
    return view('errors.404');
});
Route::get('/500', function () {
    return view('errors.500');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('auth.admin')->name('admin.')->group(function () {
    Route::resource('product_category', ProductCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::post('product/slug', [ProductController::class, 'createSlug'])->name('product.create.slug');
    Route::post('product/ckeditor-upload-image', [ProductController::class, 'createCkeditupload'])->name('product.ckedit.upload.image');
    Route::get('product/{product}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('cashier', CashierController::class);
    Route::get('cashier/{cashier}/restore', [CashierController::class, 'restore'])->name('cashier.restore');
    Route::resource('table', TableController::class);
    Route::get('table/{table}/table', [TableController::class, 'restore'])->name('table.restore');
    Route::get('saleslist', [DashboardController::class, 'saleslist'])->name('saleslist');
    Route::get('salesdetail/{salesid}', [DashboardController::class, 'salesdetail'])->name('salesdetail');
    Route::get('review', [DashboardController::class, 'review'])->name('review');
});

Route::prefix('cashier')->middleware('auth.cashier')->name('cashier.')->group(function () {
    Route::get('/', [PosController::class, 'index'])->name('index');
    Route::get('/listbills', [PosController::class, 'listBills'])->name('listbills');
    Route::get('/confirmbill/{order_id}', [PosController::class, 'confirmbill'])->name('confirmbill');

    Route::get('/printbill/{order_id}', [PosController::class, 'printbill'])->name('printbill');
    Route::get('/success/{order_id}', [PosController::class, 'success'])->name('successbill');
    Route::get('/cancel/{order_id}', [PosController::class, 'cancel'])->name('cancelbill');

    Route::get('/maptable', [PosController::class, 'maptable'])->name('maptable');
    Route::get('/pos', [PosController::class, 'pos'])->name('pos');
    Route::post('placeorder',[OrderController::class, 'placeOrder'])->name('place-order');
});


Route::get('/table/{table}', [CienltController::class, 'qrcode'])->name('home.qrcode');
Route::get('/', [CienltController::class, 'welcome'])->name('home.welcome');
Route::get('/home', [CienltController::class, 'home'])->name('home');
Route::get('/menu', [CienltController::class, 'menu'])->name('home.menu');



require __DIR__ . '/auth.php';





