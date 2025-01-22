<x-app-layout>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="min-h-screen bg-gray-900 p-2"
        style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
        <form method="POST" action="{{ route('personajes.updateHabilidades', $personaje) }}">
            @method('PUT')
            @csrf
            <div class="mx-auto w-3/4 max-w-3xl px-6 py-8 bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-2xl text-white font-semibold mb-6 text-center">Modificar habilidades</h2>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="antropologia">Antropología</label>
                            <x-text-input name="antropologia" type="text" id="antropologia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('antropologia', $personaje->antropologia)" />
                            <x-input-error :messages="$errors->get('antropologia')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="arqueologia">Arqueología</label>
                            <x-text-input name="arqueologia" type="text" id="arqueologia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('arqueologia', $personaje->arqueologia)" />
                            <x-input-error :messages="$errors->get('arqueologia')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="arte_artesania">Arte/Artesanía</label>
                            <x-text-input name="arte_artesania" type="text" id="arte_artesania" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('arte_artesania', $personaje->arte_artesania)" />
                            <x-input-error :messages="$errors->get('arte_artesania')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="buscar_libros">Buscar Libros</label>
                            <x-text-input name="buscar_libros" type="text" id="buscar_libros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('buscar_libros', $personaje->buscar_libros)" />
                            <x-input-error :messages="$errors->get('buscar_libros')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="cerrajeria">Cerrajería</label>
                            <x-text-input name="cerrajeria" type="text" id="cerrajeria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('cerrajeria', $personaje->cerrajeria)" />
                            <x-input-error :messages="$errors->get('cerrajeria')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="charlataneria">Charlatanería</label>
                            <x-text-input name="charlataneria" type="text" id="charlataneria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('charlataneria', $personaje->charlataneria)" />
                            <x-input-error :messages="$errors->get('charlataneria')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="ciencias_ocultas">Ciencias Ocultas</label>
                            <x-text-input name="ciencias_ocultas" type="text" id="ciencias_ocultas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('ciencias_ocultas', $personaje->ciencias_ocultas)" />
                            <x-input-error :messages="$errors->get('ciencias_ocultas')" class="mt-2" />
                        </div>

                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="conducir_automovil">Conducir Automóvil</label>
                            <x-text-input name="conducir_automovil" type="text" id="conducir_automovil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :value="old('conducir_automovil', $personaje->conducir_automovil)" />
                            <x-input-error :messages="$errors->get('conducir_automovil')" class="mt-2" />
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="conducir_maquinaria">Conducir Maquinaria</label>
                            <x-text-input name="conducir_maquinaria" type="text" id="conducir_maquinaria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('conducir_maquinaria', $personaje->conducir_maquinaria)" />
                            <x-input-error :messages="$errors->get('conducir_maquinaria')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="contabilidad">Contabilidad</label>
                            <x-text-input name="contabilidad" type="text" id="contabilidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('contabilidad', $personaje->contabilidad)" />
                            <x-input-error :messages="$errors->get('contabilidad')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="credito">Crédito</label>
                            <x-text-input name="credito" type="text" id="credito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('credito', $personaje->credito)" />
                            <x-input-error :messages="$errors->get('credito')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="derecho">Derecho</label>
                            <x-text-input name="derecho" type="text" id="derecho" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('derecho', $personaje->derecho)" />
                            <x-input-error :messages="$errors->get('derecho')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="descubrir">Descubrir</label>
                            <x-text-input name="descubrir" type="text" id="descubrir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('descubrir', $personaje->descubrir)" />
                            <x-input-error :messages="$errors->get('descubrir')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="disfrazarse">Disfrazarse</label>
                            <x-text-input name="disfrazarse" type="text" id="disfrazarse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('disfrazarse', $personaje->disfrazarse)" />
                            <x-input-error :messages="$errors->get('disfrazarse')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="electricidad">Electricidad</label>
                            <x-text-input name="electricidad" type="text" id="electricidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('electricidad', $personaje->electricidad)" />
                            <x-input-error :messages="$errors->get('electricidad')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="encanto">Encanto</label>
                            <x-text-input name="encanto" type="text" id="encanto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('encanto', $personaje->encanto)" />
                            <x-input-error :messages="$errors->get('encanto')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="equitación">Equitación</label>
                            <x-text-input name="equitación" type="text" id="equitación" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('equitación', $personaje->equitación)" />
                            <x-input-error :messages="$errors->get('equitación')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="escuchar">Escuchar</label>
                            <x-text-input name="escuchar" type="text" id="escuchar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('escuchar', $personaje->escuchar)" />
                            <x-input-error :messages="$errors->get('escuchar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="esquivar">Esquivar</label>
                            <x-text-input name="esquivar" type="text" id="esquivar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('esquivar', $personaje->esquivar)" />
                            <x-input-error :messages="$errors->get('esquivar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="historia">Historia</label>
                            <x-text-input name="historia" type="text" id="historia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('historia', $personaje->historia)" />
                            <x-input-error :messages="$errors->get('historia')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="intimidar">Intimidar</label>
                            <x-text-input name="intimidar" type="text" id="intimidar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('intimidar', $personaje->intimidar)" />
                            <x-input-error :messages="$errors->get('intimidar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="juego_de_manos">Juego de Manos</label>
                            <x-text-input name="juego_de_manos" type="text" id="juego_de_manos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('juego_de_manos', $personaje->juego_de_manos)" />
                            <x-input-error :messages="$errors->get('juego_de_manos')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="lanzar">Lanzar</label>
                            <x-text-input name="lanzar" type="text" id="lanzar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('lanzar', $personaje->lanzar)" />
                            <x-input-error :messages="$errors->get('lanzar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="mecanica">Mecánica</label>
                            <x-text-input name="mecanica" type="text" id="mecanica" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('mecanica', $personaje->mecanica)" />
                            <x-input-error :messages="$errors->get('mecanica')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="medicina">Medicina</label>
                            <x-text-input name="medicina" type="text" id="medicina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('medicina', $personaje->medicina)" />
                            <x-input-error :messages="$errors->get('medicina')" class="mt-2" />
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="mitos_cthulhu">Mitos de Cthulhu</label>
                            <x-text-input name="mitos_cthulhu" type="text" id="mitos_cthulhu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('mitos_cthulhu', $personaje->mitos_cthulhu)" />
                            <x-input-error :messages="$errors->get('mitos_cthulhu')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="nadar">Nadar</label>
                            <x-text-input name="nadar" type="text" id="nadar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('nadar', $personaje->nadar)" />
                            <x-input-error :messages="$errors->get('nadar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="naturaleza">Naturaleza</label>
                            <x-text-input name="naturaleza" type="text" id="naturaleza" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('naturaleza', $personaje->naturaleza)" />
                            <x-input-error :messages="$errors->get('naturaleza')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="orientarse">Orientarse</label>
                            <x-text-input name="orientarse" type="text" id="orientarse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('orientarse', $personaje->orientarse)" />
                            <x-input-error :messages="$errors->get('orientarse')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="persuasion">Persuasion</label>
                            <x-text-input name="persuasion" type="text" id="persuasion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('persuasion', $personaje->persuasion)" />
                            <x-input-error :messages="$errors->get('persuasion')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="primeros_auxilios">Primeros auxilios</label>
                            <x-text-input name="primeros_auxilios" type="text" id="primeros_auxilios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('primeros_auxilios', $personaje->primeros_auxilios)" />
                            <x-input-error :messages="$errors->get('medicina')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="psicoanalisis">Psicoanalisis</label>
                            <x-text-input name="psicoanalisis" type="text" id="psicoanalisis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('psicoanalisis', $personaje->psicoanalisis)" />
                            <x-input-error :messages="$errors->get('psicoanalisis')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="psicologia">Psicologia</label>
                            <x-text-input name="psicologia" type="text" id="psicologia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('psicologia', $personaje->psicologia)" />
                            <x-input-error :messages="$errors->get('psicologia')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="saltar">Saltar</label>
                            <x-text-input name="saltar" type="text" id="saltar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('saltar', $personaje->saltar)" />
                            <x-input-error :messages="$errors->get('saltar')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="seguir_rastro">Seguir rastro</label>
                            <x-text-input name="seguir_rastros" type="text" id="seguir_rastro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('seguir_rastros', $personaje->seguir_rastros)" />
                            <x-input-error :messages="$errors->get('seguir_rastros')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="sigilo">Sigilo</label>
                            <x-text-input name="sigilo" type="text" id="sigilo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('sigilo', $personaje->sigilo)" />
                            <x-input-error :messages="$errors->get('sigilo')" class="mt-2" />
                        </div>
                        <div class="flex flex-col bg-black p-4 rounded-md">
                            <label class="text-white" for="trepar">Trepar</label>
                            <x-text-input name="trepar" type="text" id="trepar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('trepar', $personaje->trepar)" />
                            <x-input-error :messages="$errors->get('trepar')" class="mt-2" />
                        </div>

                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <x-primary-button>Modificar habilidades</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
