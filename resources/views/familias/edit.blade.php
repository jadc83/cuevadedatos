<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <form method="POST" action="{{ route('familias.update', $familia) }}" class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl mx-auto space-y-6">
                    @csrf
                    @method('PATCH')
                    <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Editar familia</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="denominacion" class="text-gray-300">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{$familia->nombre}}" required placeholder="Nombre del objeto" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>

                        <div class="flex flex-col">
                            <label for="base" class="text-gray-300">Valor base</label>
                            <input type="number" name="base" id="base" value={{$familia->base}} placeholder="Valor base" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <x-primary-button class="mt-4 text-center w-full md:w-auto">Editar familia</x-primary-button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-app-layout>
