<x-app-layout>
    <form method="POST" action="{{route('hechizos.update',$hechizo)}}" class="flex items-center justify-center h-screen">
        @method('PUT')
        @csrf
        <div class="flex flex-col space-y-4">
            <div class="flex flex-col">
                <label for="nombre">Nombre</label>
                <input value="{{$hechizo->nombre}}" type="text" name="nombre" id="nombre" required />
            </div>

            <div class="flex flex-col">
                <label for="efecto">Efectos</label>
                <textarea name="efecto" id="efecto" required >{{$hechizo->efecto}}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="turnos">Turnos</label>
                <input type="text" value="{{$hechizo->turnos}}" name="turnos" id="turnos" required />
            </div>

            <div class="flex flex-col">
                <label for="coste">Coste</label>
                <input type="text" value="{{$hechizo->coste}}" name="coste" id="coste"  required>
            </div>

            <div class="flex flex-col">
                <label for="coste">Coste</label>
                <input type="text" value="{{$hechizo->coste_cordura}}" name="coste_cordura" id="coste_cordura"  required>
            </div>

                    <div class="flex flex-col">
                <label for="efecto" class="text-gray-300">Magia intensificada</label>
                <textarea name="intensificada" id="intensificada" value="{{$hechizo->intensificada}}" rows="4" required placeholder="Descripcion de magia intensificada" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
            </div>

            <div>
                <select name="categoria" id="categoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->denominacion}}">{{ ucfirst($categoria->denominacion) }}</option>
                    @endforeach
                </select>
            </div>

            <x-primary-button class="mt-4 text-center">Actualizar hechizo</x-primary-button>
        </div>
    </form>
</x-app-layout>
