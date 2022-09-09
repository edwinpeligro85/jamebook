<?php

namespace App\Orchid\Layouts\CatalogManager\Book;

use App\Models\Book;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'books';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('isbn', 'ISBN'),

            TD::make('title', 'Titulo'),

            TD::make('price', 'Precio'),

            TD::make('stock', 'Stock'),

            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Book $book) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make('Editar')
                                ->route('platform.catalog-manager.books.edit', $book->id)
                                ->icon('pencil'),

                            Button::make('Eliminar')
                                ->icon('trash')
                                ->confirm(__('Una vez que elimine el libro pasará a una categoría de “histórico” agotado.'))
                                ->method('remove', [
                                    'id' => $book->id,
                                ]),
                        ]);
                }),
            // TD::make('created_at')->sort(),
        ];
    }
}
