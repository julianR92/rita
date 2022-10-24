<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditoria extends Model
{
    use HasFactory;
    protected $table = 'auditoria';
    protected $primaryKey = 'id';

    protected $fillable=[
        "usuario",
        "proceso_afectado",
        "accion",
        "tramite",
        "radicado",
        "observacion"

    ];
}
