<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get all of the Operator for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Operator()
    {
        return $this->hasMany(Operator::class);
    }

    /**
     * Get all of the Contact for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Contact()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get all of the Message for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Message()
    {
        return $this->hasMany(Message::class);
    }
}
