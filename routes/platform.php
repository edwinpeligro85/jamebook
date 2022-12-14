<?php

declare(strict_types=1);

use App\Models\Order;
use App\Orchid\Screens\CatalogManager\Author\AuthorEditScreen;
use App\Orchid\Screens\CatalogManager\Author\AuthorListScreen;
use App\Orchid\Screens\CatalogManager\Book\BookEditScreen;
use App\Orchid\Screens\CatalogManager\Book\BookListScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\New\NewListScreen;
use App\Orchid\Screens\Order\OrderDetailScreen;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Orders
Route::screen('orders', OrderListScreen::class)
    ->name('platform.orders')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Pedidos', route('platform.orders'));
    });

// Platform > Order > Detail
Route::screen('orders/{order}/detail', OrderDetailScreen::class)
    ->name('platform.orders.detail')
    ->breadcrumbs(function (Trail $trail,Order $order) {
        return $trail
            ->parent('platform.orders')
            ->push('Orden - ' . $order->reference, route('platform.orders.detail', $order));
    });

// Platform > Catalog Manager > Books
Route::screen('catalog-manager/books', BookListScreen::class)
    ->name('platform.catalog-manager.books')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Libros', route('platform.catalog-manager.books'));
    });
// Platform > Catalog Manager > Books > Create
Route::screen('catalog-manager/books/create', BookEditScreen::class)
    ->name('platform.catalog-manager.books.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.catalog-manager.books')
            ->push('Libros', route('platform.catalog-manager.books.create'));
    });
// Platform > Catalog Manager > Books > Edit
Route::screen('catalog-manager/books/{book}/edit', BookEditScreen::class)
    ->name('platform.catalog-manager.books.edit')
    ->breadcrumbs(function (Trail $trail, $book) {
        return $trail
            ->parent('platform.catalog-manager.books')
            ->push('Libro - ' . $book->title, route('platform.catalog-manager.books.edit', $book));
    });


// Platform > Catalog Manager > authors
Route::screen('catalog-manager/authors', AuthorListScreen::class)
    ->name('platform.catalog-manager.authors')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Autores', route('platform.catalog-manager.authors'));
    });
// Platform > Catalog Manager > authors > Create
Route::screen('catalog-manager/authors/create', AuthorEditScreen::class)
    ->name('platform.catalog-manager.authors.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.catalog-manager.authors')
            ->push('Autores', route('platform.catalog-manager.authors.create'));
    });
// Platform > Catalog Manager > authors > Edit
Route::screen('catalog-manager/authors/{author}/edit', AuthorEditScreen::class)
    ->name('platform.catalog-manager.authors.edit')
    ->breadcrumbs(function (Trail $trail, $author) {
        return $trail
            ->parent('platform.catalog-manager.authors')
            ->push('Autor - ' . $author->first_name, route('platform.catalog-manager.authors.edit', $author));
    });

// Platform > news
Route::screen('news', NewListScreen::class)
    ->name('platform.news')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.catalog-manager.authors')
            ->push('Noticias', route('platform.news'));
    });


// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen');
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
