<x-app-layout>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center p-6">
        <div class="bg-gray-800 bg-opacity-90 shadow-2xl rounded-lg p-8 border border-purple-700 w-full max-w-3xl space-y-6">
            @if (session('error'))
                <div class="p-4 mb-4 bg-red-800 text-white rounded-md shadow-md">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="p-4 mb-4 bg-green-800 text-white rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-4xl font-bold text-purple-400 text-center mb-6 font-serif tracking-wider">Detalles del Hechizo</h2>

            <div class="space-y-4">
                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Categoría</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{{ ucfirst($hechizo->categoria->nombre) }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Nombre</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{{ ucfirst($hechizo->nombre) }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Coste</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{{ ucfirst($hechizo->coste) }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Tiempo de Ejecución</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{{ ucfirst($hechizo->turnos) }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Efectos</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{!! nl2br(e($hechizo->efecto)) !!}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-purple-300">Magia Intensificada</h3>
                    <ul class="mt-1 p-3 bg-gray-700 text-purple-300 rounded-md">
                        <li>{{ $hechizo->intensificada }}</li>
                    </ul>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <form action="{{ route('hechizos.destroy', $hechizo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este hechizo?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-700 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 shadow-lg">
                        Eliminar Hechizo
                    </button>
                </form>

                <div class="flex space-x-4">
                    <a href="{{ route('hechizos.edit', $hechizo->id) }}" class="px-6 py-3 bg-blue-700 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-lg">
                        Editar Hechizo
                    </a>
                    <a href="{{ route('hechizos.index') }}" class="px-6 py-3 bg-purple-700 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 shadow-lg">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
