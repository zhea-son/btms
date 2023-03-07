<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function schedules(){
        return $this->hasMany(Schedule::class, 'company_id');
    }

    public function routes(){
        return $this->hasMany(Route::class, 'company_id');
    }

    public function buses(){
        return $this->hasMany(Bus::class, 'company_id');
    }
}

