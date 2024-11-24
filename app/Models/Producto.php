<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'precio_publico',
        'stock',
        'imagen',
        'categoria_id', 
    ];

        protected static function booted()
    {
        static::deleting(function ($producto) {
            $producto->salidas()->delete();
        });
    }

    public function salidas()
    {
        return $this->hasMany(Salida::class);
    }


}
