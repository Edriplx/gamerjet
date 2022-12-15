<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Videojuego;

class Videojuegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $categoria_id, $nombre, $compania, $precio, $decripcion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.videojuegos.view', [
            'videojuegos' => Videojuego::latest()
						->orWhere('categoria_id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('compania', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
						->orWhere('decripcion', 'LIKE', $keyWord)
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
		$this->categoria_id = null;
		$this->nombre = null;
		$this->compania = null;
		$this->precio = null;
		$this->decripcion = null;
    }

    public function store()
    {
        $this->validate([
		'categoria_id' => 'required',
		'nombre' => 'required',
		'compania' => 'required',
		'precio' => 'required',
		'decripcion' => 'required',
        ]);

        Videojuego::create([ 
			'categoria_id' => $this-> categoria_id,
			'nombre' => $this-> nombre,
			'compania' => $this-> compania,
			'precio' => $this-> precio,
			'decripcion' => $this-> decripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Videojuego Successfully created.');
    }

    public function edit($id)
    {
        $record = Videojuego::findOrFail($id);

        $this->selected_id = $id; 
		$this->categoria_id = $record-> categoria_id;
		$this->nombre = $record-> nombre;
		$this->compania = $record-> compania;
		$this->precio = $record-> precio;
		$this->decripcion = $record-> decripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'categoria_id' => 'required',
		'nombre' => 'required',
		'compania' => 'required',
		'precio' => 'required',
		'decripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Videojuego::find($this->selected_id);
            $record->update([ 
			'categoria_id' => $this-> categoria_id,
			'nombre' => $this-> nombre,
			'compania' => $this-> compania,
			'precio' => $this-> precio,
			'decripcion' => $this-> decripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Videojuego Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Videojuego::where('id', $id);
            $record->delete();
        }
    }
}
