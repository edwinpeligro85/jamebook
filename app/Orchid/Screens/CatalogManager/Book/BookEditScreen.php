<?php

namespace App\Orchid\Screens\CatalogManager\Book;

use App\Models\Book;
use App\Orchid\Layouts\CatalogManager\Book\BookEditLayout;
use Illuminate\Http\Request;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class BookEditScreen extends Screen
{
    public Book $book;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Book $book): iterable
    {
        return [
            'book' => $book,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->book->exists ? 'Editar libro' : 'Crear libro';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Guardar')
                ->icon('check')
                ->method('save'),
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
            BookEditLayout::class,
        ];
    }

    /**
     * @param Book    $book
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Book $book, Request $request)
    {
        if ($request->picture_id) {
            $book->picture ? $book->picture->delete() : null;
            $book->picture_id = $request->picture_id;
        }
        $book->fill($request->get('book'));
        $book->save();

        Toast::info('El libro fue guardado.');

        return redirect()->route('platform.catalog-manager.books');
    }

    /**
     * @param Book $book
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function remove(Book $book)
    {
        $book->delete();

        Toast::info('El libro fue eliminado');

        return redirect()->route('platform.catalog-manager.books');
    }
}
