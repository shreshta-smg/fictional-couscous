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
            Actions\CreateAction::make(),
        ];
    }
}
