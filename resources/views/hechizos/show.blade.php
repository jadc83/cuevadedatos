<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-[40em] mx-auto bg-white mt-4 shadow-md sm:rounded-lg">
        <h2 class="text-center text-xl font-semibold pt-2">Categoría</h2>
        <ul class="text-center">
            <li class="p-3">{{ ucfirst($hechizo->categoria->denominacion) }}</li>
        </ul>
    </div>

    <div class="w-[40em] mx-auto bg-white shadow-md sm:rounded-lg mt-4">
        <h2 class="text-center text-xl font-semibold">Nombre</h2>
        <ul>
            <li class="text-center p-3">{{ ucfirst($hechizo->nombre) }}</li>
        </ul>
    </div>

    <div class="w-[40em] mx-auto bg-white shadow-md sm:rounded-lg mt-4">
        <h2 class="text-center text-xl font-semibold">Coste</h2>
        <ul>
            <li class="text-center p-3">{{ ucfirst($hechizo->coste) }}</li>
        </ul>
    </div>

    <div class="w-[40em] mx-auto bg-white shadow-md sm:rounded-lg mt-4">
        <h2 class="text-center text-xl font-semibold">Tiempo de Ejecución</h2>
        <ul>
            <li class="text-center p-3">{{ ucfirst($hechizo->turnos) }}</li>
        </ul>
    </div>

    <div class="w-[40em] mx-auto bg-white shadow-md sm:rounded-lg mt-4">
        <h2 class="text-center text-xl font-semibold">Efectos</h2>
        <ul class="text-center">
            <li class="p-3">{!! nl2br(e($hechizo->efecto)) !!}</li>
        </ul>
    </div>

    <div class="w-[40em] mx-auto bg-white shadow-md sm:rounded-lg mt-4">
        <h2 class="text-center text-xl font-semibold">Magia Intensificada</h2>
        <ul class="text-center">
            <li class="p-3">{{ $hechizo->intensificada }}</li>
        </ul>
    </div>

    <div class="flex justify-center items-center mt-4">
        <form action="{{ route('hechizos.destroy', $hechizo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este hechizo?');" class="mr-4">
            @csrf
            @method('DELETE')
            <x-danger-button type="submit">Eliminar Hechizo</x-danger-button>
        </form>

        <x-primary-button><a href="{{ route('hechizos.edit', $hechizo->id) }}">Editar Hechizo</a></x-primary-button>
        <x-primary-button class="ml-4"><a href="{{ route('hechizos.index') }}">Volver</a></x-primary-button>
    </div>

</x-app-layout>
