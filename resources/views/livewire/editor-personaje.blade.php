<div>
    {{-- Do your work, then step back. --}}
    <select name="personaje_id" wire:model="principal">
        <option value="ahola">Selecciona un personaje</option> <!-- Opción predeterminada -->
        @foreach ($personajes as $personaje)
            <option value="{{ $personaje->id }}">{{ $personaje->nombre }}</option>
        @endforeach
    </select>
        <p>Personaje seleccionado: {{ $principal }}</p>
</div>