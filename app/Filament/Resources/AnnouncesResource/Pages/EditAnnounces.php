<?php

namespace App\Filament\Resources\AnnouncesResource\Pages;

use App\Filament\Resources\AnnouncesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnounces extends EditRecord
{
    protected static string $resource = AnnouncesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
