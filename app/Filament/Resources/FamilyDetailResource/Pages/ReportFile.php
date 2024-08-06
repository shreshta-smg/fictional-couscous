<?php

namespace App\Filament\Resources\FamilyDetailResource\Pages;

use App\Filament\Resources\FamilyDetailResource;
use App\Models\ReportFile as ModelsReportFile;
use Filament\Tables\Actions\DeleteAction;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ReportFile extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = "Reports List";
    protected static string $resource = FamilyDetailResource::class;
    protected static string $view = 'filament.resources.family-detail-resource.pages.report-file';
    public function table(Table $table): Table
    {
        return $table
            ->actions([
                Action::make('download')->label("Download File")
                    ->icon('heroicon-m-arrow-down-tray')
                    ->action(fn ($record) => Storage::download($record->name)),
                DeleteAction::make('delete')->label("Delete File")
                    ->action(fn ($record) => Storage::disk('local')->delete($record->name)),
            ])
            ->query(ModelsReportFile::query()->where('name', "LIKE", "%.xlsx"))
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('size'),
            ]);
    }
}
