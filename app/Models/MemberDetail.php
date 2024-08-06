<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class MemberDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function family(): BelongsTo
    {
        return $this->belongsTo(FamilyDetail::class, 'family_detail_id');
    }

    public static function jsonToMemberDetail($jsonData): MemberDetail | null
    {
        // $mFamilyId = $jsonData["FamilyID"];
        $slNo = $jsonData["FamilySlNo"];
        $mFamilyId = "FD$slNo";
        $foundFamily = FamilyDetail::where("family_id", '=', $mFamilyId)->first();
        $familyDetailId = null;
        if ($mFamilyId != 'FD') {
            if ($foundFamily != null) {
                $familyDetailId = $foundFamily->id;
            }
        }
        Log::info("Trying to insert FamilyID with " . $mFamilyId . "\n");
        try {
            return MemberDetail::create([
                'member_name' => $jsonData["MemberName"],
                'related_as' => $jsonData["RelatedAs"],
                "is_married" => $jsonData["IsMarried"],
                "age" => $jsonData['Age'] == '' ? 0 : $jsonData['Age'],
                "education_profession" => $jsonData["Education/Occupation"],
                "email_address" => $jsonData["EmailAddress"],
                "phone_number" => $jsonData["PhoneNumber"],
                "family_detail_id" => $familyDetailId
            ]);
        } catch (\Throwable $th) {
            Log::error("Unable to insert for familyID $mFamilyId \n");
            throw $th;
        }
        return null;
    }
}
