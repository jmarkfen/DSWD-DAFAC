<?php

namespace App\Filament\Resources\BirthplaceResource\Pages;

use App\Filament\Resources\BirthplaceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBirthplace extends EditRecord
{
    protected static string $resource = BirthplaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
