<x-app-layout>
    <x-slot name="title">
        Tomo Arcano - {{ $libro->titulo }}
    </x-slot>

    <div class="min-h-screen bg-gray-900 bg-opacity-80 text-gray-300 text-lg">
        <main class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="mb-4 bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Advertencia!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg overflow-hidden mb-6">
                <h2 class="text-center text-3xl font-bold text-green-500 py-4">Tomo Prohibido</h2>
                <ul class="divide-y divide-gray-700">
                    <li class="px-6 py-4 text-center text-xl">{{ ucfirst($libro->titulo) }}</li>
                    <li class="px-6 py-4 text-center">Escrito por el Ocultista: {{ ucfirst($libro->autor) }}</li>
                    <li class="px-6 py-4 text-center">Año de Manifestación: {{ ucfirst($libro->anyo) }}</li>
                </ul>
            </div>

            <div class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg overflow-hidden mb-6">
                <ul class="px-6 py-4">
                    <li class="text-red-400 text-center">
                        Coste de Cordura: <span class="font-bold">{{ ucfirst($libro->coste_cordura) }}</span> |
                        Ciclos Lunares de Estudio: <span class="font-bold">{{ucfirst($libro->coste_tiempo)}}</span> |
                        Revelaciones de los Mitos: <span class="font-bold">{{ ucfirst($libro->mitos) }}</span>
                    </li>
                </ul>
            </div>

            <div class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg overflow-hidden mb-6">
                <h2 class="text-center text-2xl font-semibold text-green-500 py-4">Revelaciones Arcanas</h2>
                <p class="px-6 py-4 text-center italic">{{ ucfirst($libro->descripcion) }}</p>
            </div>

            <div class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg overflow-hidden mb-6">
                <h2 class="text-center text-2xl font-semibold text-green-500 py-4">Hechizos Contenidos</h2>
                <ul class="divide-y divide-gray-700">
                    @foreach ($libro->hechizos as $hechizo)
                        <li class="px-6 py-4 text-center hover:bg-gray-700 transition-colors duration-200">
                            <a href="{{ route('hechizos.show', $hechizo) }}" class="block text-gray-300 hover:text-blue-400">
                                {{ ucfirst($hechizo->nombre) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="flex justify-center mt-6 space-x-4">
                <a href="{{ route('libros.index') }}" class="px-6 py-3 bg-green-700 text-white rounded-md hover:bg-green-600 transition-colors duration-200">
                    Regresar al Grimorio
                </a>
                <a href="{{ route('libros.edit', $libro) }}" class="px-6 py-3 bg-orange-700 text-white rounded-md hover:bg-green-600 transition-colors duration-200">Alterar</a>
                <form method="POST" action="{{ route('libros.destroy', $libro) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-700 text-white rounded-md hover:bg-green-600 transition-colors duration-200">Desterrar</button>
                </form>
            </div>

        </main>
    </div>
</x-app-layout>
