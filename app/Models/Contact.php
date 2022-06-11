<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the User that owns the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Operator associated with the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function remap()
    {
        
    }

    /**
     * Get all of the Message for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Message()
    {
        return $this->hasMany(Message::class);
    }

    public function messagesCount()
    {
        return($this->Message()->count());
    }
}
