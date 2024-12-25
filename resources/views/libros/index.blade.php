<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6">
        <div class="w-full max-w-5xl mx-auto p-6 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg border border-green-700">
            <main>
                @if (session()->has('error'))
                    <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                        <strong>¡Advertencia!</strong>
                        <span>{{ session()->get('error') }}</span>
                    </div>
                @endif

                <h1 class="text-4xl font-bold text-center text-green-500 mb-6 font-serif tracking-wide">Cueva de Datos</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($libros as $libro)
                        <a href="{{ route('libros.show', $libro) }}" class="bg-gray-700 border border-gray-600 rounded-lg p-6 shadow-md hover:bg-gray-600 transition duration-200">
                            <div class="font-semibold text-blue-400 text-lg mb-3">{{ $libro->titulo }}</div>
                            <div class="text-sm text-gray-300 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span>+ {{ $libro->mitos }}% Mitos de Cthulhu</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Coste de lectura: -{{ $libro->coste_cordura }} COR</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Semanas de estudio: {{ $libro->coste_tiempo }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Año de publicación: {{ $libro->anyo }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $libros->links('pagination::tailwind') }}
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('libros.create') }}" class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                        Invocar Nuevo Tomo
                    </a>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
