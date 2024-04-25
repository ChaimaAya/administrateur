<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminSecteur extends Model
{
    use HasFactory;
    public function secteur(){
        return $this->belongsTo(Secteur::class);
    }
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
