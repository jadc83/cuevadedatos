<x-app-layout>
    <x-slot name="title">
        Habilidad - {{ $habilidad->nombre }}
    </x-slot>

    <div class="min-h-screen bg-cover bg-center" style="background-image: url('/images/editar.jpg');">
        <div class="bg-black bg-opacity-70 p-10 flex items-center justify-center">
            <div class="w-full max-w-4xl bg-gray-850 rounded-lg shadow-lg overflow-hidden">
                <header class="bg-gray-700 bg-opacity-45 p-8 text-center border-b-4 border-indigo-600">
                    <h1 class="text-6xl font-extrabold text-white tracking-wider uppercase">{{ ucfirst($habilidad->nombre) }}</h1>
                </header>

                <main class="p-8 space-y-10">
                    <!-- Sección de detalles -->
                    <section class="bg-gray-800 p-6 bg-opacity-45 rounded-lg shadow-md border-l-4 border-indigo-500">
                        <h2 class="text-4xl font-semibold text-indigo-400 text-center mb-6">Detalles del habilidad</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-10 text-gray-300">
                            <div><strong>Nombre:</strong> {{ ucfirst($habilidad->nombre) }}</div>
                            <div><strong>Descripcion:</strong> {{ ucfirst($habilidad->descripcion) }}</div>
                            <div><strong>&base:</strong> {{ ucfirst($habilidad->acierto_base) }}</div>
                        </div>
                    </section>

                    <div class="flex justify-between mt-8">
                        <a href="{{ route('habilidades.index') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-500 transition duration-200 transform hover:scale-[1.03]">
                            Regresar a habilidades
                        </a>
                        <a href="{{ route('habilidades.edit', $habilidad) }}" class="px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                            Modificar habilidad
                        </a>
                        <form method="POST" action="{{ route('habilidades.destroy', $habilidad) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-500 transition duration-200 transform hover:scale-[1.03]">
                                Olvidar
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
