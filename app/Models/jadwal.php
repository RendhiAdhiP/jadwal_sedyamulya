<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Crews(): BelongsTo
    {
        return $this->belongsTo(Crews::class);
    }


    public function crew1(): BelongsTo
    {
        return $this->belongsTo(Crews::class, 'crew1_id');
    }

    public function crew2(): BelongsTo
    {
        return $this->belongsTo(Crews::class, 'crew2_id');
    }

    public function crew3(): BelongsTo
    {
        return $this->belongsTo(Crews::class, 'crew3_id');
    }
}
