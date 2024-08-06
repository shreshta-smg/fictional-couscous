<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyDetailResource\Pages;
use App\Filament\Resources\FamilyDetailResource\RelationManagers;
use App\Models\FamilyDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyDetailResource extends Resource
{
    protected static ?string $model = FamilyDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address_line')
                    ->maxLength(255),
                Forms\Components\TextInput::make('veda')
                    ->maxLength(25),
                Forms\Components\TextInput::make('category')
                    ->maxLength(45),
                Forms\Components\TextInput::make('sub_category')
                    ->maxLength(65),
                Forms\Components\TextInput::make('gothra')
                    ->maxLength(25),
                Forms\Components\TextInput::make('area')
                    ->maxLength(25),
                Forms\Components\TextInput::make('taluk')
                    ->maxLength(35),
                Forms\Components\TextInput::make('profession')
                    ->maxLength(45),
                Forms\Components\TextInput::make('email_address')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(25),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
            Tables\Columns\TextColumn::make('phone_number'),
            Tables\Columns\TextColumn::make('category'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListFamilyDetails::route('/'),
            'create' => Pages\CreateFamilyDetail::route('/create'),
            'edit' => Pages\EditFamilyDetail::route('/{record}/edit'),
            'reports-new' => Pages\Exports::route("/reports/new"),
            'reports' => Pages\ReportFile::route("/reports"),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
