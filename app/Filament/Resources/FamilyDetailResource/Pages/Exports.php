<?php

namespace App\Filament\Resources\FamilyDetailResource\Pages;

use App\Exports\FamilyDetailsExport;
use App\Filament\Resources\FamilyDetailResource;
use DateTime;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Log;

class Exports extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $title = "Custom Reports";
    protected static string $resource = FamilyDetailResource::class;
    protected static string $view = 'filament.resources.family-detail-resource.pages.exports';
    public ?string $category = '';

    public function formatFileName($c)
    {
        $nowDate = new DateTime();
        return $nowDate->format('dmYHi') . '-' . $c . '.xlsx';
    }

    public function mount(): void
    {
        $this->form->fill();
    }
    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('reporting')
                ->headerActions([
                    Action::make('exports')
                        ->action(function () {
                            Log::info("Category - $this->category");
                            (fn () => (new FamilyDetailsExport($this->category))->store($this->formatFileName($this->category)))();
                            Log::debug("Report Downloaded!");
                        })->successRedirectUrl(FamilyDetailResource::getUrl('reports'))
                ])
                ->description('Export new reports')
                ->schema([
                    Select::make('category')
                        ->options([
                            'age1524' => 'Age 15-24',
                            'age1529' => 'Age 15-29',
                            'age3065' => 'Age 30-65',
                            'age' => 'Age'
                        ])
                        ->default('age1524')
                        ->native(false),

                ])->columns(2)
        ]);
    }
}
