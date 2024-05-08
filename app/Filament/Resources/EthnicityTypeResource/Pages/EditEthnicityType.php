<?php

namespace App\Filament\Resources\EthnicityTypeResource\Pages;

use App\Filament\Resources\EthnicityTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEthnicityType extends EditRecord
{
    protected static string $resource = EthnicityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
