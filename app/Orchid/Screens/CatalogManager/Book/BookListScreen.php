<?php

namespace App\Orchid\Screens\CatalogManager\Book;

use App\Models\Book;
use App\Orchid\Layouts\CatalogManager\Book\BookDeletedListLayout;
use App\Orchid\Layouts\CatalogManager\Book\BookListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'books' => Book::filters()->paginate(),
            'booksDeleted' => Book::filters()->onlyTrashed()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Libros';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Todos los libros registrados';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Agregar')
                ->icon('plus')
                ->route('platform.catalog-manager.books.create'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'Activos' => BookListLayout::class,
                'Historico eliminados' => BookDeletedListLayout::class
            ])
            
        ];
    }

    public function deleteBook(Book $book)
    {
        $book->delete();
        Toast::info('El libro fue eliminado.');

        return redirect()->route('platform.catalog-manager.books');
    }

    public function restoreBook($slug)
    {
        Book::withTrashed()->where('slug',$slug)->restore();
        Toast::info('El libro fue restaurado.');

        return redirect()->route('platform.catalog-manager.books');
    }
}
