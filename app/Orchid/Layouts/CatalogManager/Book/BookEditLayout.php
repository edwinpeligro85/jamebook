<?php

namespace App\Orchid\Layouts\CatalogManager\Book;

use App\Models\Author;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Language;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class BookEditLayout extends Rows
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
            Picture::make('picture_id')
                ->targetId(),
            
            Input::make('book.stock')
                ->title('Inventario:')
                ->type('number')
                ->horizontal()
                ->required()
                ->min(0),

            Input::make('book.isbn')
                ->type('number')
                ->title('ISBN:')
                ->horizontal()
                ->required()
                ->max(99999999999999999999),

            Input::make('book.title')
                ->title('Titulo:')
                ->type('text')
                ->horizontal()
                ->required()
                ->max(255),

            Relation::make('book.author_id')
                ->fromModel(Author::class, 'first_name')
                ->displayAppend('full_name')
                ->title('Autor:')
                ->horizontal(),

            Input::make('book.year')
                ->type('number')
                ->title('Año:')
                ->horizontal(),

            Relation::make('book.category_id')
                ->fromModel(Category::class, 'name')
                ->title('Genero:')
                ->horizontal(),

            Input::make('book.pages')
                ->type('number')
                ->title('Número de paginas:')
                ->horizontal(),

            Relation::make('book.editorial_id')
                ->fromModel(Editorial::class, 'name')
                ->title('Editorial:')
                ->horizontal(),

            Relation::make('book.language_id')
                ->fromModel(Language::class, 'name')
                ->title('Idioma:')
                ->horizontal(),

            Input::make('book.publication_date')
                ->title('Fecha de publicación:')
                ->type('date')
                ->horizontal(),

            Select::make('book.condition')
                ->options([
                    'new'    => 'Nuevo',
                    'useded' => 'Usado',
                ])
                ->title('Condición:')
                ->horizontal(),


            Input::make('book.price')
                ->title('Precio:')
                ->type('number')
                ->required()
                ->mask([
                    'alias' => 'currency',
                ])->horizontal(),
        ];
    }
}
