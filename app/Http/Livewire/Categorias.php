<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $numero_jugadores, $competencia, $descripcion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.categorias.view', [
            'categorias' => Categoria::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('numero_jugadores', 'LIKE', $keyWord)
						->orWhere('competencia', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->tipo = null;
		$this->numero_jugadores = null;
		$this->competencia = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'numero_jugadores' => 'required',
		'competencia' => 'required',
		'descripcion' => 'required',
        ]);

        Categoria::create([ 
			'tipo' => $this-> tipo,
			'numero_jugadores' => $this-> numero_jugadores,
			'competencia' => $this-> competencia,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Categoria Successfully created.');
    }

    public function edit($id)
    {
        $record = Categoria::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->numero_jugadores = $record-> numero_jugadores;
		$this->competencia = $record-> competencia;
		$this->descripcion = $record-> descripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'numero_jugadores' => 'required',
		'competencia' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Categoria::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'numero_jugadores' => $this-> numero_jugadores,
			'competencia' => $this-> competencia,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Categoria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Categoria::where('id', $id);
            $record->delete();
        }
    }
}
