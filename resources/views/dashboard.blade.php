<x-app-layout>
    <div class="bg-cover bg-center" style="background-image: url('/images/fondo.jpg'); height: 92vh;">
        <div class="flex flex-col justify-center items-center h-full bg-black bg-opacity-50">
            <div class="max-w-4xl w-full px-4 lg:px-6">
                <div class="bg-gray-900 bg-opacity-60 text-white shadow-lg rounded-lg border border-gray-700 mb-6">
                    <div class="p-6 text-center">
                        <h1 class="text-3xl font-extrabold mb-6 tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-red-500 to-red-700 animate-pulse">
                            Ph'nglui mglw'nafh Cthulhu R'lyeh wgah'nagl fhtagn
                        </h1>
                        <p class="text-l mb-4 leading-relaxed text-gray-300">
                            "Desde las profundidades de R'lyeh, el durmiente aguarda su momento.
                            Los valientes que se atreven a descifrar sus secretos enfrentan no solo el abismo, sino también a sí mismos."
                        </p>
                        <p class="text-sm italic text-gray-400">
                            "El conocimiento es una llave, pero también una cadena. ¿Estáis preparados para lo que yace más allá de las estrellas?"
                        </p>
                    </div>
                </div>

                <!-- Sección de imágenes redondas como enlaces -->
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('libros.index')}}" class="block">
                        <div class="bg-cover bg-center rounded-full" style="background-image: url('/images/libros.png'); width: 150px; height: 150px;">
                            <!-- Contenido adicional para la imagen de libros si es necesario -->
                        </div>
                    </a>
                    <a href="{{ route('hechizos.index')}}" class="block">
                        <div class="bg-cover bg-center rounded-full" style="background-image: url('/images/hechizos.svg'); width: 150px; height: 150px;">
                            <!-- Contenido adicional para la imagen de hechizos si es necesario -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
