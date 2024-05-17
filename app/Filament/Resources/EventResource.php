<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Titel')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Locatie')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->label('Stad')
                    ->required(),
                Forms\Components\Select::make('province')
                    ->label('Provincie')
                    ->options([
                        'Drenthe' => 'Drenthe',
                        'Flevoland' => 'Flevoland',
                        'Friesland' => 'Friesland',
                        'Gelderland' => 'Gelderland',
                        'Groningen' => 'Groningen',
                        'Limburg' => 'Limburg',
                        'Noord-Brabant' => 'Noord-Brabant',
                        'Noord-Holland' => 'Noord-Holland',
                        'Overijssel' => 'Overijssel',
                        'Utrecht' => 'Utrecht',
                        'Zeeland' => 'Zeeland',
                        'Zuid-Holland' => 'Zuid-Holland',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Omschrijving')
                    ->nullable(),
                Forms\Components\DateTimePicker::make('start_date')
                    ->label("Start tijd en datum")
                    ->nullable(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label("Einddatum en tijd")
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Naam'),
                Tables\Columns\TextColumn::make('province')
                    ->searchable()
                    ->label('Province'),
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->label('Datum start'),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->label('Datum eind'),
            ])
            ->filters([
                Filter::make('Aankomende')
                    ->label('Aankomende')
                    ->query(fn(Builder $query): Builder => $query->whereDate('start_date', '>', now()))
            ])
            ->actions([
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
