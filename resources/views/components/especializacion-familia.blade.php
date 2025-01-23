<div class="border-solid border-2">
    <button id="{{ Str::slug($nombreMostrar) }}Btn" class="text-white font-bold underline" data-familia="{{ $nombreMostrar }}">
        {{ $nombreMostrar }}
    </button>
    @foreach ($personaje->especializaciones as $especializacion)
        @if ($especializacion->familia->nombre === $nombreFamilia)
            <p>
                <strong>{{ $especializacion->nombre }}</strong>
                <span class="flex justify-center w-full text-center">
                    | {{ $especializacion->pivot->puntuacion }} |
                    {{ floor($especializacion->pivot->puntuacion / 2) }} |
                    {{ floor($especializacion->pivot->puntuacion / 5) }} |
                </span>
            </p>
        @endif
    @endforeach
</div>
