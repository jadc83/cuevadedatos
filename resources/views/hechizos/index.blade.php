<x-app-layout>
    <div class="min-h-screen bg-gray-900 flex flex-col items-center p-6">
        @if (session('error'))
            <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300 w-full max-w-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-gray-800 bg-opacity-95 shadow-lg rounded-lg p-8 border border-indigo-700 w-full max-w-xl">
            <h1 class="text-center text-5xl font-serif font-bold text-indigo-300 mb-8">Hechizos</h1>
            <div class="space-y-6">
                @foreach ($hechizos as $hechizo)
                    <a href="{{ route('hechizos.show', $hechizo) }}" class="block p-5 bg-gray-700 rounded-lg shadow-md hover:bg-gray-600 transition duration-300 transform hover:-translate-y-1">
                        <div class="flex justify-between items-center">
                            <p class="text-xl font-semibold text-white">{{ ucfirst($hechizo->nombre) }}</p>
                            <span class="text-sm text-gray-400">Contenido en: {{ $hechizo->libros->pluck('titulo')->implode(', ') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('hechizos.create') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-md shadow-lg hover:bg-indigo-500 transition duration-300 transform hover:-translate-y-1">
                    {{ ucwords('Desatar un nuevo poder arcano') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
