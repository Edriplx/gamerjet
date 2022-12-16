<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripciongr;

class Inscripciongrs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $videojuego_id, $equipo_id, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripciongrs.view', [
            'inscripciongrs' => Inscripciongr::latest()
						->orWhere('videojuego_id', 'LIKE', $keyWord)
						->orWhere('equipo_id', 'LIKE', $keyWord)
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
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'equipo_id' => 'required',
		'observacion' => 'required',
        ]);

        Inscripciongr::create([ 
			'videojuego_id' => $this-> videojuego_id,
			'equipo_id' => $this-> equipo_id,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Inscripciongr Successfully created.');
    }

    public function edit($id)
    {
        $record = Inscripciongr::findOrFail($id);

        $this->selected_id = $id; 
		$this->videojuego_id = $record-> videojuego_id;
		$this->equipo_id = $record-> equipo_id;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'equipo_id' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Inscripciongr::find($this->selected_id);
            $record->update([ 
			'videojuego_id' => $this-> videojuego_id,
			'equipo_id' => $this-> equipo_id,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Inscripciongr Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Inscripciongr::where('id', $id);
            $record->delete();
        }
    }
}
