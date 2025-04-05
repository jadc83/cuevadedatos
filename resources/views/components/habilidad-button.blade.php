<button class="modificarHabilidadBtn w-full" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <div class="w-full bg-gray-800 rounded-lg">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Nombre de la habilidad -->
            <span class="text-left font-semibold text-white w-1/2">{{ $nombre }}</span>

            <!-- Puntuaciones -->
            <div class="flex justify-end space-x-2 w-1/2">
                <div class="bg-gray-100 border border-gray-300 rounded px-3 py-1 text-sm font-medium text-gray-700">
                    {{ (int)$puntuacion }}
                </div>
                <div class="bg-orange-300 border border-gray-300 rounded px-3 py-1 text-sm font-medium text-gray-800">
                    {{ floor((int)$puntuacion / 2) }}
                </div>
                <div class="bg-red-400 text-black border border-gray-300 rounded px-3 py-1 text-sm font-medium">
                    {{ floor((int)$puntuacion / 5) }}
                </div>
            </div>
        </div>
    </div>
</button>
