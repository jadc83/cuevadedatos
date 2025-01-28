<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between items-center p-4 bg-gray-900 shadow-lg">
                <!-- Menú de navegación -->
                <div class="hidden sm:flex space-x-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-xs sm:text-sm text-white hover:text-red-500">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('libros.index')" :active="request()->routeIs('libros')"
                        class="text-xs sm:text-sm text-white hover:text-green-600">
                        {{ __('Libros') }}
                    </x-nav-link>
                    <x-nav-link :href="route('personajes.index')" :active="request()->routeIs('personajes')"
                        class="block text-xs sm:text-sm text-white hover:text-orange-500">
                        {{ __('Personajes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('cementerio')" :active="request()->routeIs('cementerio')"
                        class="block text-xs sm:text-sm text-white hover:text-orange-500">
                        {{ __('Cementerio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('especializaciones.index')" :active="request()->routeIs('especializaciones')"
                        class="block text-xs sm:text-sm text-white hover:text-orange-500">
                        {{ __('Especialidades') }}
                    </x-nav-link>
                    <x-nav-link :href="route('familias.index')" :active="request()->routeIs('familias')"
                        class="block text-xs sm:text-sm text-white hover:text-orange-500">
                        {{ __('Familias') }}
                    </x-nav-link>
                    <p class="text-white">
                        @php
                        use App\Models\Personaje;
                            $personaje = Personaje::find(Auth::user()->personaje_id)
                        @endphp
                        {{$personaje->nombre}}
                    </p>
                </div>

                <!-- Menú móvil (hamburguesa) -->
                <div class="sm:hidden">
                    <button class="text-white focus:outline-none" id="navbar-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Menú desplegable en móviles -->
                <div class="sm:hidden hidden" id="navbar-menu">
                    <div class="space-y-4 mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="block text-xs sm:text-sm text-white hover:text-red-500">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('libros.index')" :active="request()->routeIs('libros')"
                            class="block text-xs sm:text-sm text-white hover:text-green-600">
                            {{ __('Libros') }}
                        </x-nav-link>
                        <x-nav-link :href="route('hechizos.index')" :active="request()->routeIs('hechizos')"
                            class="block text-xs sm:text-sm text-white hover:text-indigo-500">
                            {{ __('Hechizos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('habilidades.index')" :active="request()->routeIs('habilidades')"
                            class="block text-xs sm:text-sm text-white hover:text-orange-500">
                            {{ __('Habilidades') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>

            <script>
                // Script para mostrar/ocultar el menú en dispositivos móviles
                document.getElementById('navbar-toggle').addEventListener('click', function() {
                    const menu = document.getElementById('navbar-menu');
                    menu.classList.toggle('hidden');
                });
            </script>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate class="hover:bg-red-500">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('hechizos.index')" :active="request()->routeIs('hechizos')"
                            class="text-xs sm:text-sm hover:text-indigo-500">
                            {{ __('Hechizos') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('objetos.index')" :active="request()->routeIs('objetos')"
                            class="text-xs sm:text-sm hover:text-orange-500">
                            {{ __('Objetos') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('habilidades.index')" :active="request()->routeIs('habilidades')"
                            class="block text-xs sm:text-sm hover:text-orange-500">
                            {{ __('Habilidades') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link class="hover:bg-red-500">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-gray-700"
                wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-400">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" class="text-white hover:bg-gray-700" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link class="hover:bg-gray-700">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
