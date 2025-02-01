<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description']; // Kolom yang dapat diisi secara massal

    // Jika diperlukan relasi, dapat ditambahkan di sini
}
