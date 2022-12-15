<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partidagr;

class Partidagrs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $videojuego_id, $equipo_id, $tiempo_inicio, $fecha, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidagrs.view', [
            'partidagrs' => Partidagr::latest()
						->orWhere('videojuego_id', 'LIKE', $keyWord)
						->orWhere('equipo_id', 'LIKE', $keyWord)
						->orWhere('tiempo_inicio', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('observacion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->videojuego_id = null;
		$this->equipo_id = null;
		$this->tiempo_inicio = null;
		$this->fecha = null;
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'equipo_id' => 'required',
		'tiempo_inicio' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        Partidagr::create([ 
			'videojuego_id' => $this-> videojuego_id,
			'equipo_id' => $this-> equipo_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Partidagr Successfully created.');
    }

    public function edit($id)
    {
        $record = Partidagr::findOrFail($id);

        $this->selected_id = $id; 
		$this->videojuego_id = $record-> videojuego_id;
		$this->equipo_id = $record-> equipo_id;
		$this->tiempo_inicio = $record-> tiempo_inicio;
		$this->fecha = $record-> fecha;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'equipo_id' => 'required',
		'tiempo_inicio' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Partidagr::find($this->selected_id);
            $record->update([ 
			'videojuego_id' => $this-> videojuego_id,
			'equipo_id' => $this-> equipo_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Partidagr Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Partidagr::where('id', $id);
            $record->delete();
        }
    }
}
