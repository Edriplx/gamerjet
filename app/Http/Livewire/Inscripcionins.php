<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripcionin;
use App\Models\Videojuego;
use App\Models\Jugadore;

class Inscripcionins extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $videojuego_id, $jugador_id, $observacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $videojuegos = Videojuego::all();
        $jugadores = Jugadore::all();
        return view('livewire.inscripcionins.view', [
            'inscripcionins' => Inscripcionin::with('videojuego')->with('jugadore')
                        ->whereHas('videojuego', fn ($query) => 
                        $query->where('nombre', 'LIKE', $keyWord))
						->whereHas('jugadore', fn ($query) => 
                        $query->where('nombre', 'LIKE', $keyWord))
						->orWhere('observacion', 'LIKE', $keyWord)
						->paginate(10),
        ],compact('videojuegos', 'jugadores'));
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
		$this->observacion = null;
    }

    public function store()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'jugador_id' => 'required',
		'observacion' => 'required',
        ]);

        Inscripcionin::create([ 
			'videojuego_id' => $this-> videojuego_id,
			'jugador_id' => $this-> jugador_id,
			'observacion' => $this-> observacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Inscripcionin Successfully created.');
    }

    public function edit($id)
    {
        $record = Inscripcionin::findOrFail($id);

        $this->selected_id = $id; 
		$this->videojuego_id = $record-> videojuego_id;
		$this->jugador_id = $record-> jugador_id;
		$this->observacion = $record-> observacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'videojuego_id' => 'required',
		'jugador_id' => 'required',
		'observacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Inscripcionin::find($this->selected_id);
            $record->update([ 
			'videojuego_id' => $this-> videojuego_id,
			'jugador_id' => $this-> jugador_id,
			'observacion' => $this-> observacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Inscripcionin Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Inscripcionin::where('id', $id);
            $record->delete();
        }
    }
}
