<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jugadore;
use App\Models\Equipo;

class Jugadores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $cedula, $telefono, $correo, $equipo_id, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $equipos = Equipo::all();
        return view('livewire.jugadores.view', [
            'jugadores' => Jugadore::with('equipo')
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->whereHas('equipo', fn ($query) => 
                        $query->where('nombre_equipo', 'LIKE', $keyWord))
						->orWhere('observacion', 'LIKE', $keyWord)
						->paginate(10),
        ],compact('equipos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->cedula = null;
		$this->telefono = null;
		$this->correo = null;
		$this->equipo_id = null;
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'cedula' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'equipo_id' => 'required',
		'observacion' => 'required',
        ]);

        Jugadore::create([ 
			'nombre' => $this-> nombre,
			'cedula' => $this-> cedula,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'equipo_id' => $this-> equipo_id,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Jugadore Successfully created.');
    }

    public function edit($id)
    {
        $record = Jugadore::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->cedula = $record-> cedula;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		$this->equipo_id = $record-> equipo_id;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'cedula' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'equipo_id' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jugadore::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'cedula' => $this-> cedula,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'equipo_id' => $this-> equipo_id,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Jugadore Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Jugadore::where('id', $id);
            $record->delete();
        }
    }
}
