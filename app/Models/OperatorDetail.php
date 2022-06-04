<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatorDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the Operator that owns the OperatorDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Operator()
    {
        return $this->belongsTo(Operator::class);
    }
}
