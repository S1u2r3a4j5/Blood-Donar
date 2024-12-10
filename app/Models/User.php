<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const USER_TYPE_DONOR = 'donar';
    const USER_TYPE_GAINER = 'gainer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'image',
        'age',
        'weight',
        'gender',
        'blood_group',
        'user_post_name',
        'user_type',

    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function gainerAddress()
    {
        return $this->hasOne(GainerAddress::class);
    }
}
