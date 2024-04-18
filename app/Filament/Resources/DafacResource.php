<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DafacResource\Pages;
use App\Filament\Resources\DafacResource\RelationManagers;
use App\Models\Dafac;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
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
            ->schema([
                Forms\Components\TextInput::make('serial_number')
                    ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->required(),
                Forms\Components\TextInput::make('first_name')
                    ->required(),
                Forms\Components\TextInput::make('middle_name')
                    ->required(),
                Forms\Components\TextInput::make('name_extension')
                    ->required(),
                Forms\Components\TextInput::make('birthdate')
                    ->required(),
                Forms\Components\TextInput::make('sex')
                    ->required(),
                Forms\Components\TextInput::make('mother_maiden_name')
                    ->required(),
                Forms\Components\TextInput::make('monthly_family_net_income')
                    ->required(),
                Forms\Components\TextInput::make('id_card_number')
                    ->required(),
                Forms\Components\TextInput::make('contact_number')
                    ->required(),
                Forms\Components\TextInput::make('permanent_address')
                    ->required(),
                Forms\Components\TextInput::make('is_4ps_beneficiary')
                    ->required(),
                Forms\Components\TextInput::make('is_ip')
                    ->required(),
                Forms\Components\TextInput::make('older_persons_count')
                    ->required(),
                Forms\Components\TextInput::make('pregnant_and_lactating_mothers_count')
                    ->required(),
                Forms\Components\TextInput::make('pwd_and_with_medical_conditions_count')
                    ->required(),
                Forms\Components\TextInput::make('house_ownership')
                    ->required(),
                Forms\Components\TextInput::make('housing_condition')
                    ->required(),
                Forms\Components\TextInput::make('barangay_id')
                    ->numeric(),
                Forms\Components\TextInput::make('evacuation_site_id')
                    ->numeric(),
                Forms\Components\TextInput::make('birthplace_id')
                    ->numeric(),
                Forms\Components\TextInput::make('occupation_id')
                    ->numeric(),
                Forms\Components\TextInput::make('id_card_type_id')
                    ->numeric(),
                Forms\Components\TextInput::make('ethnicity_type_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_extension')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_maiden_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monthly_family_net_income')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_card_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permanent_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_4ps_beneficiary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_ip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('older_persons_count')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pregnant_and_lactating_mothers_count')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pwd_and_with_medical_conditions_count')
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
                Tables\Columns\TextColumn::make('barangay_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evacuation_site_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birthplace_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('occupation_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_card_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ethnicity_type_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
