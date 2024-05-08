<?php

namespace App\Filament\Resources\EvacuationSiteResource\Pages;

use App\Filament\Resources\EvacuationSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvacuationSite extends EditRecord
{
    protected static string $resource = EvacuationSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
