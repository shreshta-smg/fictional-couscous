<?php

namespace App\Filament\Resources\MemberDetailResource\Pages;

use App\Filament\Resources\MemberDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberDetails extends ListRecords
{
    protected static string $resource = MemberDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
