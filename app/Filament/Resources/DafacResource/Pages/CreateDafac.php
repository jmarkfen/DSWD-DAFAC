<?php

namespace App\Filament\Resources\DafacResource\Pages;

use App\Filament\Resources\DafacResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDafac extends CreateRecord
{
    protected static string $resource = DafacResource::class;

    protected function afterFill(): void
    {
        $this->data['first_name'] = session('first_name');
        $this->data['last_name'] = session('last_name');
        $this->data['middle_name'] = session('middle_name');
        $this->data['name_extension'] = session('name_extension');
        $this->data['birthdate'] = session('birthdate');
        $this->data['birthplace'] = session('birthplace');
        $this->data['sex'] = session('sex');
    }
}
