<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guard = 'company';
    protected $fillable = [
        'company_name',
        'email',
        'contact',
        'password',
        'registration_number',
        'office_location',
        
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

    public function isAdmin()
    {
        return false;
    }
}

