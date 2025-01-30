<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventario de ') }} {{ $personaje->nombre }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto flex">
            <!-- Cuadrícula de objetos -->
            <div class="grid grid-cols-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($personaje->objetos as $objeto)
                    <div class="bg-white dark:bg-gray-800 p-2 rounded-lg shadow-md text-center w-32 h-32 m-2">
                        <div class="h-10 w-10 mx-auto mb-2">
                            <!-- Imagen del objeto, más pequeña -->
                            <img src="{{ $objeto->imagen ? asset('storage/'.$objeto->imagen) : '/images/default-item.png' }}" alt="{{ $objeto->denominacion }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        <p class="font-semibold text-xs text-gray-900 dark:text-white">{{ $objeto->denominacion }}</p>
                        <p class="text-xxs text-gray-500 dark:text-gray-400">x{{ $objeto->pivot->cantidad }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
