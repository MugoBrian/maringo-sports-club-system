<?php

use App\Http\Controllers\ListOfItemsController;
use App\Http\Controllers\LostItemsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SportEventsController;
use App\Http\Controllers\StockItemController;
use App\Http\Controllers\UserController;
use App\Models\LostItem;
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

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth');





Route::group(
    [
        'prefix' => '/user',
    ],
    function () {
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::post('/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
    }
);

// Members

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => '/members',
    ],
    function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::get('/register', [MemberController::class, 'create'])->name('members.create');
        Route::post('', [MemberController::class, 'store'])->name('members.store');
        Route::get('/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::put('/{member}/update', [MemberController::class, 'update'])->name('members.update');
        Route::delete('/{member}/delete', [MemberController::class, 'destroy'])->name('members.destroy');
    }
);

// Store

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => '/store',
    ],
    function () {
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/listofitems'
            ],
            function () {
                Route::get('/', [ListOfItemsController::class, 'index'])->name('store.listofitems.index');
                Route::get('/create', [ListOfItemsController::class, 'create'])->name('store.listofitems.create');
                Route::post('', [ListOfItemsController::class, 'store'])->name('store.listofitems.store');
                Route::get('/{sportingitem}/edit', [ListOfItemsController::class, 'edit'])->name('store.listofitems.edit');
                Route::put('/{sportingitem}/update', [ListOfItemsController::class, 'update'])->name('store.listofitems.update');
                Route::delete('/{sportingitem}/delete', [ListOfItemsController::class, 'destroy'])->name('store.listofitems.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/stockitems'
            ],
            function () {
                Route::get('/', [StockItemController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [StockItemController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [StockItemController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{sportingitem}/edit', [StockItemController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{sportingitem}/update', [StockItemController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{sportingitem}/delete', [StockItemController::class, 'destroy'])->name('members.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/orders'
            ],
            function () {
                Route::get('/', [OrdersController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [OrdersItemController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [OrdersController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{order}/edit', [OrdersController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{order}/update', [OrdersController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{order}/delete', [OrdersController::class, 'destroy'])->name('members.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/lostitems'
            ],
            function () {
                Route::get('/', [LostItemsController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [LostItemsController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [LostItemsController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{lostitem}/edit', [LostItemsController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{lostitem}/update', [LostItemsItemController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{lostitem}/delete', [LostItemsController::class, 'destroy'])->name('members.destroy');
            },
        );
    }
);

// Event

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => '/events',
    ],
    function () {

        Route::get('/', [SportEventsController::class, 'index'])->name('events.index');
        Route::get('/register', [SportEventsController::class, 'create'])->name('events.create');
        Route::post('', [SportEventsController::class, 'store'])->name('events.store');
        Route::get('/{sportsevent}/edit', [SportEventsController::class, 'edit'])->name('events.edit');
        Route::put('/{sportsevent}/update', [SportEventsController::class, 'update'])->name('events.update');
        Route::delete('/{sportsevent}/delete', [SportEventsController::class, 'destroy'])->name('events.destroy');
    }
);

// Sports

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => '/sports',
    ],
    function () {
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/activities'
            ],
            function () {
                Route::get('/', [ListOfItemsController::class, 'index'])->name('sports.activities.index');
                Route::get('/create', [ListOfItemsController::class, 'create'])->name('sports.activities.create');
                Route::post('', [ListOfItemsController::class, 'store'])->name('sports.activities.store');
                Route::get('/{sportingitem}/edit', [ListOfItemsController::class, 'edit'])->name('sports.activities.edit');
                Route::put('/{sportingitem}/update', [ListOfItemsController::class, 'update'])->name('sports.activities.update');
                Route::delete('/{sportingitem}/delete', [ListOfItemsController::class, 'destroy'])->name('sports.activities.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/patron'
            ],
            function () {
                Route::get('/', [StockItemController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [StockItemController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [StockItemController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{sportingitem}/edit', [StockItemController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{sportingitem}/update', [StockItemController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{sportingitem}/delete', [StockItemController::class, 'destroy'])->name('members.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/captain'
            ],
            function () {
                Route::get('/', [StockItemController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [StockItemController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [StockItemController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{sportingitem}/edit', [StockItemController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{sportingitem}/update', [StockItemController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{sportingitem}/delete', [StockItemController::class, 'destroy'])->name('members.destroy');
            },
        );
        Route::group(
            [
                'middleware' => ['auth'],
                'prefix' => '/teams'
            ],
            function () {
                Route::get('/', [StockItemController::class, 'index'])->name('store.stockitems.index');
                Route::get('/register', [StockItemController::class, 'create'])->name('store.stockitems.create');
                Route::post('', [StockItemController::class, 'store'])->name('store.stockitems.store');
                Route::get('/{sportingitem}/edit', [StockItemController::class, 'edit'])->name('store.stockitems.edit');
                Route::put('/{sportingitem}/update', [StockItemController::class, 'update'])->name('store.stockitems.update');
                Route::delete('/{sportingitem}/delete', [StockItemController::class, 'destroy'])->name('members.destroy');
            },
        );
    }
);
