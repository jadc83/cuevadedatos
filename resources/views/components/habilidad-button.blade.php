<button class="modificarHabilidadBtn w-60" data-habilidad-id="{{ $habilidadId }}" data-puntuacion="{{ $puntuacion }}" data-nombre="{{ $nombre }}">

    <table class="w-full border-collapse border border-gray-300 shadow-lg rounded-lg text-center">
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-bold">{{ $nombre }}:</td>
                <td class="border border-gray-300 px-4 py-2">{{ (int)$puntuacion }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ floor((int)$puntuacion / 2) }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ floor((int)$puntuacion / 5) }}</td>
            </tr>
        </tbody>
    </table>


</button>
