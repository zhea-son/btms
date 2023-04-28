<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
    
        if($filters['type'] ?? false){
            $query->where('type', request('type') );
        }

        // if($filters['search'] ?? false){
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('description', 'like', '%' . request('search') . '%')
        //         ->orWhere('tags', 'like', '%' . request('search') . '%');
        // }
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function schedules(){
        return $this->hasMany(Schedule::class, 'bus_id');
    }

  
}
