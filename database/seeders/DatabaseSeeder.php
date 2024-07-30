<?php

namespace Database\Seeders;

use App\Models\FamilyDetail;
use App\Models\MemberDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $familyDetails = File::get(base_path('/database/seeders/survey-data/family_details.json'));
        $memberDetails = File::get(base_path('/database/seeders/survey-data/member_details.json'));
        // $fdJson = json_decode(json: $familyDetails, associative: true);
        $mdJson = json_decode(json: $memberDetails, associative: true);
        // foreach ($fdJson as $fd1) {
        //     FamilyDetail::jsonToFamilyDetail($fd1);
        // }
        // print_r(FamilyDetail::where("family_id", "FD1")->first()->id);
        foreach ($mdJson as $md1) {
            MemberDetail::jsonToMemberDetail($md1);
        }
    }
}
