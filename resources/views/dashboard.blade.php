<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6"
        style="background-image: url('/images/fondo.jpg'); background-size: cover; background-position: center; height: 92vh;">
        <!-- Contenedor principal -->
        <div class="flex flex-wrap justify-between w-full gap-8 px-4 pt-8">

            <!-- Últimos libros -->
            <div class="w-1/6">
                <div class="p-4 sm:p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                    <h2 class="mb-4 text-center font-semibold">Nuevos libros</h2>
                    <ol class="list-decimal pl-6">
                        @foreach ($ultimosLibros as $libro)
                            <li>
                                <a href="{{ route('libros.show', $libro->id) }}"
                                    class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                    {{ $libro->titulo }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('libros.create') }}"
                        class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                        Invocar Nuevo Tomo
                    </a>
                </div>
            </div>

            <!-- Últimos hechizos -->
            <div class="w-1/6">
                <div class="p-4 sm:p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                    <h2 class="mb-4 text-center font-semibold">Nuevos hechizos</h2>
                    <ol class="list-decimal pl-6">
                        @foreach ($ultimosHechizos as $hechizo)
                            <li>
                                <a href="{{ route('hechizos.show', $hechizo->id) }}"
                                    class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                    {{ $hechizo->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('hechizos.create') }}"
                    class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                        Desatar poder arcano
                    </a>
                </div>
            </div>

            <!-- Últimos objetos -->
            <div class="w-1/6">
                <div class="p-4 sm:p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                    <h2 class="mb-4 text-center font-semibold">Nuevos objetos</h2>
                    <ol class="list-decimal pl-6">
                        @foreach ($ultimosObjetos as $objeto)
                            <li>
                                <a href="{{ route('objetos.show', $objeto->id) }}"
                                    class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                    {{ $objeto->denominacion }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>

            <!-- Últimas habilidades -->
            <div class="w-1/6">
                <div class="p-4 sm:p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                    <h2 class="mb-4 text-center font-semibold">Nuevas habilidades</h2>
                    <ol class="list-decimal pl-6">
                        @foreach ($ultimasHabilidades as $habilidad)
                            <li>
                                <a href="{{ route('habilidades.show', $habilidad->id) }}"
                                    class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                    {{ $habilidad->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('habilidades.create') }}"
                    class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                        Desarrollar nueva habilidad
                    </a>
                </div>
            </div>

            <!-- Últimos personajes -->
            <div class="w-1/6">
                <div class="p-4 sm:p-6 bg-gray-800 text-white rounded-lg shadow-xl transition duration-300">
                    <h2 class="mb-4 text-center font-semibold">Nuevos personajes</h2>
                    <ol class="list-decimal pl-6">
                        @foreach ($ultimosPersonajes as $personaje)
                            <li>
                                <a href="{{ route('personajes.show', $personaje->id) }}"
                                    class="block mb-2 text-center text-lg hover:text-red-600 rounded transition duration-300">
                                    {{ $personaje->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('personajes.create') }}"
                    class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                        Despertar a nuevo personaje
                    </a>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
