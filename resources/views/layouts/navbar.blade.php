<nav class="flex justify-between border-b items-center border-gray-200 py-5">
    <div>
        <a class="font-semibold text-xl hover:text-orange-600" href="{{ route('home') }}">Triones</a>
    </div>


    <div>
        @auth
            <div class="flex items-center gap-4">
                <span class="capitalize text-lg  hover:text-orange-600">
                    Welcome, {{ auth()->user()->username }}
                </span>
                <div>
                    <a href="{{ route('orders.index') }}">
                        <x-heroicon-o-clipboard class="w-6 h-6 text-orange-500  hover:text-orange-700" />
                    </a>
                </div>
                <div class="relative">
                    <a href="{{ route('carts.index') }}">
                        <x-heroicon-o-shopping-cart class="w-6 h-6 text-orange-500  hover:text-orange-700" />
                    </a>
                    <span class="text-sm text-red-400 absolute -top-3 -right-2">
                        {{ auth()->user()->carts()->count() === 0 ? ' ' : auth()->user()->carts()->count() }}
                    </span>
                </div>


                <form action="{{ route('session.destroy') }}" method="POST">
                    @csrf
                    <button class=" hover:text-orange-700 py-1 text-white rounded">
                        <x-heroicon-s-arrow-left-on-rectangle
                            class="w-6 h-6 text-orange-500  hover:text-orange-700 cursor-pointer " />
                    </button>
                </form>
            </div>
        @endauth
        @guest
            <a href="{{ route('login') }}"
                class="bg-emerald-500 hover:bg-emerald-600 text-white text-lg font-semibold px-4 py-1 rounded cursor-pointer">
                Login
            </a>
        @endguest
    </div>

</nav>
