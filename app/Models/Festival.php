<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];
    // Gegevens die je kunt massaal toewijzen
    protected $fillable = [
        'name', 'date', 'location', 'available_tickets',
    ];
}
