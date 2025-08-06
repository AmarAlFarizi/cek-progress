<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductionResource\Pages;
use App\Filament\Resources\ProductionResource\RelationManagers;
use App\Models\Production;
use Doctrine\DBAL\Schema\View;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductionResource extends Resource
{
    protected static ?string $model = Production::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('manuscript_id')
                ->relationship('manuscript', 'title')
                ->label('Judul Naskah')
                ->searchable()
                ->required(),

            DatePicker::make('start_date')
                ->label('Tanggal Mulai Produksi')
                ->required(),

            Select::make('status')
                ->options([
                    'Belum' => 'Belum',
                    'Proses' => 'Proses',
                    'Selesai' => 'Selesai',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('manuscript.title')->label('Judul Naskah')->searchable(),
                TextColumn::make('start_date')->date(),
                TextColumn::make('status')->badge(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductions::route('/'),
            'create' => Pages\CreateProduction::route('/create'),
            'edit' => Pages\EditProduction::route('/{record}/edit'),
        ];
    }
}
