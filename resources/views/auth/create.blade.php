<x-layout>
    @php
    $items = [
    ['route'=> 'login', 'text' => 'Iniciar Sesión'],
    ];
   
    @endphp
    <x-header :items="$items"></x-header>


    <form action="{{ route('register') }}" method="POST" novalidate
        class="w-1/3 bg-white p-6 rounded-lg shadow-xl mx-auto my-10">
        @csrf
        <h1 class="text-5xl font-bold text-center mb-10">Crear Cuenta</h1>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                Nombre*
            </label>
            <input type="text" name="name" id="name" placeholder="Tu Nombre"
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            @error('name')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                Email*
            </label>
            <input type="email" name="email" id="email" placeholder="Tu Email" class="border p-3 w-full rounded-lg
                    @error('email') border-red-500 @enderror" value="{{ old('email') }}">
            @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="phone">
                Teléfono
            </label>
            <input type="number" name="phone" id="phone" placeholder="Tu Teléfono" class="border p-3 w-full rounded-lg
                    @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
            @error('phone')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="direction">
                Dirección
            </label>
            <input type="text" name="direction" id="direction" placeholder="Tu Dirección" class="border p-3 w-full rounded-lg
                    @error('phone') border-red-500 @enderror" value="{{ old('direction') }}">
            @error('direction')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                Password*
            </label>
            <input type="password" name="password" id="password" placeholder="Tu Password"
                class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
            @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">
                Confirmar Password*
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirma Tu Password" class="border p-3 w-full rounded-lg">
        </div>
        <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors
            cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
    </form>

    <x-footer :items="$items"></x-footer>
</x-layout>