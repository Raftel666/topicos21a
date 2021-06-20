<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = "providers"; //Nombre de la tabla en la BD
    protected $guarded = []; //Opuesto del $fillable

}
