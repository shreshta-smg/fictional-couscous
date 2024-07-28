<?php

namespace App\Filament\Resources\MemberDetailResource\Pages;

use App\Filament\Resources\MemberDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberDetail extends EditRecord
{
    protected static string $resource = MemberDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
