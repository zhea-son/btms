<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
