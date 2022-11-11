<?php

namespace App\Orchid\Layouts\Order;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class OrderDetailLayout extends Rows
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
    public function fields(): iterable
    {
        return [
            Group::make([
                Input::make('order.reference')
                    ->title('Titulo:')
                    ->type('text')
                    ->horizontal()
                    ->max(255),
    
                Input::make('order.reference')
                    ->title('Titulo:')
                    ->type('text')
                    ->horizontal()
                    ->max(255),

                Input::make('order.reference')
                    ->title('Titulo:')
                    ->type('text')
                    ->horizontal()
                    ->max(255),
                    
                ])

        ];
    }
}
