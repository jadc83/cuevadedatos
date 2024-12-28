<x-app-layout>
    <div class="bg-cover bg-center" style="background-image: url('/images/fondo.jpg'); height: 92vh;">
        <div class="flex flex-col justify-start items-center h-full bg-black bg-opacity-50">

            <!-- Sección de últimos libros y hechizos -->
            <div class="flex flex-wrap justify-center w-full gap-8 px-4 pt-8">

                <!-- Últimos libros -->
                <div class="w-full sm:w-80 md:w-96">
                    <div class="p-2 bg-teal-600 bg-opacity-50 border-red-700 border text-white rounded-lg shadow-xl transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos 5 libros</h2>
                        @foreach ($ultimosLibros as $libro)
                            <a href="{{ route('libros.show', $libro->id) }}" class="block mb-2 text-center text-lg hover:text-gray-900 rounded transition duration-300">
                                {{ $libro->titulo }}
                            </a>
                        @endforeach
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
                    <div class="p-2 bg-indigo-700 border border-red-700 text-white rounded-lg shadow-xl bg-opacity-50 transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos 5 hechizos</h2>
                        @foreach ($ultimosHechizos as $hechizo)
                            <a href="{{ route('hechizos.show', $hechizo->id) }}" class="block text-center mb-2 text-lg hover:text-gray-400 rounded transition duration-300">
                                {{ $hechizo->nombre }}
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('hechizos.create') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-md shadow-lg hover:bg-indigo-500 transition duration-300 transform hover:-translate-y-1">
                            Desatar poder arcano
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
