<x-layout>
    @php
    $items = [
    ['route'=> 'homeperfil.show', 'text' => 'Mi Perfil'],
    ['route'=> 'cart.index', 'text' => 'Mi Carrito'],
    ];

    @endphp
    <x-header :items="$items"></x-header>
    <div class="m-10 flex">
        <div class="w-4/5 flex">
            <img class="w-1/3" src="{{ asset('img') . '/products/' . $product->image }}"
                alt="Imagen producto {{$product->name}}">
            <div class="mx-5 w-2/3">
                <p class="block capitalize text-4xl font-bold">{{$product->name}}</p>
                <p class="block text-3xl mt-5"><span class="font-bold">Precio: $</span> {{$product->price}}</p>
                <p class="block text-xl mt-3"><span class="font-bold">Categoría: </span> {{$product->category->name}}
                </p>
                <p class="block text-xl mt-3 font-bold">Descripción:</p>
                <p class="block text-xl text-justify">{{$product->description}}</p>
                <p class="block text-xl mt-3 font-bold">Medidas:</p>
                <p class="block text-xl mt-1"><span class="font-bold">Alto: </span> {{$product->height}} centímetros</p>
                <p class="block text-xl "><span class="font-bold">Ancho: </span> {{$product->width}} centímetros</p>
                <p class="block text-xl "><span class="font-bold">Peso: </span> {{$product->weight}} gramos</p>
                @if ($cart)
                <p class="block text-xl ">Has añadido <span class="font-bold">{{$cart->amount}}</span> piezas de este
                    producto</p>
                @endif
                <div class=" mt-10 flex gap-5">
                    <form class="w-1/2  " action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <input type="submit" value="Agregar al Carrito"
                            class="py-2 w-full bg-green-700 hover:bg-green-900 text-center text-white text-lg font-bold">
                    </form>
                    @if ($cart)
                    <form class="w-1/2 " action="{{route('cart.destroy',$cart)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Quitar del Carrito"
                            class="py-2 w-full bg-red-700 hover:bg-red-900 text-center text-white text-lg font-bold">
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-1/5">
            <h3 class="text-center font-bold text-3xl ">Relacionados</h3>
            @foreach ($products as $product)

            <aside class="mt-5 flex gap-5 bg-gray-200 p-2">
                <img src="{{ asset('img') . '/products/' . $product->image }}" alt="Imagen producto {{$product->name}}"
                    class="w-1/3">
                <div class="">
                    <p class="text-xl capitalize font-semibold">{{$product->name}}</p>
                    <p class="text-xl "><span>Precio: $</span>{{$product->price}}</p>
                    <a href="{{route('homeproduct.show', $product)}}"
                        class="font-2xl hover:border-b-2 hover:border-black">Ver Producto</a>
                </div>
            </aside>
            @endforeach
        </div>
    </div>
    <x-categories :categories="$categories" />
    <x-footer :items="$items"></x-footer>
</x-layout>