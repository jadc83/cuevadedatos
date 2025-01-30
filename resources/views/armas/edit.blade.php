<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <form method="POST" action="{{ route('armas.update', $arma) }}" class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl mx-auto space-y-6">
                    @csrf
                    @method('PATCH')
                    <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Editar un arma</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="nombre" class="text-gray-300">Nombre</label>
                            <input value="{{$arma->nombre}}" type="text" name="nombre" id="nombre" required placeholder="Nombre del objeto" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                        <div class="flex flex-col">
                            <label for="base" class="text-gray-300">Tipo de Arma</label>
                            <select name="tipo_arma_id" id="tipo_arma_id" required class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                @foreach ($tipoArmas as $tipoArma)
                                    <option {{ $arma->tipo_arma_id == $tipoArma->id ? 'selected' : '' }} value="{{ $tipoArma->id }}">{{ $tipoArma->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="dano" class="text-gray-300">Daño</label>
                            <input value="{{$arma->dano}}" type="text" name="dano" id="dano" required placeholder="Daño del objeto(2d6+2)" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                        <div class="flex flex-col">
                            <label for="alcance" class="text-gray-300">Alcance</label>
                            <input value="{{$arma->alcance}}" type="number" name="alcance" id="alcance" required placeholder="Alcance del arma en metros" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="usos" class="text-gray-300">Usos</label>
                            <input value="{{$arma->usos}}" type="text" name="usos" id="usos" required placeholder="Ataques por turno" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                        <div class="flex flex-col">
                            <label for="cargador" class="text-gray-300">Cargador</label>
                            <input value="{{$arma->cargador}}" type="number" name="cargador" id="cargador" required placeholder="Cantidad de cargador" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="valorLegal" class="text-gray-300">Coste Legal</label>
                            <input value="{{$arma->valorLegal}}" type="number" name="valorLegal" id="valorLegal"  required placeholder="Coste legal(Si aplica)" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                        <div class="flex flex-col">
                            <label for="valorIlegal" class="text-gray-300">Coste Ilegal</label>
                            <input value="{{$arma->valorIlegal}}" type="number" name="valorIlegal" id="valorIlegal"  required placeholder="Coste Ilegal(Si aplica)" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="fd" class="text-gray-300">Falla</label>
                            <input value="{{$arma->fd}}" type="number" name="fd" id="fd" required placeholder="Probabilidad de fallo" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                        <div class="flex flex-col">
                            <label for="epoca" class="text-gray-300">Epoca</label>
                            <input value="{{$arma->epoca}}"  type="text" name="epoca" id="epoca" required placeholder="Epoca del arma(años 20, actual...)" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="descripcion" class="text-gray-300">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" required placeholder="Descripción del arma(Opcional)" class="h-32 mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">{{$arma->descripcion}}</textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="descripcion" class="text-gray-300">Habilidad de la que depende</label>
                        <select name="especializacion_id" id="especializacion_id" required class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <optgroup label="Armas de fuego">
                                @foreach ($especializaciones->where('familia.nombre', 'Armas de fuego') as $especializacion)
                                    <option value="{{ $especializacion->id }}" {{ $arma->especializacion_id == $especializacion->id ? 'selected' : '' }}>
                                        {{ $especializacion->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Combatir">
                                @foreach ($especializaciones->where('familia.nombre', 'Combatir') as $especializacion)
                                    <option value="{{ $especializacion->id }}" {{ $arma->especializacion_id == $especializacion->id ? 'selected' : '' }}>
                                        {{ $especializacion->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <x-primary-button class="mt-4 text-center w-full md:w-auto">Editar Arma</x-primary-button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-app-layout>
