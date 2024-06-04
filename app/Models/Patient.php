<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    use HasFactory;
    public function rendez_vouses(){
        return $this->hasMany(RendezVous::class);
    }
}
