<div class="border-solid border-2 text-center flex flex-col items-center space-y-2">
    <button id="{{ strtolower(str_replace(' ', '_', $familia)) }}Btn" class="text-white font-bold underline" data-familia="{{ $familia }}">
        {{ $familia }}
    </button>
    @foreach ($especializaciones as $especializacion)
        <button class="especializacionBtn"
                data-especializacion-id="{{ $especializacion->id }}"
                data-especializacion-nombre="{{ $especializacion->nombre }}"
                data-especializacion-puntuacion="{{ $especializacion->pivot->puntuacion }}">
            <strong>{{ $especializacion->nombre }}</strong>
            <span class="flex justify-center w-full text-center">
                | {{ $especializacion->pivot->puntuacion }} |
                {{ floor($especializacion->pivot->puntuacion / 2) }} |
                {{ floor($especializacion->pivot->puntuacion / 5) }} |
            </span>
        </button>
    @endforeach
</div>
