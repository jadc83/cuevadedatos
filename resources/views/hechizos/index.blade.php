<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <!-- Mensaje de error -->
                @if (session('error'))
                    <div class="mb-6 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Título y buscador -->
                <div class="text-center mb-8">
                    <form method="GET" action="{{ route('hechizos.index') }}" class="mb-4 mt-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar hechizos..." class="form-input">
                        <x-primary-button>Buscar</x-primary-button>
                    </form>
                </div>

                <!-- Lista de hechizos -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($hechizos as $hechizo)
                        <a href="{{ route('hechizos.show', $hechizo) }}" class="flex flex-col bg-gray-800 border border-gray-600 rounded-lg p-6 shadow-lg hover:bg-gray-700 transition duration-300">
                            <div class="flex-grow text-left mb-4">
                                <div class="font-semibold text-blue-400 text-xl">{{ ucfirst($hechizo->nombre) }}</div>
                            </div>
                            <div class="text-sm text-gray-300">
                                <span class="block">Contenido en: {{ $hechizo->libros->pluck('titulo')->implode(', ') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-8 text-white">
                    {{ $hechizos->links('pagination::tailwind') }}
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
