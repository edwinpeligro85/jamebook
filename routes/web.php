<?php

use App\Http\Livewire\Ecommerce\Home\Index as HomeIndex;
use App\Http\Livewire\Ecommerce\Shop\Index as ShopIndex;
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

Route::get('/shop', ShopIndex::class)->name('shop.index');
    // ->breadcrumbs(fn (Trail $trail) =>
    //     $trail->parent('home')->push('Shop', 'shop.index'));