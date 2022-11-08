<x-layout>
    @php
     $items = [
    ['route'=> 'login', 'text' => 'Iniciar Sesión'],
    ['route'=> 'register', 'text' => 'Crear Cuenta'],
    ];
    @endphp
    <x-header :items="$items"></x-header>
    <div class="my-20 mx-20 bg-red-100 py-5 rounded-lg">
        <h1 class="text-center text-3xl font-bold uppercase">Has excedido el número de intentos permitido</h1>
        <h3 class="text-center text-xl mt-2">Intenta ingresar más tarde</h3>
    </div>
    <x-footer :items="$items"></x-footer>
</x-layout>