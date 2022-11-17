<?php

namespace App\Orchid\Layouts\New;

use App\Models\Book;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class NewListLayout extends Table
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
                    return view('platform.catalog-manager.book.picture-new-book-table',compact('path'));
                }),
                
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
                return number_format($book->price,0);
                }),
        ];
    }
}
