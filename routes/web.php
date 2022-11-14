<?php

use App\Http\Livewire\Ecommerce\Auth\Index as AuthIndex;
use App\Http\Livewire\Ecommerce\Home\Index as HomeIndex;
use App\Http\Livewire\Ecommerce\MyAccount\Index as MyAccountIndex;
use App\Http\Livewire\Ecommerce\Order\Complete as OrderComplete;
use App\Http\Livewire\Ecommerce\Shop\Index as ShopIndex;
use App\Http\Livewire\Ecommerce\Shop\BookDetail\Index as BookDetailIndex;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeIndex::class)->name('home')
    ->breadcrumbs(fn (Trail $trail) => $trail->push('Home', 'home'));

Route::get('/auth/login-register', AuthIndex::class)
    ->name('auth.login-register')
    ->breadcrumbs(
        fn (Trail $trail) =>
        $trail->parent('home')->push(_('Login or Register'), 'auth.login-register')
    );

Route::get('/my-account', MyAccountIndex::class)
    ->middleware('auth')
    ->name('my-account.index')
    ->breadcrumbs(
        fn (Trail $trail) =>
        $trail->parent('home')->push(_('My Account'), 'my-account.index')
    );

Route::get('/shop', ShopIndex::class)->name('shop.index')
    ->breadcrumbs(fn (Trail $trail) =>
    $trail->parent('home')->push('Shop', 'shop.index'));

Route::get('/shop/{book}', BookDetailIndex::class)
    ->name('shop.show-book')
    ->breadcrumbs(
        fn (Trail $trail, Book $book) =>
        $trail->parent('home')
            ->push(_('Book Detail') . ' - ' . $book->title, route('shop.show-book', $book->slug))
    );

Route::get('/order-complete/{order}', OrderComplete::class)
    ->name('order.complete')
    ->breadcrumbs(
        fn (Trail $trail, Order $order) =>
        $trail->parent('home')->push(_('Order Complete'), route('order.complete', $order->id))
    );
