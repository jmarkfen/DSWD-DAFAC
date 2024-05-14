<?php

namespace App\Filament\Resources\DafacResource\Pages;

use App\Enums\Gender;
use App\Filament\Resources\BirthplaceResource;
use App\Models\Birthplace;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CaptureDafac extends ListDafacs
{
    public function getBreadcrumb(): ?string
    {
        return 'Capture';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('list_mode')
                ->color('gray')
                ->url(self::getResource()::getUrl('index')),
        ];
    }

    public function table(Table $table): Table
    {
        return parent::table($table)
            ->filters([
                Tables\Filters\Filter::make('filters')
                    ->columnSpanFull()
                    ->columns(['xl' => 4])
                    ->form([
                        Forms\Components\TextInput::make('last_name'),
                        Forms\Components\TextInput::make('first_name'),
                        Forms\Components\TextInput::make('middle_name'),
                        Forms\Components\TextInput::make('name_extension'),
                        Forms\Components\DatePicker::make('birthdate')
                            ->native(false)
                            ->displayFormat('d F Y')
                            ->weekStartsOnSunday()
                            ->maxDate(now()),
                        Forms\Components\Select::make('birthplace_id')
                            ->relationship(name: 'birthplace', titleAttribute: 'name')
                            ->createOptionForm(fn (Form $form) => BirthplaceResource::form($form))
                            ->searchable()
                            ->preload(),
                        Forms\Components\Radio::make('sex')
                            ->inline()
                            ->inlineLabel(false)
                            ->options(Gender::class),
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('create')
                                ->action(function (array $state) {
                                    session()->flash('last_name', $state['last_name']);
                                    session()->flash('first_name', $state['first_name']);
                                    session()->flash('middle_name', $state['middle_name']);
                                    session()->flash('name_extension', $state['name_extension']);
                                    session()->flash('birthdate', $state['birthdate']);
                                    session()->flash('birthplace_id', $state['birthplace_id']);
                                    session()->flash('sex', $state['sex']);
                                    return redirect(self::getResource()::getUrl('create'));
                                })
                                ->disabled(fn (array $state): bool => !implode($state))
                                ->requiresConfirmation()
                                ->modalWidth(MaxWidth::Prose)
                                ->modalHeading('Create new ' . self::getResource()::getModelLabel())
                                ->modalDescription('Are you sure you want to create a new record? There are existing records that match your input.')
                                ->modalHidden(fn (self $livewire): bool => $livewire->getAllTableRecordsCount() == 0),
                        ])
                            ->columnSpanFull()
                            ->alignEnd(),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!implode($data)) return $query->whereRaw('false');
                        return $query
                            ->when($data['last_name'], fn (Builder $query, $value) => $query->where('last_name', 'like', "%$value%"))
                            ->when($data['first_name'], fn (Builder $query, $value) => $query->where('first_name', 'like', "%$value%"))
                            ->when($data['middle_name'], fn (Builder $query, $value) => $query->where('middle_name', 'like', "%$value%"))
                            ->when($data['name_extension'], fn (Builder $query, $value) => $query->where('name_extension', 'like', "%$value%"))
                            ->when($data['birthdate'], fn (Builder $query, $value) => $query->whereDate('birthdate', Carbon::parse($value)->toDateString()))
                            ->when($data['birthplace_id'], fn (Builder $query, $value) => $query->where('birthplace_id', $value))
                            ->when($data['sex'], fn (Builder $query, $value) => $query->where('sex', $value));
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['last_name']) {
                            $indicators[] = Indicator::make('Last name: ' . $data['last_name'])
                                ->removeField('last_name');
                        }
                        if ($data['first_name']) {
                            $indicators[] = Indicator::make('First name: ' . $data['first_name'])
                                ->removeField('first_name');
                        }
                        if ($data['middle_name']) {
                            $indicators[] = Indicator::make('Middle name: ' . $data['middle_name'])
                                ->removeField('middle_name');
                        }
                        if ($data['name_extension']) {
                            $indicators[] = Indicator::make('Name ext.: ' . $data['name_extension'])
                                ->removeField('name_extension');
                        }
                        if ($data['birthdate']) {
                            $indicators[] = Indicator::make('Birthdate: ' . Carbon::parse($data['birthdate'])->format('d F Y'))
                                ->removeField('birthdate');
                        }
                        if ($data['birthplace_id']) {
                            $indicators[] = Indicator::make('Birthplace: ' . Birthplace::find($data['birthplace_id'])->name)
                                ->removeField('birthplace_id');
                        }
                        if ($data['sex']) {
                            $indicators[] = Indicator::make('Sex: ' . $data['sex'])
                                ->removeField('sex');
                        }
                        return $indicators;
                    })
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent);
    }
}
