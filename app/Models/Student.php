<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    use HasFactory;
    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "mobile",
        "filiere_id"
    ];
     
    /** Methode de récupération nom filière OneToMany
    *   Un etudian appartient à une seul filière        
    **/
    public function filiere(){
        return $this->belongsTo(Filiere::class,"filiere_id");
    }
}
