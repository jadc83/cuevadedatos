<button class="modificarHabilidadBtn" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">
    <p><strong>{{ $nombre }}:</strong>
        <span class="flex justify-center w-full text-center">
            | {{ (int)$puntuacion }} | {{ floor((int)$puntuacion / 2) }} | {{ floor((int)$puntuacion / 5) }} |
        </span>
    </p>
</button>
