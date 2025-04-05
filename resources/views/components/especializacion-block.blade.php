<div class="text-center flex flex-col items-center bg-gray-800">
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
            <div class="w-full bg-gray-800 rounded-lg shadow transition duration-150  flex items-center justify-between">
                <!-- Nombre de la especialización -->
                <span class="text-left font-semibold text-sm text-white p-2 w-1/2 ml-4">
                    {{ $especializacion->nombre }}
                </span>

                <!-- Valores -->
                <div class="flex justify-end space-x-2 w-1/2 mr-6">
                    <div class="bg-gray-100 border border-gray-300 rounded w-12 font-medium text-gray-700 text-center">
                        {{ (int)$especializacion->pivot->puntuacion }}
                    </div>
                    <div class="bg-orange-300 border border-gray-300 rounded w-12 font-medium text-gray-800 text-center">
                        {{ floor($especializacion->pivot->puntuacion / 2) }}
                    </div>
                    <div class="bg-red-900 text-white border border-gray-300 rounded font-medium w-12 text-center">
                        {{ floor($especializacion->pivot->puntuacion / 5) }}
                    </div>
                </div>
            </div>
        </button>
    @endforeach
</div>
