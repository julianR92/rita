<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Barrio extends Model
{
    use HasFactory;
    
    protected $table = 'barrio';
    protected $primaryKey = 'codigo';
    public $incrementing = false;


}
