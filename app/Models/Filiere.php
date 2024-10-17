<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model{
    use HasFactory;

    protected $fillable = ['name'];

//une filière peut avoir 0 ou plusieurs Etudiants
    public function students(){
        return $this->hasMany("students");
    }
}
