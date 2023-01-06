<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'aulas';

    protected $fillable = ['nombre_aula','edificio','direccion','observacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'aula_id', 'id');
    }
    
}
