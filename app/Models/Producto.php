<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio',
    ];
}
