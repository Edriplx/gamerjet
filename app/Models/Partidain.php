<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidain extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidains';

    protected $fillable = ['videojuego_id','jugador_id','tiempo_inicio','fecha','observacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jugadore()
    {
        return $this->hasOne('App\Models\Jugadore', 'id', 'jugador_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function videojuego()
    {
        return $this->hasOne('App\Models\Videojuego', 'id', 'videojuego_id');
    }
    
}
