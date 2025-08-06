<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManuscriptResource\Pages;
use App\Filament\Resources\ManuscriptResource\RelationManagers;
use App\Models\Manuscript;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManuscriptResource extends Resource
{
    protected static ?string $model = Manuscript::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('author_id')
                ->relationship('author', 'name')
                ->searchable()
                ->required(),

            Select::make('package_id')
                ->relationship('package', 'name')
                ->label('Paket Penerbitan')
                ->required(),

            TextInput::make('title')->required(),

            Toggle::make('status_administrasi')->label('Sudah Lunas ?'),

            Select::make('status_layout')
                ->options([
                    'Belum' => 'Belum',
                    'Antri' => 'Antri',
                    'Proses' => 'Proses',
                    'Revisi' => 'Revisi',
                    'Selesai' => 'Selesai',
                ])
                ->required(),

            Select::make('status_desain_cover')
                ->options([
                    'Belum' => 'Belum',
                    'Antri' => 'Antri',
                    'Proses' => 'Proses',
                    'Revisi' => 'Revisi',
                    'Selesai' => 'Selesai',
                ])
                ->required(),
            TextInput::make('file_cover')
                ->label('Link Drive Buku (URL)')
                ->placeholder('https://link-bukumu.com')
                ->url()
                ->columnSpanFull(),

            // FileUpload::make('file_naskah')->directory('naskah')->preserveFilenames(),
            // FileUpload::make('file_cover')->directory('cover')->preserveFilenames(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author.name')->label('Penulis')->searchable(),
                TextColumn::make('package.name')->label('Paket'),
                TextColumn::make('status_desain_cover'),
                TextColumn::make('status_layout'),
                CheckboxColumn::make('status_administrasi')->label('Lunas Administrasi'),

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
            'index' => Pages\ListManuscripts::route('/'),
            'create' => Pages\CreateManuscript::route('/create'),
            'edit' => Pages\EditManuscript::route('/{record}/edit'),
        ];
    }
}
