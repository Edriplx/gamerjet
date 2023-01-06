<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidagr extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidagrs';

    protected $fillable = ['videojuego_id','equipo_id','tiempo_inicio','fecha','observacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function videojuego()
    {
        return $this->hasOne('App\Models\Videojuego', 'id', 'videojuego_id');
    }
    
}
