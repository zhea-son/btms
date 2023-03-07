<?php

namespace App\Models;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if ($filters['place'] ?? false) {
            $query->whereHas('route', function ($query) {
                $query->where('name', 'like', '%' .  request('place') . '%');                  
            });
        }

        if ($filters['type'] ?? false) {
            $query->whereHas('bus', function ($query) {
                $query->where('type', 'like', request('type') );                  
            });
        }
    }

    public function bus(){
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function route(){
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'schedule_id');
    }
    
}
