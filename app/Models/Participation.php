<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'name', 'email', 'address', 'date_of_birth', 'phone', 'internship_id'
    ];

    // Relasi ke model Internship
    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}

