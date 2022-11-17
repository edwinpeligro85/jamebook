<?php

namespace App\Orchid\Screens\New;

use App\Models\Book;
use App\Orchid\Layouts\New\NewListLayout;
use Orchid\Screen\Screen;

class NewListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'books' => Book::whereDate('created_at','>=',now()->subDays(3))->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Noticias';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            NewListLayout::class
        ];
    }
}
