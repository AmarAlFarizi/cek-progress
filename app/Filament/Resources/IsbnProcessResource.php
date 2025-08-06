<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IsbnProcessResource\Pages;
use App\Filament\Resources\IsbnProcessResource\RelationManagers;
use App\Models\IsbnProcess;
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

class IsbnProcessResource extends Resource
{
    protected static ?string $model = IsbnProcess::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('manuscript_id')
                ->relationship('manuscript', 'title')
                ->searchable()
                ->required(),

            DatePicker::make('submitted_at')
                ->label('Tanggal Dikirim ke Perpusnas')
                ->required(),

            DatePicker::make('issued_at')
                ->label('Tanggal ISBN Keluar'),

            TextInput::make('isbn_number')
                ->label('Nomor ISBN')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('manuscript.title')->label('Judul Naskah')->searchable(),
                TextColumn::make('submitted_at')->date(),
                TextColumn::make('issued_at')->date()->sortable(),
                TextColumn::make('isbn_number'),
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
            'index' => Pages\ListIsbnProcesses::route('/'),
            'create' => Pages\CreateIsbnProcess::route('/create'),
            'edit' => Pages\EditIsbnProcess::route('/{record}/edit'),
        ];
    }
}
