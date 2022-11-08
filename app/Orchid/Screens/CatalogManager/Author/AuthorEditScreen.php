<?php

namespace App\Orchid\Screens\CatalogManager\Author;

use App\Models\Author;
use App\Orchid\Layouts\CatalogManager\Author\AuthorEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class AuthorEditScreen extends Screen
{
    public $author;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Author $author): iterable
    {
        return [
            'author' => $author
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->author->exists ? 'Editar autor' : 'Crear autor';
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
            AuthorEditLayout::class
        ];
    }

    public function save(Author $author,Request $request)
    {
        $request->validate([
            'author.first_name' => 'required',
            'author.last_name' => 'required'
        ]);
        
        $author->fill($request->get('author'))->save();
        
        Toast::success('El autor fue guardado.');

        return redirect()->route('platform.catalog-manager.authors');
    }
}
