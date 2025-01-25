<x-app-layout>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="min-h-screen bg-gray-900 p-2"
        style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
        <form method="POST" action="{{ route('personajes.update', $personaje) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mx-auto w-3/4 max-w-3xl px-6 py-8 bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-2xl text-white font-semibold mb-6 text-center">Crear Nuevo Personaje</h2>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="user_id">Jugador</label>
                            <select name="user_id" id="user_id" class="input-field">
                                @foreach ($users as $user)
                                    <option {{ $personaje->user_id == $user->id ? 'selected' : '' }}  value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nombre">Nombre</label>
                            <x-text-input name="nombre" type="text" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('nombre', $personaje->nombre)" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
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
