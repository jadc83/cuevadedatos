<x-app-layout>
    <div class="min-h-screen bg-gray-900 flex flex-col items-center p-6">
        @if (session('error'))
            <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300 w-full max-w-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg p-6 border border-purple-700 w-full max-w-3xl">
            <h1 class="text-center text-3xl font-bold text-purple-400 mb-6">Hechizos</h1>
            <div class="space-y-4">
                @foreach ($hechizos as $hechizo)
                    <a href="{{ route('hechizos.show', $hechizo) }}" class="block p-4 bg-gray-700 rounded-lg shadow-md hover:bg-gray-600 transition duration-200">
                        <div class="flex justify-between items-center">
                            <p class="text-xl font-semibold text-purple-300">{{ ucfirst($hechizo->nombre) }}</p>
                            <span class="text-sm text-gray-400">Contenido en: {{ $hechizo->libros->pluck('titulo')->implode(', ') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('hechizos.create') }}" class="px-6 py-3 bg-purple-600 text-white font-bold rounded-md shadow-lg hover:bg-purple-700 transition duration-200">
                    {{ ucwords('Desatar un nuevo poder arcano') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
