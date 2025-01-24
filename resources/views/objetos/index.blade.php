<x-app-layout>
    @if (session('exito'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
        </div>
    @endif

    <div style="background-image: url('/images/fondo_objetos.jpeg'); background-size: cover; background-position: center; height: 100vh;" class="relative">
        <!-- Botón para abrir/cerrar el carrito -->
        <button id="toggle-cart" class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
            Ver/Ocultar Carrito
        </button>

        <!-- Carrito -->
        <div id="cart-container" class="absolute top-16 right-4 bg-white shadow-md rounded-lg p-4 w-80 dark:bg-gray-800 hidden">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Carrito</h2>
            @if(session('carrito') && count(session('carrito')) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-1">Nombre</th>
                            <th scope="col" class="px-2 py-1 text-right">Subtotal</th>
                            <th scope="col" class="px-2 py-1 text-center">Cant.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('carrito') as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-2 py-1">{{ $item['denominacion'] }}</td>
                                <td class="px-2 py-1 text-right">{{ $item['valor'] * $item['cantidad'] }}€</td>
                                <td class="px-2 py-1 text-center">
                                    <form action="{{ route('objetos.add', $item['id']) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-2 py-1 rounded-md">+</button>
                                    </form>
                                    <span class="mx-2">{{ $item['cantidad'] }}</span>
                                    <form action="{{ route('objetos.resta', $item['id']) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 px-2 py-1 rounded-md">-</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach (Auth::user()->personajes as $personaje)
                            {{$personaje->nombre}}
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-lg font-bold text-right">
                    Total: {{ array_sum(array_map(function($item) { return $item['valor'] * $item['cantidad']; }, session('carrito'))) }}€
                </div>
                <form action="{{ route('objetos.vaciar') }}" method="POST" class="mt-4 text-center">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800">Vaciar Carrito</button>
                </form>
            @else
                <p class="text-center text-gray-500">Tu carrito está vacío.</p>
            @endif
        </div>

        <div>
            <form method="GET" action="{{ route('objetos.index') }}" class="mb-4">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar objetos..."
                    class="form-input">
                <x-primary-button>Buscar</x-primary-button>
            </form>
        </div>

        <!-- Cuadrícula de objetos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4 w-4/6 justify-between ml-32">
            @foreach ($objetos as $objeto)
                <div class="bg-white shadow-md rounded-lg p-4 dark:bg-gray-800">
                    <p class="text-gray-300 font-semibold bg-white">
                        <a href="{{ route('objetos.show', $objeto) }}" class="text-black hover:underline">
                            {{ $objeto->denominacion }}
                        </a>
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">{{ $objeto->descripcion }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleCartButton = document.getElementById('toggle-cart');
            const cartContainer = document.getElementById('cart-container');

            toggleCartButton.addEventListener('click', () => {
                cartContainer.classList.toggle('hidden');
            });
        });
    </script>
</x-app-layout>
