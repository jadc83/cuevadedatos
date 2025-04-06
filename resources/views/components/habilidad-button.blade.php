<button class="modificarHabilidadBtn w-full" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <div class="w-full bg-gray-800 rounded-lg">
        <div class="flex items-center justify-between px-4 py-1">
            <!-- Nombre de la habilidad -->
            <span class="text-left font-semibold text-white w-1/2 text-sm">{{ $nombre }}</span>

            <!-- Puntuaciones -->
            <div class="flex justify-end space-x-2 w-1/2">
                <div class="rounded align-middle font-medium text-black bg-white w-12 text-center">
                    {{ (int)$puntuacion }}
                </div>
                <div class="bg-orange-600 rounded w-12 font-medium text-white">
                    {{ floor((int)$puntuacion / 2) }}
                </div>
                <div class="bg-red-900 text-white border border-gray-300 w-12 rounded font-medium">
                    {{ floor((int)$puntuacion / 5) }}
                </div>
            </div>
        </div>
    </div>
</button>
