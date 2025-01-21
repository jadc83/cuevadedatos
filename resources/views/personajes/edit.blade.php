<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-2"
        style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
        <form method="POST" action="{{ route('personajes.update', $personaje) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mx-auto w-3/4 max-w-3xl px-6 py-8 bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-2xl text-white font-semibold mb-6 text-center">Crear Nuevo Personaje</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="user_id">ID jugador</label>
                            <x-text-input name="user_id" type="text" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('user_id', $personaje->user_id)" />
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="profesion">Profesión</label>
                            <x-text-input name="profesion" type="text" id="profesion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('profesion', $personaje->profesion)" />
                            <x-input-error :messages="$errors->get('profesion')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="estudios">Estudios</label>
                            <x-text-input name="estudios" type="text" id="estudios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('estudios', $personaje->estudios)" />
                            <x-input-error :messages="$errors->get('estudios')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="ahorros">Ahorros</label>
                            <x-text-input name="ahorros" type="text" id="ahorros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('ahorros', $personaje->ahorros)" />
                            <x-input-error :messages="$errors->get('ahorros')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="efectivo">Efectivo</label>
                            <x-text-input name="efectivo" type="text" id="efectivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('efectivo', $personaje->efectivo)" />
                            <x-input-error :messages="$errors->get('efectivo')" class="mt-2" />
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nombre">Nombre</label>
                            <x-text-input name="nombre" type="text" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('nombre', $personaje->nombre)" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="edad">Edad</label>
                            <x-text-input name="edad" type="text" id="edad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('edad', $personaje->edad)" />
                            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nacionalidad">Nacionalidad</label>
                            <x-text-input name="nacionalidad" type="text" id="nacionalidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('nacionalidad', $personaje->nacionalidad)" />
                            <x-input-error :messages="$errors->get('nacionalidad')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="ingresos">Ingresos</label>
                            <x-text-input name="ingresos" type="text" id="ingresos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('ingresos', $personaje->ingresos)" />
                            <x-input-error :messages="$errors->get('ingresos')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-6">
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="fue">FUE</label>
                        <x-text-input name="fue" type="text" id="fue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('fue', $personaje->fue)" />
                        <x-input-error :messages="$errors->get('fue')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="con">CON</label>
                        <x-text-input name="con" type="text" id="con" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('con', $personaje->con)" />
                        <x-input-error :messages="$errors->get('con')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="des">DES</label>
                        <x-text-input name="des" type="text" id="des" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('des', $personaje->des)" />
                        <x-input-error :messages="$errors->get('des')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="tam">TAM</label>
                        <x-text-input name="tam" type="text" id="tam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('tam', $personaje->tam)" />
                        <x-input-error :messages="$errors->get('tam')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="apa">APA</label>
                        <x-text-input name="apa" type="text" id="apa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('apa', $personaje->apa)" />
                        <x-input-error :messages="$errors->get('apa')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="int">INT</label>
                        <x-text-input name="int" type="text" id="int" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('int', $personaje->int)" />
                        <x-input-error :messages="$errors->get('int')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="pod">POD</label>
                        <x-text-input name="pod" type="text" id="pod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('pod', $personaje->pod)" />
                        <x-input-error :messages="$errors->get('pod')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="edu">EDU</label>
                        <x-text-input name="edu" type="text" id="edu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('edu', $personaje->edu)" />
                        <x-input-error :messages="$errors->get('edu')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="cor">COR</label>
                        <x-text-input name="cor" type="text" id="cor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('cor', $personaje->cor)" />
                        <x-input-error :messages="$errors->get('cor')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="cordura_maxima">Cordura</label>
                        <x-text-input name="cordura_maxima" type="text" id="cordura_maxima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('cordura_maxima', $personaje->cordura_maxima)" />
                        <x-input-error :messages="$errors->get('cordura_maxima')" class="mt-2" />
                    </div>
                </div>

                <!-- Espacio para subir foto -->
                <div class="mt-6 flex flex-col items-center bg-black p-4 rounded-md">
                    <label class="text-white mb-2" for="foto">Subir foto, si no se cambia se mantendra la anterior.</label>
                    <input type="file" name="foto" id="foto" accept="image/*"
                        class="text-white file-input" />
                </div>
                             <div id="image-preview" class="mt-4">
                    <img id="preview-img" src="" alt="Vista previa" class="hidden w-48 h-48 object-cover rounded-md"/>
                </div>

                <!-- Botón de enviar -->
                <div class="flex justify-center mt-8">
                    <x-primary-button>Modificar personaje</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
