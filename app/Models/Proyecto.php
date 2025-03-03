<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos'; // Nombre de la tabla en la BD

    protected $fillable = [
        'titulo',
        'horas_previstas',
        'fecha_de_comienzo',
    ];

    protected $casts = [
        'fecha_de_comienzo' => 'date',
    ];
}
