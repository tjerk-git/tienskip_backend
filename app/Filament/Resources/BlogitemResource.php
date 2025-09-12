<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogitemResource\Pages;
use App\Filament\Resources\BlogitemResource\RelationManagers;
use App\Models\Blogitem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogitemResource extends Resource
{
    protected static ?string $model = Blogitem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titel')
                    ->required(),
                Forms\Components\Checkbox::make('is_published')
                    ->label('Zichtbaar op de website')
                    ->required(),
                Forms\Components\DatePicker::make('published_at')
                    ->label('Datum publicatie')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Hoofdafbeelding')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->maxSize(10240),
                Forms\Components\RichEditor::make('content')
                    ->label('Content')
                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ]),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                 Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->sortable(),
            ])
            ->filters([
                
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
            'index' => Pages\ListBlogitems::route('/'),
            'create' => Pages\CreateBlogitem::route('/create'),
            'edit' => Pages\EditBlogitem::route('/{record}/edit'),
        ];
    }
}
