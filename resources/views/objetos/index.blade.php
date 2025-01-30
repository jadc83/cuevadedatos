<x-app-layout>
    @if (session('exito'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
        </div>
    @endif


    <div style="background-image: url('/images/fondo_objetos.jpeg'); background-size: cover; background-position: center; height: 100vh;"
        class="relative">

        <!-- Botón para abrir/cerrar el carrito -->
        <button id="toggle-cart" class="absolute top-4 right-24 bg- px-4 py-2 rounded-full shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path
                    d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 7l-3.36-2.171c-.405.625-.64 1.371-.64 2.171 0 2.209 1.791 4 4 4s4-1.791 4-4-1.791-4-4-4c-.742 0-1.438.202-2.033.554l2.033 3.446z" />
            </svg>
        </button>


        <!-- Carrito -->
        <div>
            <div id="cart-container"
                class="absolute top-16 right-24 bg-white shadow-md rounded-lg p-4 w-80 dark:bg-gray-800">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Carrito</h2>
                <form action="{{ route('objetos.vaciar') }}" method="POST" class="mt-2 text-end">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M16 9v4.501c-.748.313-1.424.765-2 1.319v-5.82c0-.552.447-1 1-1s1 .448 1 1zm-4 0v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1s1 .448 1 1zm1.82 15h-11.82v-18h2v16h8.502c.312.749.765 1.424 1.318 2zm-6.82-16c.553 0 1 .448 1 1v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1zm14-4h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711v2zm-1 2v7.182c-.482-.115-.983-.182-1.5-.182l-.5.025v-7.025h2zm3 13.5c0 2.485-2.017 4.5-4.5 4.5s-4.5-2.015-4.5-4.5 2.017-4.5 4.5-4.5 4.5 2.015 4.5 4.5zm-3.086-2.122l-1.414 1.414-1.414-1.414-.707.708 1.414 1.414-1.414 1.414.707.708 1.414-1.414 1.414 1.414.708-.708-1.414-1.414 1.414-1.414-.708-.708z" />
                        </svg>
                    </button>
                </form>
                @if (session('carrito') && count(session('carrito')) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-1">Nombre</th>
                                <th scope="col" class="px-2 py-1 text-right">Subtotal</th>
                                <th scope="col" class="px-2 py-1 text-center">Cant.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('carrito') as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-2 py-1">{{ $item['denominacion'] }}</td>
                                    <td class="px-2 py-1 text-right">{{ $item['valor'] * $item['cantidad'] }}€</td>
                                    <td class="px-2 py-1 text-center">
                                        <form action="{{ route('objetos.resta', $item['id']) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-700 px-2 py-1 rounded-md">-</button>
                                        </form>
                                        <span class="mx-2">{{ $item['cantidad'] }}</span>
                                        <form action="{{ route('objetos.add', $item['id']) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-green-600 hover:bg-green-700 px-2 py-1 rounded-md">+</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 text-lg font-bold text-right">
                        <p> Total:
                            {{ array_sum(array_map(function ($item) {return $item['valor'] * $item['cantidad'];}, session('carrito'))) }}€
                        </p>
                        <form action="{{ route('objetos.pagar') }}" method="POST" class="mt-2 text-end">
                            @csrf
                            <input type="hidden" name="personaje_id" value="{{ $personaje->id }}">
                            <x-primary-button>
                                Pagar
                            </x-primary-button>
                        </form>
                    </div>
                @else
                    <p class="text-center text-gray-500">Tu carrito está vacío.</p>
                @endif



                <div class="mt-4">
                    <form method="GET" action="{{ route('objetos.index') }}" class="mb-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}"
                            placeholder="Buscar objetos..." class="form-input">
                        <x-primary-button class="mt-2">Buscar</x-primary-button>
                    </form>
                </div>

                <div>
                    <p class="text-center">¿No encuentras lo que buscas?</p>
                    <a href="{{ route('objetos.create') }}"
                        class="px-6 text-white ml-8 shadow-md font-bold  bg-gray-600 text-center">
                        Fabricar nuevo objeto
                    </a>
                </div>


            </div>


        </div>


        <!-- Cuadrícula de objetos -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4 w-4/6 justify-between ml-32">
            @foreach ($objetos as $objeto)
                <a href="{{ route('objetos.show', $objeto) }}" class="text-black cursor-zoom-in">
                    <div class="bg-white shadow-md rounded-lg p-4 dark:bg-gray-800">
                        <p class="text-black font-semibold bg-white">{{ $objeto->denominacion }}</p>
                        <p class="text-black font-semibold bg-white">Cantidad disponible: {{ $objeto->stock }}</p>

                        <!-- Verificar si el stock es mayor a 0 para mostrar el botón -->
                        @if ($objeto->stock > 0)
                            <form action="{{ route('objetos.comprar', $objeto) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md w1/6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                        <div class="bg-white shadow-md rounded-lg p-4 dark:bg-gray-800">
                                <p class=" text-center text-gray-500">Sin stock</p>
                            </div>
                        @endif
                    </div>

                </a>
            @endforeach

        </div>
        <div class="mx-64 my-24">
            {{ $objetos->links() }}
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
