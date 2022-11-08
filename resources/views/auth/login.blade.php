<x-layout>
    @php
     $items = [
    ['route'=> 'register', 'text' => 'Crear Cuenta'],
    ];
    @endphp
    <x-header :items="$items"></x-header>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl my-10 mx-auto">
        <h1 class="text-5xl font-bold text-center ">Iniciar Sesión</h1>
        <p class="mt-5 text-center text-2xl">Ingresa tus credenciales para iniciar sesión</p>
        <form method="POST" action="{{ route('login') }}" novalidate class="mt-5">
            @csrf
            @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
            @endif
            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email" placeholder="Tu Email" class="border p-3 w-full rounded-lg
                            @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                    Password
                </label>
                <input type="password" name="password" id="password" placeholder="Tu Password"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors
                    cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
    <x-footer :items="$items"></x-footer>
</x-layout>