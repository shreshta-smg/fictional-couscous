<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function member_details(): HasMany
    {
        return $this->hasMany(MemberDetail::class);
    }

    public static function jsonToFamilyDetail($jsonData): FamilyDetail
    {
        $mFamilyId = $jsonData["FamilyID"];
        print("Trying to insert FamilyID with " . $mFamilyId . "\n");
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
            'family_id' => $jsonData["FamilyID"]
        ]);
    }
}
