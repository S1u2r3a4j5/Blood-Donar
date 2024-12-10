<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'pincode',
        'city',
        'state',
        'country',
        'kshetra',
        'prant',
        'vibhag',
        'maha_nagar',
        'bhag',
        'nagar',
        'shakha',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
