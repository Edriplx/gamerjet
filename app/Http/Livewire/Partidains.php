<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partidain;

class Partidains extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $videojuego_id, $jugador_id, $tiempo_inicio, $fecha, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidains.view', [
            'partidains' => Partidain::latest()
						->orWhere('videojuego_id', 'LIKE', $keyWord)
						->orWhere('jugador_id', 'LIKE', $keyWord)
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
		$this->jugador_id = null;
		$this->tiempo_inicio = null;
		$this->fecha = null;
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'jugador_id' => 'required',
		'tiempo_inicio' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        Partidain::create([ 
			'videojuego_id' => $this-> videojuego_id,
			'jugador_id' => $this-> jugador_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Partidain Successfully created.');
    }

    public function edit($id)
    {
        $record = Partidain::findOrFail($id);

        $this->selected_id = $id; 
		$this->videojuego_id = $record-> videojuego_id;
		$this->jugador_id = $record-> jugador_id;
		$this->tiempo_inicio = $record-> tiempo_inicio;
		$this->fecha = $record-> fecha;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'jugador_id' => 'required',
		'tiempo_inicio' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Partidain::find($this->selected_id);
            $record->update([ 
			'videojuego_id' => $this-> videojuego_id,
			'jugador_id' => $this-> jugador_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Partidain Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Partidain::where('id', $id);
            $record->delete();
        }
    }
}
