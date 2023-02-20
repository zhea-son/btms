<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['origin'] ?? false){
            $query->where('origin', request('origin') );
        }

        if($filters['destination'] ?? false){
            $query->where('destination', request('destination') );
        }

        if($filters['via'] ?? false){
            $query->where('via', request('via') );
        }
    }

    public function schedules(){
        return $this->hasMany(Schedule::class, 'route_id');
    }

}
