<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the User that owns the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the OperatorDetail for the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OperatorDetail()
    {
        return $this->hasMany(OperatorDetail::class);
    }

    /**
     * Get the Contact that owns the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function isUsed()
    {
        $isUsed = false;

        if(Contact::all()->where('operator_id', $this->id)->count() > 0) {
            $isUsed = true;
        }

        return $isUsed;
    }
}
