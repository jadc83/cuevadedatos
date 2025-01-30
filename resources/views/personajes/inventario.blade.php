<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventario de ') }} {{ $personaje->nombre }}
        </h2>
    </x-slot>

    <div class="flex">
                @foreach ($personaje->objetos as $objeto)
                    <div class="bg-white dark:bg-gray-800 p-2 rounded-lg shadow-md text-center w-32 h-32 m-2">
                        <div class="h-10 w-10 mx-auto mb-2">
                            @if ($objeto->imagen)
                                <img src="{{ asset('storage/'.$objeto->imagen) }}" alt="{{ $objeto->denominacion }}" class="w-full h-full object-cover rounded-md">
                            @endif
                        </div>
                        <p class="font-semibold text-xs text-gray-900 dark:text-white">{{ $objeto->denominacion }}</p>
                        <p class="text-xxs text-gray-500 dark:text-gray-400">x{{ $objeto->pivot->cantidad }}</p>
                    </div>
                @endforeach
    </div>
</x-app-layout>
