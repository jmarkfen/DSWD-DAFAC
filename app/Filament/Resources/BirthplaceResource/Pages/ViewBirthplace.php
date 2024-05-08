<?php

namespace App\Filament\Resources\BirthplaceResource\Pages;

use App\Filament\Resources\BirthplaceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBirthplace extends ViewRecord
{
    protected static string $resource = BirthplaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
