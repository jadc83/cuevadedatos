<x-app-layout>
    @if (session('exito'))
        <div class="p-4 mb-4 bg-green-800 text-white rounded-md shadow-md">
            {{ session('exito') }}
        </div>
    @endif
    <x-slot name="title">
        Tomo Arcano - {{ $libro->titulo }}
    </x-slot>


    <div class="min-h-screen bg-cover bg-center" style="background-image: url('/images/editar.jpg');">
        <div class="bg-black bg-opacity-70 p-10 flex items-center justify-center">
            <div class="w-full max-w-4xl bg-gray-850 rounded-lg shadow-lg overflow-hidden">
                <main class="p-8 space-y-10">
                    <!-- Sección de detalles -->
                    <section class="bg-gray-800 p-6 bg-opacity-45 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <h2 class="text-4xl font-semibold text-indigo-400 text-center mb-6">Detalles de {{ ucfirst($libro->titulo) }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-10 text-gray-300">
                            <div><strong>Autor:</strong> {{ ucfirst($libro->autor) }}</div>
                            <div><strong>Idioma:</strong> {{ ucfirst($libro->idioma) }}</div>
                            <div><strong>Año de Publicación:</strong> {{ $libro->anyo }}</div>
                            <div><strong>Coste de Cordura:</strong> {{ $libro->coste_cordura }}</div>
                            <div><strong>Semanas de Estudio:</strong> {{ $libro->coste_tiempo }}</div>
                            <div><strong>Mitos de Cthulhu:</strong> +{{ $libro->mitos }}%</div>
                            <div><strong>Uploader: {{ ucfirst($uploader->name) }}</div>
                        </div>
                    </section>

                    <!-- Sección de descripción -->
                    <section class="bg-gray-800 bg-opacity-50 p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <h2 class="text-4xl font-semibold text-indigo-400 text-center mb-6">Descripción</h2>
                        <p class="text-gray-300 italic text-left leading-relaxed">
                            {{ ucfirst($libro->descripcion) }}
                        </p>
                    </section>

                    <!-- Sección de hechizos -->
                    <section class="bg-gray-800 bg-opacity-50 p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <h2 class="text-4xl font-semibold text-indigo-400 text-center mb-6">Hechizos Contenidos</h2>
                        @if ($libro->hechizos->isEmpty())
                            <p class="text-gray-400 text-center italic">Este libro no contiene hechizos registrados.</p>
                        @else
                            <ul class="divide-y divide-gray-600">
                                @foreach ($libro->hechizos as $hechizo)
                                    <li class="py-4 hover:bg-gray-700 transition-colors duration-200">
                                        <a href="{{ route('hechizos.show', $hechizo) }}"
                                            class="block text-blue-400 hover:text-blue-300 text-center font-semibold text-lg">
                                            {{ ucfirst($hechizo->nombre) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </section>

                    <!-- Acciones -->
                    <div class="flex justify-between mt-8">
                        <a href="{{ route('libros.index') }}"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-500 transition duration-200 transform hover:scale-[1.03]">
                            Regresar al Grimorio
                        </a>
                        <a href="{{ route('libros.edit', $libro) }}"
                            class="px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                            Alterar
                        </a>
                        <form method="POST" action="{{ route('libros.destroy', $libro) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-500 transition duration-200 transform hover:scale-[1.03]">
                                Desterrar
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
