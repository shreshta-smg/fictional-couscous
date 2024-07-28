<?php

namespace App\Filament\Resources\FamilyDetailResource\Pages;

use App\Filament\Resources\FamilyDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyDetail extends EditRecord
{
    protected static string $resource = FamilyDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
