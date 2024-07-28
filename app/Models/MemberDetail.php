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
}
