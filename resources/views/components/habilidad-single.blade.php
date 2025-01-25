<button class="modificarHabilidadBtn" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <p><strong>{{ $nombre }}:</strong>
        <span class="flex justify-center w-full text-center">
            | {{ (int)$puntuacion }} |
        </span>
    </p>
</button>
