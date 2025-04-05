<button class="modificarHabilidadBtn w-full" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <div class="w-full bg-gray-800 rounded-lg">
        <div class="flex items-center justify-between px-4 py-1">
            <!-- Nombre de la habilidad -->
            <span class="text-left font-semibold text-white w-1/2 text-sm">{{ $nombre }}</span>

            <!-- Puntuaciones -->
            <div class="flex justify-end space-x-2 w-1/2">
                <div class="bg-gray-100 border border-gray-300 rounded align-middle font-medium text-gray-700 w-[4em] text-center">
                    {{ (int)$puntuacion }}
                </div>
                <div class="bg-orange-300 border border-gray-300 rounded w-[4em] font-medium text-gray-800">
                    {{ floor((int)$puntuacion / 2) }}
                </div>
                <div class="bg-red-400 text-black border border-gray-300 w-[4em] rounded font-medium">
                    {{ floor((int)$puntuacion / 5) }}
                </div>
            </div>
        </div>
    </div>
</button>
