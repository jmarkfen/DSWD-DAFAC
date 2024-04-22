<?php

namespace App\Filament\Resources\DafacResource\Pages;

use App\Filament\Resources\DafacResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDafac extends ViewRecord
{
    protected static string $resource = DafacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
