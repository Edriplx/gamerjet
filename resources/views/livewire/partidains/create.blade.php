<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Partida Individual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                <div class="form-group">
                <label for="videojuego_id"></label>
                <select wire:model="videojuego_id" type="text" class="form-control" id="videojuego_id"
                <option>Seleccione</option>
                @foreach($videojuegos as $videojuego)
                <option value="{{$videojuego->id}}">{{$videojuego->nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jugador_id"></label>
                <select wire:model="jugador_id" type="text" class="form-control" id="jugador_id"
                <option>Seleccione</option>
                @foreach($jugadores as $jugadore)
                <option value="{{$jugadore->id}}">{{$jugadore->nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tiempo_inicio"></label>
                <input wire:model="tiempo_inicio" type="text" class="form-control" id="tiempo_inicio" placeholder="Tiempo Inicio">@error('tiempo_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha"></label>
                <input wire:model="fecha" type="text" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="observacion"></label>
                <input wire:model="observacion" type="text" class="form-control" id="observacion" placeholder="Observacion">@error('observacion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
