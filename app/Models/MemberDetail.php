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

    public function family_detail(): BelongsTo
    {
        return $this->belongsTo(FamilyDetail::class);
    }

    public static function jsonToMemberDetail($jsonData): MemberDetail | null
    {
        $mFamilyId = $jsonData["FamilyID"];
        Log::info("Trying to insert FamilyID with " . $mFamilyId . "\n");
        try {
            return MemberDetail::create([
                'member_name' => $jsonData["MemberName"],
                'related_as' => $jsonData["RelatedAs"],
                "is_married" => $jsonData["IsMarried"],
                "age" => $jsonData["Age"] ?? 0,
                "education_profession" => $jsonData["Education/Occupation"],
                "email_address" => $jsonData["EmailAddress"],
                "phone_number" => $jsonData["PhoneNumber"],
                "family_detail_id" => FamilyDetail::where("family_id", '=', $mFamilyId)->first()->id
            ]);
        } catch (\Throwable $th) {
            Log::error("Unable to insert for familyID $mFamilyId \n");
            //throw $th;
        }
        return null;
    }
}
