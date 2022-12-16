<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Horario;

class Horarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $videojuego_id, $aula_id, $tiempo_inicio, $tiempo_final, $fecha, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horarios.view', [
            'horarios' => Horario::latest()
						->orWhere('videojuego_id', 'LIKE', $keyWord)
						->orWhere('aula_id', 'LIKE', $keyWord)
						->orWhere('tiempo_inicio', 'LIKE', $keyWord)
						->orWhere('tiempo_final', 'LIKE', $keyWord)
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
		$this->aula_id = null;
		$this->tiempo_inicio = null;
		$this->tiempo_final = null;
		$this->fecha = null;
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'aula_id' => 'required',
		'tiempo_inicio' => 'required',
		'tiempo_final' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        Horario::create([ 
			'videojuego_id' => $this-> videojuego_id,
			'aula_id' => $this-> aula_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'tiempo_final' => $this-> tiempo_final,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Horario Successfully created.');
    }

    public function edit($id)
    {
        $record = Horario::findOrFail($id);

        $this->selected_id = $id; 
		$this->videojuego_id = $record-> videojuego_id;
		$this->aula_id = $record-> aula_id;
		$this->tiempo_inicio = $record-> tiempo_inicio;
		$this->tiempo_final = $record-> tiempo_final;
		$this->fecha = $record-> fecha;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'aula_id' => 'required',
		'tiempo_inicio' => 'required',
		'tiempo_final' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Horario::find($this->selected_id);
            $record->update([ 
			'videojuego_id' => $this-> videojuego_id,
			'aula_id' => $this-> aula_id,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'tiempo_final' => $this-> tiempo_final,
			'fecha' => $this-> fecha,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Horario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Horario::where('id', $id);
            $record->delete();
        }
    }
}
