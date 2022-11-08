<x-layout>
    @php
    $items = [
    ['route'=> 'homeperfil.show', 'text' => 'Mi Perfil']
    ];

    @endphp
    <x-header :items="$items"></x-header>
    <div class="m-10">
        <h2 class="mb-10 text-center text-5xl font-bold ">Mi Carrito</h2>
        @foreach ($carts as $cart)
        <div class="flex gap-5  border-black border-2 mx-96">
            <img class="w-1/12" src="{{ asset('img') . '/products/' . $cart->product->image }}"
                alt="Imagen producto {{$cart->product->name}}">
            <div class="">
                <p class="">Cantidad: {{$cart->amount}}</p>
                <p class="">Producto: {{$cart->product->name}}</p>
                <p class="">Precio: {{$cart->product->price}}</p>
                <p class="">Subtotal: {{$cart->product->price*$cart->amount}}</p>
            </div>
        </div>

        @endforeach
    </div>
    <x-footer :items="$items"></x-footer>
</x-layout>