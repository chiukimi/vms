<?php

namespace App\Filament\Resources\AnnouncesResource\Pages;

use App\Filament\Resources\AnnouncesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnounces extends CreateRecord
{
    protected static string $resource = AnnouncesResource::class;
}
