<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <!-- Título y mensaje de advertencia -->
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-semibold text-white">Explora los Tomos Arcanos</h1>

                    <form method="GET" action="{{ route('libros.index') }}" class="mb-4 mt-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar libros..." class="form-input">
                        <x-primary-button>Buscar</x-primary-buttonx>
                    </form>


                    @if (session()->has('error'))
                        <div class="mt-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                            <strong>¡Advertencia!</strong>
                            <span>{{ session()->get('error') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Lista de libros -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($libros as $libro)
                        <a href="{{ route('libros.show', $libro) }}" class="flex flex-col bg-gray-800 border border-gray-600 rounded-lg p-6 shadow-lg hover:bg-gray-700 transition duration-300">
                            <div class="flex-grow text-left mb-4">
                                <div class="font-semibold text-blue-400 text-xl">{{ $libro->titulo }}</div>
                            </div>
                            <div class="text-sm text-gray-300 space-y-2">
                                <div class="flex items-center">
                                    <i class="fas fa-book mr-2"></i><span>+{{ $libro->mitos }}% Mitos de Cthulhu</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-brain mr-2"></i><span>Coste de cordura -{{ $libro->coste_cordura }} COR</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i><span>Tiempo de estudio {{ $libro->coste_tiempo }} semanas</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i><span>{{ $libro->anyo }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-8 text-white">
                    {{ $libros->links('pagination::tailwind') }}
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
