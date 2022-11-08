<?php

namespace App\Orchid\Screens\CatalogManager\Author;

use App\Models\Author;
use App\Orchid\Layouts\CatalogManager\Author\AuthorListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class AuthorListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {   
        return [
            'authors' => Author::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Autor';
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
                ->route('platform.catalog-manager.authors.create'),
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
            AuthorListLayout::class
        ];
    }
}
