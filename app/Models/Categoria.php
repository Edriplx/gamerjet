<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'categorias';

    protected $fillable = ['tipo','numero_jugadores','competencia','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videojuegos()
    {
        return $this->hasMany('App\Models\Videojuego', 'categoria_id', 'id');
    }
    
}
