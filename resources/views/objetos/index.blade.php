<x-app-layout>
    @if (session('exito'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                <p>{{ session('exito') }}</p>
            </div>
        </div>
    @endif

    <div class="flex gap-6">
        <!-- Sección de artículos -->
        <div class="w-3/4 p-4 ml-8">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">Nombre del objeto</th>
                        <th scope="col" class="px-6 py-3 text-right">Precio</th>
                        <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objetos as $objeto)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('objetos.show', $objeto) }}">{{ $objeto->denominacion }}</a>
                            </th>
                            <td class="px-6 py-4 text-right">{{ $objeto->valor }}€</td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('objetos.comprar', $objeto) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md">Comprar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Sección del carrito -->
        <div class="w-1/4 p-4 mr-12">
            <div class="bg-white shadow-md rounded-lg p-4 dark:bg-gray-800">
                @if(session('carrito') && count(session('carrito')) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-right">Subtotal</th>
                                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('carrito') as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $item['denominacion'] }}</td>
                                    <td class="px-6 py-4 text-right">{{ $item['valor'] * $item['cantidad'] }}€</td>
                                    <td class="px-6 py-4 text-center">
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
        </div>
    </div>
</x-app-layout>
