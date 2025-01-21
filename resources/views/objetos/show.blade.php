<x-app-layout>
    <x-slot name="title">
        Objeto - {{ $objeto->denominacion }}
    </x-slot>

    <div class="min-h-screen bg-cover bg-center" style="background-image: url('/images/editar.jpg');">
        <div class="p-10 flex items-center justify-center">
            <div class="w-full max-w-4xl bg-gray-850 rounded-lg shadow-lg overflow-hidden">
                <!-- Encabezado -->
                <header class="bg-gray-700 bg-opacity-45 p-8 text-center border-b-4 border-indigo-600">
                    <h1 class="text-6xl font-extrabold text-white tracking-wider uppercase">
                        {{ ucfirst($objeto->denominacion) }}
                    </h1>
                </header>

                <!-- Contenido principal -->
                <main class="p-8 space-y-10">
                    <!-- Sección de detalles -->
                    <section class="bg-gray-800 p-6 bg-opacity-45 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <h2 class="text-2xl font-bold text-indigo-400 mb-4">Detalles del Objeto</h2>
                        <div class="text-gray-300 space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-indigo-300">Descripción</h3>
                                <p class="mt-1">{{ ucfirst($objeto->descripcion) }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-indigo-300">Valor</h3>
                                <p class="mt-1">{{ $objeto->valor }}</p>
                            </div>
                        </div>
                    </section>


                    <section class="bg-gray-800 p-6 bg-opacity-45 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-indigo-400">Habilidades</h2>
                            <a href="{{ route('habilidades.create', ['objeto_id' => $objeto->id]) }}"
                                class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-500 transition duration-200 transform hover:scale-[1.03]">
                                Añadir Habilidad
                            </a>
                        </div>
                        <div class="space-y-6">
                            @forelse ($objeto->habilidades as $habilidad)
                                <div class="p-4 bg-gray-700 rounded-lg shadow-md">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-xl font-semibold text-indigo-300">{{ $habilidad->nombre }}</h3>
                                        <div class="space-x-2 flex items-center">
                                            <!-- Botón de Modificar (lápiz) -->
                                            <a href="{{ route('habilidades.edit', $habilidad) }}"
                                                class="text-blue-500 hover:text-blue-400 p-2">
                                                <!-- Icono de editar (lápiz) -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M17.621 2.379a3 3 0 00-4.242 0L4.879 9.879a2 2 0 00-.528 1.036l-1.6 5.309a1 1 0 001.22 1.22l5.309-1.6a2 2 0 001.036-.528l7.5-7.5a3 3 0 000-4.242z" />
                                                </svg>
                                            </a>

                                            <!-- Botón de Borrar (X) -->
                                            <form method="POST" action="{{ route('habilidades.destroy', $habilidad) }}" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta habilidad?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400 p-2">
                                                    <!-- Icono de X (borrar) -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M6.293 4.293a1 1 0 011.414 0L10 6.586l2.293-2.293a1 1 0 111.414 1.414L11.414 8l2.293 2.293a1 1 0 11-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 11-1.414-1.414L8.586 8 6.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-gray-300">
                                        {{ ucfirst($habilidad->descripcion) }}
                                    </p>

                                </div>
                            @empty
                                <p class="text-gray-400">Este objeto no tiene habilidades asociadas.</p>
                            @endforelse
                        </div>
                    </section>



                    <!-- Botones de acción -->
                    <div class="flex justify-between mt-8">
                        <a href="{{ route('objetos.index') }}"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-500 transition duration-200 transform hover:scale-[1.03]">
                            Regresar al inventario
                        </a>
                        <a href="{{ route('objetos.edit', $objeto) }}"
                            class="px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                            Modificar objeto
                        </a>
                        <form method="POST" action="{{ route('objetos.destroy', $objeto) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-500 transition duration-200 transform hover:scale-[1.03]">
                                Destruir
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
