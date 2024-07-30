<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class FamilyDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function member_details(): HasMany
    {
        return $this->hasMany(MemberDetail::class);
    }

    public static function jsonToFamilyDetail($jsonData): FamilyDetail | null
    {
        $familyId = $jsonData["FamilyID"];
        Log::info("Trying to insert FamilyID with " . $familyId . "\n");
        try {
            return FamilyDetail::create([
                'full_name' => $jsonData["FullName"],
                'address_line' => $jsonData["Address"],
                'veda' => $jsonData["Veda"],
                'category' => $jsonData["Category"],
                'gothra' => $jsonData["Gothra"],
                'sub_category' => $jsonData["SubCategory"],
                'area' => $jsonData["Area"],
                'taluk' => $jsonData["Taluk"],
                'profession' => $jsonData["Profession"],
                'email_address' => $jsonData["EmailAddress"],
                'phone_number' => $jsonData["PhoneNumber"],
                'family_id' => $familyId
            ]);
        } catch (\Throwable $th) {
            Log::error("Unable to insert for familyID $familyId with $th->getMessage() \n");
            //throw $th;
        }
        return null;
    }
}
