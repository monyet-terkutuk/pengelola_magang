<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_date',
        'institution_name',
        'major',
        'participant_count',
        'division_id',
        'start_date',  // Menambahkan start_date
        'end_date',    // Menambahkan end_date
        'request_letter',
        'acceptance_letter',
        'kesbangpol_letter',
        'documentation',
        'contact_person',
        'accepted',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

     public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
