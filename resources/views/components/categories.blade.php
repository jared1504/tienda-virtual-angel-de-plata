<div class="bg-neutral-200 py-5 px-10">
    <h2 class="text-center text-5xl font-bold">Más Categorías</h2>
    <div class="mt-5  flex gap-5">
        @foreach ($categories as $category)
        <div class=" bg-gray-300 p-3" {{-- href="{{route('home.show',$product)}}" --}}>
            <img src="../../img/categories/{{$category->image}}" alt="Imagen Categoría {{$category->name}}"
                class="mb-5">
            <a href="{{route('homecategory.show', $category)}}"
                class="text-3xl  font-bold capitalize hover:border-b-2 hover:border-b-gray-700 mx-auto">
                {{$category->name}}
            </a>
        </div>
        @endforeach
    </div>
</div>