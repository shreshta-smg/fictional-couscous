<?php

namespace Database\Seeders;

use App\Models\FamilyDetail;
use App\Models\MemberDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $familyDetails = File::get(base_path('/database/seeders/survey-data/fd.json'));
        $fdJson = json_decode(json: $familyDetails, associative: true);
        foreach ($fdJson as $fd1) {
            FamilyDetail::jsonToFamilyDetail($fd1);
        }
        // print_r(FamilyDetail::where("family_id", "FD1")->first()->id);
        $memberDetails = File::get(base_path('/database/seeders/survey-data/md.json'));
        $mdJson = json_decode(json: $memberDetails, associative: true);
        foreach ($mdJson as $md1) {
            MemberDetail::jsonToMemberDetail($md1);
        }
        // $results = DB::table('member_details as md')
        // ->join('family_details as fd', 'md.family_detail_id', '=', 'fd.id')
        // ->select('md.member_name', 'md.age', 'fd.full_name', 'fd.address_line', 'fd.phone_number')
        // ->whereBetween('md.age', [1, 100])->get();
        // print_r($results->count());
    }
}
