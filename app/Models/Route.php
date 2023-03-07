<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

}
