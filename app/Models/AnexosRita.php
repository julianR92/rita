<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnexosRita extends Model
{
    use HasFactory;
    protected $table = 'anexos_rita';
    protected $primaryKey = 'id';

    protected $fillable =[ 
        'rita_id',
        'radicado',
        'titulo',
        'nombre_archivo',
        'ruta',
      ];

}
