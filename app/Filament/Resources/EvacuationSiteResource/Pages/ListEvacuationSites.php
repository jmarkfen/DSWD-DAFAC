<?php

namespace App\Filament\Resources\EvacuationSiteResource\Pages;

use App\Filament\Resources\EvacuationSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvacuationSites extends ListRecords
{
    protected static string $resource = EvacuationSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
