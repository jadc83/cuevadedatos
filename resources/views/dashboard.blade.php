<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/fondo.jpg'); background-size: cover; background-position: center; height: 92vh;">
            <!-- Sección de últimos libros y hechizos -->
            <div class="flex flex-wrap justify-center w-full gap-8 px-4 pt-8">

                <!-- Últimos libros -->
                <div class="w-full sm:w-80 md:w-96">
                    <div class="p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos 5 libros</h2>
                        <ol class="list-decimal pl-6">
                            @foreach ($ultimosLibros as $libro)
                                <li>
                                    <a href="{{ route('libros.show', $libro->id) }}" class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                        {{ $libro->titulo }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    <!-- Botón para crear nuevo libro -->
                    <div class="mt-8 text-center">
                        <a href="{{ route('libros.create') }}" class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                            Invocar Nuevo Tomo
                        </a>
                    </div>
                </div>

                <!-- Últimos hechizos -->
                <div class="w-full sm:w-80 md:w-96">
                    <div class="p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos 5 hechizos</h2>
                        <ol class="list-decimal pl-6">
                            @foreach ($ultimosHechizos as $hechizo)
                                <li>
                                    <a href="{{ route('libros.show', $hechizo->id) }}" class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                        {{ $hechizo->nombre }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    <!-- Botón para crear nuevo hechizo -->
                    <div class="mt-8 text-center">
                        <a href="{{ route('hechizos.create') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-md shadow-lg hover:bg-indigo-500 transition duration-300 transform hover:-translate-y-1">
                            Desatar poder arcano
                        </a>
                    </div>
                </div>

            </div>
        </div>
</x-app-layout>
