<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function family_detail(): BelongsTo
    {
        return $this->belongsTo(FamilyDetail::class);
    }

    public static function jsonToMemberDetail($jsonData): MemberDetail
    {
        $mFamilyId = $jsonData["FamilyID"];
        print("Trying to insert FamilyID with " . $mFamilyId . "\n");
        return MemberDetail::create([
            'member_name' => $jsonData["MemberName"],
            'related_as' => $jsonData["RelatedAs"],
            "is_married" => $jsonData["IsMarried"],
            "age" => $jsonData["Age"],
            "education_profession" => $jsonData["Education/Occupation"],
            "email_address" => $jsonData["EmailAddress"],
            "phone_number" => $jsonData["PhoneNumber"],
            "family_detail_id" => FamilyDetail::where("family_id", '=', $jsonData["FamilyID"])->first()->id
        ]);
    }
}
