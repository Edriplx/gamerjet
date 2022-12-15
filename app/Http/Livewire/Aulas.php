<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Aula;

class Aulas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_aula, $edificio, $direccion, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.aulas.view', [
            'aulas' => Aula::latest()
						->orWhere('nombre_aula', 'LIKE', $keyWord)
						->orWhere('edificio', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
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
		$this->nombre_aula = null;
		$this->edificio = null;
		$this->direccion = null;
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_aula' => 'required',
		'edificio' => 'required',
		'direccion' => 'required',
		'observacion' => 'required',
        ]);

        Aula::create([ 
			'nombre_aula' => $this-> nombre_aula,
			'edificio' => $this-> edificio,
			'direccion' => $this-> direccion,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Aula Successfully created.');
    }

    public function edit($id)
    {
        $record = Aula::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_aula = $record-> nombre_aula;
		$this->edificio = $record-> edificio;
		$this->direccion = $record-> direccion;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_aula' => 'required',
		'edificio' => 'required',
		'direccion' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Aula::find($this->selected_id);
            $record->update([ 
			'nombre_aula' => $this-> nombre_aula,
			'edificio' => $this-> edificio,
			'direccion' => $this-> direccion,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Aula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Aula::where('id', $id);
            $record->delete();
        }
    }
}
