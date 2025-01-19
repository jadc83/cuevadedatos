@props(['investigadores'])

<div>
    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf <!-- Asegúrate de incluir el token CSRF -->

        @if ($errors->any())
            <div class="mt-2 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <select name="selector" id="selector" class="w-[22em] p-2 h-8 text-sm mt-2">
                @foreach ($investigadores as $investigador)
                    <option value="{{ $investigador->id }}">
                        Contestar como {{ $investigador->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-2 p-2 bg-blue-500 text-white">Enviar</button>
    </form>
</div>
