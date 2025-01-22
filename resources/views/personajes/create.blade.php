<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-2"
        style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
        <form method="POST" action="{{ route('personajes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mx-auto w-3/4 max-w-3xl px-6 py-8 bg-gray-800 rounded-lg shadow-lg">
                <!-- Ancho más reducido con márgenes -->

                <!-- Título o encabezado -->
                <h2 class="text-2xl text-white font-semibold mb-6 text-center">Crear Nuevo Personaje</h2>

                <!-- Formulario de datos del personaje -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Columna izquierda (Datos básicos) -->
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="user_id">Jugador</label>
                            <select name="user_id" id="user_id" class="input-field">
                                @foreach ($users as $user)
                                    <option {{ auth()->user()->id == $user->id ? 'selected' : '' }}  value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="profesion">Profesión</label>
                            <input type="text" name="profesion" id="profesion"  class="input-field" />
                            <x-input-error :messages="$errors->get('profesion')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="estudios">Estudios</label>
                            <input type="text" name="estudios" id="estudios"  class="input-field" />
                            <x-input-error :messages="$errors->get('estudios')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="ahorros">Ahorros</label>
                            <input type="number" name="ahorros" id="ahorros" class="input-field" />
                            <x-input-error :messages="$errors->get('ahorros')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="efectivo">Efectivo</label>
                            <input type="number" name="efectivo" id="efectivo" class="input-field" />
                            <x-input-error :messages="$errors->get('efectivo')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Columna derecha (Datos personales) -->
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre"  class="input-field" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="edad">Edad</label>
                            <input type="number" name="edad" id="edad"  class="input-field" />
                            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nacionalidad">Nacionalidad</label>
                            <input type="text" name="nacionalidad" id="nacionalidad"  class="input-field" />
                            <x-input-error :messages="$errors->get('nacionalidad')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="ingresos">Ingresos</label>
                            <input type="number" name="ingresos" id="ingresos" class="input-field" />
                            <x-input-error :messages="$errors->get('ingresos')" class="mt-2" />
                        </div>
                    </div>

                </div>
                <h2 class="text-xl text-white font-semibold mb-6 text-center">Características</h2>

                <!-- Características del personaje -->
                <div class="mt-6 grid grid-cols-2 gap-6">
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="fue">FUE</label>
                        <input type="number" name="fue" id="fue"  class="input-field" />
                        <x-input-error :messages="$errors->get('fue')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="con">CON</label>
                        <input type="number" name="con" id="con"  class="input-field" />
                        <x-input-error :messages="$errors->get('con')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="des">DES</label>
                        <input type="number" name="des" id="des"  class="input-field" />
                        <x-input-error :messages="$errors->get('des')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="tam">TAM</label>
                        <input type="number" name="tam" id="tam"  class="input-field" />
                        <x-input-error :messages="$errors->get('tam')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="apa">APA</label>
                        <input type="number" name="apa" id="apa"  class="input-field" />
                        <x-input-error :messages="$errors->get('apa')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="int">INT</label>
                        <input type="number" name="int" id="int"  class="input-field" />
                        <x-input-error :messages="$errors->get('int')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="pod">POD</label>
                        <input type="number" name="pod" id="pod"  class="input-field" />
                        <x-input-error :messages="$errors->get('pod')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="edu">EDU</label>
                        <input type="number" name="edu" id="edu"  class="input-field" />
                        <x-input-error :messages="$errors->get('edu')" class="mt-2" />
                    </div>
                    <div class="flex flex-col bg-black p-4 rounded-md">
                        <label class="text-white" for="edu">Suerte</label>
                        <input type="number" name="sue" id="sue" class="input-field" />
                        <x-input-error :messages="$errors->get('sue')" class="mt-2" />
                    </div>

                </div>

                <!-- Espacio para subir foto -->
                <div class="mt-6 flex flex-col items-center bg-black p-4 rounded-md">
                    <label class="text-white mb-2" for="foto">Subir foto</label>
                    <input type="file" name="foto" id="foto" accept="image/*"
                        class="text-white file-input" />
                </div>
                             <div id="image-preview" class="mt-4">
                    <img id="preview-img" src="" alt="Vista previa" class="hidden w-48 h-48 object-cover rounded-md"/>
                </div>

                <!-- Botón de enviar -->
                <div class="flex justify-center mt-8">
                    <x-primary-button>Crear personaje</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
