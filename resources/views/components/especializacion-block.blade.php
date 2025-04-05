<div class="text-center flex flex-col items-center space-y-2 bg-gray-800">
    <!-- Botón de familia -->
    <button id="{{ strtolower(str_replace(' ', '_', $familia)) }}Btn" class=" font-bold text-base underline mb-2" data-familia="{{ $familia }}">
        {{ $familia }}
    </button>

    <!-- Lista de especializaciones -->
    @foreach ($especializaciones as $especializacion)
        <button class="especializacionBtn w-full"
                data-especializacion-id="{{ $especializacion->id }}"
                data-especializacion-nombre="{{ $especializacion->nombre }}"
                data-especializacion-puntuacion="{{ $especializacion->pivot->puntuacion }}">
            <div class="w-full bg-gray-800 rounded-lg shadow transition duration-150 px-4 py-3 flex items-center justify-between">
                <!-- Nombre de la especialización -->
                <span class="text-left font-semibold text-sm text-white p-2 w-1/2">
                    {{ $especializacion->nombre }}
                </span>

                <!-- Valores -->
                <div class="flex justify-end space-x-2 w-1/2">
                    <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1 text-xs font-medium text-gray-700 w-12 text-center">
                        {{ (int)$especializacion->pivot->puntuacion }}
                    </div>
                    <div class="bg-orange-300 border border-gray-300 rounded px-2 py-1 text-xs font-medium text-gray-800 w-12 text-center">
                        {{ floor($especializacion->pivot->puntuacion / 2) }}
                    </div>
                    <div class="bg-red-400 text-black border border-gray-300 rounded px-2 py-1 text-xs font-medium w-12 text-center">
                        {{ floor($especializacion->pivot->puntuacion / 5) }}
                    </div>
                </div>
            </div>
        </button>
    @endforeach
</div>
