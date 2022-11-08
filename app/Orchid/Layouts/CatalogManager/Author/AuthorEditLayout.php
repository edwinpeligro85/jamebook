<?php

namespace App\Orchid\Layouts\CatalogManager\Author;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class AuthorEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Group::make([
                Input::make('author.first_name')
                    ->title('Nombre:')
                    ->type('text')
                    ->required()
                    ->max(255),
    
                Input::make('author.last_name')
                    ->title('Apellido:')
                    ->type('text')
                    ->required()
                    ->max(255),
            ])
        ];
    }
}
