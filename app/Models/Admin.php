<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'numero', 'email', 'status',
    ];
    public function startups()
    {
        return $this->hasMany(Startup::class);
    }


}
