<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublishingPackageResource\Pages;
use App\Filament\Resources\PublishingPackageResource\RelationManagers;
use App\Models\PublishingPackage;
use Dom\Text;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublishingPackageResource extends Resource
{
    protected static ?string $model = PublishingPackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            Textarea::make('description')->rows(3),
            TextInput::make('price')->numeric()->prefix('Rp')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('price')->money('IDR', true),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListPublishingPackages::route('/'),
            'create' => Pages\CreatePublishingPackage::route('/create'),
            'edit' => Pages\EditPublishingPackage::route('/{record}/edit'),
        ];
    }
}
