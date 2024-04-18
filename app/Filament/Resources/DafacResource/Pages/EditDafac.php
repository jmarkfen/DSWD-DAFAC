<?php

namespace App\Filament\Resources\DafacResource\Pages;

use App\Filament\Resources\DafacResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDafac extends EditRecord
{
    protected static string $resource = DafacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
