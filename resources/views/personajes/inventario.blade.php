<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Inventario de ') }} {{ $personaje->nombre }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($personaje->objetos as $objeto)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 flex flex-col items-center justify-between h-52 transition hover:scale-105 hover:shadow-xl">

                    {{-- Imagen con enlace --}}
                    <a href="{{ route('objetos.show', $objeto) }}" class="w-16 h-16 mb-3 block">
                        @if ($objeto->imagen)
                            <img src="{{ asset('storage/' . $objeto->imagen) }}"
                                 alt="{{ $objeto->denominacion }}"
                                 class="w-full h-full object-cover rounded-md border border-gray-300 dark:border-gray-600">
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 rounded-md flex items-center justify-center text-xs text-gray-500">
                                Sin imagen
                            </div>
                        @endif
                    </a>

                    {{-- Nombre con enlace y cantidad --}}
                    <div class="text-center mb-2">
                        <a href="{{ route('objetos.show', $objeto) }}" class="text-sm font-semibold text-gray-900 dark:text-white hover:underline block truncate">
                            {{ $objeto->denominacion }}
                        </a>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Cantidad: x{{ $objeto->pivot->cantidad }}</p>
                    </div>

                    {{-- Botones --}}
                    <div class="flex flex-col space-y-1 w-full">
                        <form action="{{ route('objetos.soltar', ['personaje' => $personaje, 'objeto' => $objeto]) }}" method="post">
                            @csrf
                            <x-primary-button class="w-auto text-xs py-1">Soltar</x-primary-button>
                        </form>
                        <form action="{{ route('objetos.soltarTodo', ['personaje' => $personaje, 'objeto' => $objeto]) }}" method="post">
                            @csrf
                            <x-primary-button class="w-[7em] text-xs py-1 bg-red-500">Soltar todos</x-primary-button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
