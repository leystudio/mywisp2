<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lobby') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-xl sm:rounded-lg">

                @foreach ($empresas as $empresa)

                <x-label_empresa>
                    <x-slot>
                        {{$empresa_id=$empresa['id']}}
                    </x-slot>
                    <x-slot name='nombre'>
                        {{$empresa['nombre']}}
                    </x-slot>
                    <x-slot name='logo'>
                        {{$empresa['logo']}}
                    </x-slot>
                </x-label_empresa>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>