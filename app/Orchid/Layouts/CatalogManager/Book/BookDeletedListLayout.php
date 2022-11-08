<?php

namespace App\Orchid\Layouts\CatalogManager\Book;

use App\Models\Book;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookDeletedListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'booksDeleted';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('isbn', 'ISBN')
                ->render(function (Book $book) {
                return ucwords($book->isbn);
                }),

            TD::make('title', 'Titulo')
                ->render(function (Book $book) {
                return ucwords($book->title);
                }),

            TD::make('price', 'Precio')
                ->render(function (Book $book) {
                return ucwords($book->price);
                }),

            TD::make('deleted_at', 'Fecha eliminación')
                ->render(function (Book $book) {
                return ucwords($book->deleted_at);
                }),

            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Book $book) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Button::make('Restaurar')
                                ->icon('trash')
                                ->confirm("¿Deseas restaurar este libro?")
                                ->method('restoreBook', [
                                    'id' => $book->slug,
                                ]),
                        ]);
                }),
        ];
    }
}
