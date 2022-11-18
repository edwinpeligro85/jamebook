<?php

namespace App\Orchid\Layouts\CatalogManager\Book;

use App\Models\Book;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
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

            TD::make('picture_id', 'Imagen')
                ->render(function (Book $book) {
                    $path = $book->getPictureUrlAttribute();
                    return view('platform.catalog-manager.book.picture-book-table',compact('path'));
                }),

            TD::make('isbn', 'ISBN')
                ->filter(Input::make())
                ->render(function (Book $book) {
                return ucwords($book->isbn);
                }),

            TD::make('title', 'Titulo')
                ->filter(Input::make())
                ->render(function (Book $book) {
                return ucwords($book->title);
                }),

            TD::make('price', 'Precio')
                ->render(function (Book $book) {
                return number_format($book->price,2);
                }),

            TD::make('stock', 'Stock')
                ->render(function (Book $book) {
                return ucwords($book->stock);
                }),

            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Book $book) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make('Editar')
                                ->route('platform.catalog-manager.books.edit', $book->slug)
                                ->icon('pencil'),

                            Button::make('Eliminar')
                                ->icon('trash')
                                ->confirm(__('Una vez que elimine el libro pasará a una categoría de “histórico agotado".'))
                                ->method('deleteBook', [
                                    'id' => $book->slug,
                                ]),
                        ]);
                }),
        ];
    }
}
