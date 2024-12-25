<x-app-layout>
    <x-slot name="title">
        Tomo Arcano - {{ $libro->titulo }}
    </x-slot>

    <div class="min-h-screen bg-gray-900 p-6">
        <div class="w-full max-w-5xl mx-auto p-6 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg border border-green-700">
            <main>
                @if (session('error'))
                    <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                        <strong>¡Advertencia!</strong>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <h1 class="text-4xl font-bold text-center text-green-500 mb-6 font-serif tracking-wide">Tomo Arcano</h1>

                <div class="bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-semibold text-center text-green-400 mb-4">Detalles del Tomo</h2>
                    <ul class="space-y-2 text-gray-300">
                        <li><strong>Título:</strong> {{ ucfirst($libro->titulo) }}</li>
                        <li><strong>Autor:</strong> {{ ucfirst($libro->autor) }}</li>
                        <li><strong>Año de Publicación:</strong> {{ $libro->anyo }}</li>
                        <li><strong>Coste de Cordura:</strong> {{ $libro->coste_cordura }}</li>
                        <li><strong>Semanas de Estudio:</strong> {{ $libro->coste_tiempo }}</li>
                        <li><strong>Mitos de Cthulhu:</strong> +{{ $libro->mitos }}%</li>
                    </ul>
                </div>

                <div class="bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-semibold text-center text-green-400 mb-4">Descripción</h2>
                    <p class="text-gray-300 italic text-center">{{ ucfirst($libro->descripcion) }}</p>
                </div>

                <div class="bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-semibold text-center text-green-400 mb-4">Hechizos Contenidos</h2>
                    <ul class="divide-y divide-gray-600">
                        @foreach ($libro->hechizos as $hechizo)
                            <li class="py-4 hover:bg-gray-600 transition-colors duration-200">
                                <a href="{{ route('hechizos.show', $hechizo) }}" class="block text-blue-400 hover:text-blue-300 text-center">
                                    {{ ucfirst($hechizo->nombre) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex justify-center space-x-4 mt-6">
                    <a href="{{ route('libros.index') }}" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                        Regresar al Grimorio
                    </a>
                    <a href="{{ route('libros.edit', $libro) }}" class="px-6 py-3 bg-orange-500 text-white rounded-lg shadow-md hover:bg-orange-600 transition duration-200">
                        Alterar
                    </a>
                    <form method="POST" action="{{ route('libros.destroy', $libro) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition duration-200">
                            Desterrar
                        </button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
