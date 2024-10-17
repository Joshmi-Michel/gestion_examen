<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model{
    use HasFactory;

    protected $fillable = [
        "note",
        "student_id",
        "examen_id",
        "mention"
    ];
    // avoir un seul resultats
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function examen(){
        return $this->belongsTo(Examen::class);
    }
}
