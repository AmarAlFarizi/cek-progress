<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShipmentResource\Pages;
use App\Filament\Resources\ShipmentResource\RelationManagers;
use App\Models\Shipment;
use Doctrine\DBAL\Schema\View;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShipmentResource extends Resource
{
    protected static ?string $model = Shipment::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?int $navigationSort = 6;


    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('manuscript_id')
                ->relationship('manuscript', 'title')
                ->label('Judul Naskah')
                ->searchable()
                ->required(),

            TextInput::make('courier_name')
                ->label('Kurir (JNE, SiCepat, etc)')
                ->required(),

            TextInput::make('tracking_number')
                ->label('Nomor Resi')
                ->required(),

            DatePicker::make('shipped_at')
                ->label('Tanggal Dikirim')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('manuscript.title')->label('Judul Naskah'),
                TextColumn::make('courier_name'),
                TextColumn::make('tracking_number'),
                TextColumn::make('shipped_at')->date(),
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
            'index' => Pages\ListShipments::route('/'),
            'create' => Pages\CreateShipment::route('/create'),
            'edit' => Pages\EditShipment::route('/{record}/edit'),
        ];
    }
}
