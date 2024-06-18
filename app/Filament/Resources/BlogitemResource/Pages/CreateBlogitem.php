<?php

namespace App\Filament\Resources\BlogitemResource\Pages;

use App\Filament\Resources\BlogitemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogitem extends CreateRecord
{
    protected static string $resource = BlogitemResource::class;
}
