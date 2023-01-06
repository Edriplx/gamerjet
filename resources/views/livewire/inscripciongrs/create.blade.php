<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Inscripción Grupal</h5>
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
                <label for="equipo_id"></label>
                <select wire:model="equipo_id" type="text" class="form-control" id="equipo_id"
                <option>Seleccione</option>
                @foreach($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre_equipo}}</option>
                @endforeach
                </select>
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
