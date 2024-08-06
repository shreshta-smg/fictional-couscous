<?php

namespace App\Filament\Resources\FamilyDetailResource\Pages;

use App\Filament\Resources\FamilyDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;

class ListFamilyDetails extends ListRecords
{
    protected static string $resource = FamilyDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reports')
                ->label("Reports")
                ->color(Color::Slate)->outlined()
                ->url(FamilyDetailResource::getUrl('reports')),
            Actions\Action::make('newReports')
                ->label("Generate Reports")
                ->outlined()
                ->color(Color::Neutral)
                ->url(FamilyDetailResource::getUrl('reports-new')),
            Actions\CreateAction::make()->outlined()->color(Color::Yellow),
        ];
    }
}
