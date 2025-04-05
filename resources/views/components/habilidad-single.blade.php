<button class="modificarHabilidadBtn" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <p>
        <span class="flex justify-center w-full text-center">
            {{ (int)$puntuacion }}
        </span>
    </p>
</button>
