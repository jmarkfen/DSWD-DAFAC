<?php

namespace App\Filament\Resources\EthnicityTypeResource\Pages;

use App\Filament\Resources\EthnicityTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEthnicityType extends ViewRecord
{
    protected static string $resource = EthnicityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
