<x-app-layout>
    <div class="bg-cover bg-center" style="background-image: url('/images/fondo.jpg'); height: 92vh;">
        <div class="flex flex-col justify-start items-center h-full bg-black bg-opacity-50">

            <!-- Sección de últimos libros y hechizos -->
            <div class="flex flex-wrap justify-center w-full gap-8 px-4 pt-8">

                <!-- Últimos libros -->
                <div class="w-full sm:w-80 md:w-96">
                    <div class="p-2 bg-teal-600 bg-opacity-50 border-red-700 border text-white rounded-lg shadow-xl transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos libros</h2>
                        @foreach ($ultimosLibros as $libro)
                            <a href="{{ route('libros.show', $libro->id) }}" class="block mb-2 text-center text-lg hover:text-gray-900 rounded transition duration-300">
                                {{ $libro->titulo }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Últimos hechizos -->
                <div class="w-full sm:w-80 md:w-96">
                    <div class="p-2 bg-indigo-700 border border-red-700 text-white rounded-lg shadow-xl bg-opacity-50 transition duration-300">
                        <h2 class="text-white text-3xl mb-4 text-center font-semibold">Últimos hechizos</h2>
                        @foreach ($ultimosHechizos as $hechizo)
                            <a href="{{ route('hechizos.show', $hechizo->id) }}" class="block text-center mb-2 text-lg hover:text-gray-400 rounded transition duration-300">
                                {{ $hechizo->nombre }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
