<!-- resources/views/components/comentarios.blade.php -->
@props(['comentario'])

<div class="bg-white p-4 rounded-lg shadow-md mb-4 border border-gray-300">
    <div class="text-black font-semibold mb-2 flex flex-col space-y-2">
        <p class="text-xs">{{$comentario->personaje->nombre}} dice:</p>
        <p class="text-xs">{{$comentario->contenido}}</p>
    </div>

    @if($comentario->comentarios->isNotEmpty())
        <div class="mt-4 pl-4">
            @foreach ($comentario->comentarios as $respuesta)
                <x-comentarios :comentario="$respuesta" />
            @endforeach
        </div>
    @endif
</div>
