<?php

namespace App\Orchid\Layouts\CatalogManager\Author;

use App\Models\Author;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AuthorListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'authors';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name','Nombre')
                ->cantHide()
                ->render(function (Author $author) {
                    return ucwords($author->getFullNameAttribute());
                }),

            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Author $author) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make('Editar')
                                ->route('platform.catalog-manager.authors.edit', $author->id)
                                ->icon('pencil'),

                            Button::make('Eliminar')
                                ->icon('trash')
                                ->confirm(__('¿Estas seguro?".'))
                                ->method('remove', [
                                    'id' => $author->id,
                                ]),
                        ]);
                }),
        ];
    }
}
