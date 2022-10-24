<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExperienciaGlobal extends Model
{  
    use HasFactory;
    protected $table = 'experiencia';
    protected $primaryKey = 'id';

    protected $fillable =[        
        "valor",
        "tramite",        
        "sugerencias"
    ];
}
