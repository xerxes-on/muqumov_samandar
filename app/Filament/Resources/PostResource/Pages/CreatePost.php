<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Filament::auth()->user()->id;
        return $data;
    }
}
