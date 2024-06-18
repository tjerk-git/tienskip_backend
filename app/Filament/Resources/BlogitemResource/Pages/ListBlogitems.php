<?php

namespace App\Filament\Resources\BlogitemResource\Pages;

use App\Filament\Resources\BlogitemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogitems extends ListRecords
{
    protected static string $resource = BlogitemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
