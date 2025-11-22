<nav class="flex justify-between border-b items-center border-gray-200 py-5">
    <div>
        <a class="font-semibold text-xl" href="{{ route('home') }}">Triones</a>
    </div>

    <div>
        <input type="text" class="border px-3 py-1 rounded border-gray-300 w-90" placeholder="Search">
    </div>

    <div>
        @auth
            <div class="flex items-center gap-4">
                <span class="capitalize">
                    {{ auth()->user()->username }}
                </span>
                <div>
                    <a href="{{ route('orders.index') }}">Orders</a>
                </div>
                <div class="relative">
                    <a href="{{ route('carts.index') }}">c</a>
                    <span class="text-xs absolute -top-4 -right-2">
                        {{ auth()->user()->carts()->count() === 0 ? ' ' : auth()->user()->carts()->count() }}
                    </span>
                </div>


                <form action="{{ route('session.destroy') }}" method="POST">
                    @csrf
                    <button class="bg-red-600 hover:bg-red-800 px-3 py-1 text-white rounded">Logout</button>
                </form>
            </div>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-800 px-3 py-1 text-white rounded">
                Login
            </a>
        @endguest
    </div>

</nav>
