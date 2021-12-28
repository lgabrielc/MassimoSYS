<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comanda extends Model
{
    use HasFactory;
    public $table = 'comandas';
    protected $fillable = [
        'fecha',
        'descripcion',
        'estado',
        'monto',
    ];
}
