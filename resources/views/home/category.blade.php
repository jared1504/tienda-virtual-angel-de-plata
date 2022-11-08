<x-layout>
    @php
    $items = [
    ['route'=> 'homeperfil.show', 'text' => 'Mi Perfil'],
    ['route'=> 'cart.index', 'text' => 'Mi Carrito'],
    ];
   
    @endphp
    <x-header :items="$items"></x-header>
    <h2 class="mt-5 text-center text-5xl font-bold ">{{$category->name}}</h2>
    <div class="m-10 grid grid-cols-5 gap-5">
        @foreach ($category->products as $product)
        <div class=" bg-gray-300 p-3" {{-- href="{{route('home.show',$product)}}" --}}>
            <img src="../../img/products/{{$product->image}}" alt="Imagen Producto {{$product->name}}" class="">
            <p class="text-3xl font-bold capitalize mt-2">{{$product->name}}</p>
            <p class="text-2xl capitalize my-2">${{$product->price}}</p>
            <div class="mt-5 flex justify-between gap-5">
                <a href="{{route('homeproduct.show', $product)}}"
                    class="py-2 w-1/2 bg-blue-700 hover:bg-blue-900 text-center text-white text-lg font-bold">Ver</a>
                <form class="w-1/2" action="{{route('cart.store')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <input type="submit" value="Agregar"
                        class="py-2 w-full bg-green-700 hover:bg-green-900 text-center text-white text-lg font-bold">
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <x-categories :categories="$categories" />
    <x-footer :items="$items"></x-footer>
</x-layout>