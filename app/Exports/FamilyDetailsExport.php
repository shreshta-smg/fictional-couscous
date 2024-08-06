<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class FamilyDetailsExport implements FromCollection
{
    use Exportable;
    private ?string $category;

    public function __construct(?string $category)
    {
        $this->category = $category;
    }

    public function collection()
    {
        $ageMin = 0;
        $ageMax = 0;
        switch ($this->category) {
            case 'age1524':
                $ageMin = 15;
                $ageMax = 24;
                break;
            case 'age1529':
                $ageMin = 15;
                $ageMax = 29;
                break;
            case 'age3065':
                $ageMin = 30;
                $ageMax = 65;
                break;
            default:
                $ageMin = 1;
                $ageMax = 100;
                break;
        }
        return DB::table('member_details as md')
            ->join('family_details as fd', 'md.family_detail_id', '=', 'fd.id')
            ->select('md.member_name', 'fd.full_name', 'fd.address_line', 'fd.area', 'fd.taluk', 'fd.phone_number')
            ->whereBetween('md.age', [$ageMin, $ageMax])
            ->get();
    }
}
