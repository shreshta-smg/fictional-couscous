<?php

namespace App\Filament\Resources\FamilyDetailResource\Pages;

use App\Filament\Resources\FamilyDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyDetails extends ListRecords
{
    protected static string $resource = FamilyDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reports')->label("Reports")->url(FamilyDetailResource::getUrl('reports')),
            Actions\Action::make('newReports')->label("Generate Reports")->url(FamilyDetailResource::getUrl('reports-new')),
            Actions\CreateAction::make(),
        ];
    }
}
