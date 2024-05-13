<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Enums\HouseOwnershipType;
use App\Enums\HousingCondition;
use App\Filament\Resources\DafacResource\Pages;
use App\Filament\Resources\DafacResource\RelationManagers;
use App\Models\Birthplace;
use App\Models\Dafac;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DafacResource extends Resource
{
    protected static ?string $model = Dafac::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Disaster Assistance Family Access Card (DAFAC)';

    protected static ?string $pluralModelLabel = 'Disaster Assistance Family Access Cards (DAFAC)';

    protected static ?string $navigationLabel = 'Family Access Cards';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('serial_number'),
                Forms\Components\Select::make('barangay_id')
                    ->relationship(name: 'barangay', titleAttribute: 'name')
                    ->createOptionForm(fn (Form $form) => BarangayResource::form($form))
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('evacuation_site_id')
                    ->relationship(name: 'evacuation_site', titleAttribute: 'name')
                    ->createOptionForm(fn (Form $form) => EvacuationSiteResource::form($form))
                    ->searchable()
                    ->preload(),
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
                Forms\Components\TextInput::make('mother_maiden_name'),
                Forms\Components\Select::make('occupation_id')
                    ->relationship(name: 'occupation', titleAttribute: 'name')
                    ->createOptionForm(fn (Form $form) => OccupationResource::form($form))
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('monthly_family_net_income'),
                Forms\Components\Select::make('id_card_type_id')
                    ->label('ID card presented')
                    ->relationship(name: 'id_card_type', titleAttribute: 'name')
                    ->createOptionForm(fn (Form $form) => IdCardTypeResource::form($form))
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('id_card_number')
                    ->label('ID card number'),
                Forms\Components\TextInput::make('contact_number'),
                Forms\Components\TextInput::make('permanent_address'),
                Forms\Components\Checkbox::make('is_4ps_beneficiary')
                    ->label('4Ps beneficiary'),
                Forms\Components\Checkbox::make('is_ip')
                    ->label('IP (Indigenous Peoples)')
                    ->live(),
                Forms\Components\Select::make('ethnicity_type_id')
                    ->label('Type of ethnicity')
                    ->relationship(name: 'ethnicity_type', titleAttribute: 'name')
                    ->createOptionForm(fn (Form $form) => EthnicityTypeResource::form($form))
                    ->searchable()
                    ->preload()
                    ->visible(fn (Forms\Get $get): bool => $get('is_ip')),
                Forms\Components\TextInput::make('older_persons_count')
                    ->label('No. of older persons'),
                Forms\Components\TextInput::make('pregnant_and_lactating_mothers_count')
                    ->label('No. of pregnant and lactating mothers'),
                Forms\Components\TextInput::make('pwd_and_with_medical_conditions_count')
                    ->label('No. of PWDs & with medical conditions'),
                Forms\Components\Radio::make('house_ownership')
                    ->inline()
                    ->inlineLabel(false)
                    ->options(HouseOwnershipType::class),
                Forms\Components\Radio::make('housing_condition')
                    ->inline()
                    ->inlineLabel(false)
                    ->options(HousingCondition::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial_number')
                    ->label('Serial #')
                    ->searchable(),
                Tables\Columns\TextColumn::make('barangay.name')
                    ->label('Barangay')
                    ->sortable(),
                Tables\Columns\TextColumn::make('evacuation_site.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_extension')
                    ->label('Name ext.')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date('d F Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthplace.name')
                    ->label('Birthplace')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_maiden_name')
                    ->label('Mother')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation.name')
                    ->label('Occupation')
                    ->sortable(),
                Tables\Columns\TextColumn::make('monthly_family_net_income')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_card_type.name')
                    ->label('ID type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_card_number')
                    ->label('ID #')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permanent_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_4ps_beneficiary')
                    ->label('4Ps')
                    ->searchable()
                    ->formatStateUsing(fn (string $state) => $state ? 'Yes' : 'No'),
                Tables\Columns\TextColumn::make('is_ip')
                    ->label('IP')
                    ->searchable()
                    ->formatStateUsing(fn (string $state) => $state ? 'Yes' : 'No'),
                Tables\Columns\TextColumn::make('ethnicity_type.name')
                    ->label('Ethnicity')
                    ->sortable(),
                Tables\Columns\TextColumn::make('older_persons_count')
                    ->label('Older persons')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pregnant_and_lactating_mothers_count')
                    ->label('Lactating mothers')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pwd_and_with_medical_conditions_count')
                    ->label('PWDs w/ medical condition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('house_ownership')
                    ->searchable(),
                Tables\Columns\TextColumn::make('housing_condition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('filters')
                    ->columnSpanFull()
                    ->columns(['xl' => 3])
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
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['last_name'], fn (Builder $query, $value) => $query->where('last_name', 'like', "%$value%"))
                            ->when($data['first_name'], fn (Builder $query, $value) => $query->where('first_name', 'like', "%$value%"))
                            ->when($data['middle_name'], fn (Builder $query, $value) => $query->where('middle_name', 'like', "%$value%"))
                            ->when($data['name_extension'], fn (Builder $query, $value) => $query->where('name_extension', 'like', "%$value%"))
                            ->when($data['birthdate'], fn (Builder $query, $value) => $query->whereDate('birthdate', $value))
                            ->when($data['birthplace_id'], fn (Builder $query, $value) => $query->where('birthplace_id', $value));
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
                        return $indicators;
                    })
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->actionsPosition(Tables\Enums\ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('change_barangay')
                        ->icon('heroicon-m-pencil-square')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Select::make('barangay_id')
                                ->relationship(name: 'barangay', titleAttribute: 'name')
                                ->createOptionForm(fn (Form $form) => BarangayResource::form($form))
                                ->searchable()
                                ->preload(),
                        ])
                        ->action(function (array $data, Collection $records) {
                            $records->toQuery()->update(['barangay_id' => $data['barangay_id']]);
                        }),
                    Tables\Actions\BulkAction::make('change_evacuation_site')
                        ->icon('heroicon-m-pencil-square')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Select::make('evacuation_site_id')
                                ->relationship(name: 'evacuation_site', titleAttribute: 'name')
                                ->createOptionForm(fn (Form $form) => EvacuationSiteResource::form($form))
                                ->searchable()
                                ->preload(),
                        ])
                        ->action(function (array $data, Collection $records) {
                            $records->toQuery()->update(['evacuation_site_id' => $data['evacuation_site_id']]);
                        }),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\Action::make('new')
                    ->label('New ' . self::$modelLabel)
                    ->action(function (Table $table) {
                        $data = $table->getFilter('filters')->getState();
                        session()->flash('last_name', $data['last_name']);
                        session()->flash('first_name', $data['first_name']);
                        session()->flash('middle_name', $data['middle_name']);
                        session()->flash('name_extension', $data['name_extension']);
                        session()->flash('birthdate', $data['birthdate']);
                        session()->flash('birthplace_id', $data['birthplace_id']);
                        return redirect(self::getUrl('create'));
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MembersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDafacs::route('/'),
            'create' => Pages\CreateDafac::route('/create'),
            'view' => Pages\ViewDafac::route('/{record}'),
            'edit' => Pages\EditDafac::route('/{record}/edit'),
        ];
    }
}
