<nav class="flex justify-between p-3 border-b items-center border-gray-200">
    <div class=>
        <h2 class="font-semibold text-xl">Triones</h2>
    </div>

    <div>
        <input type="text" class="border px-3 py-1 rounded border-gray-300 w-90" placeholder="Search">
    </div>

    <div>
        @auth
        <div class="flex items-center gap-2">
            <span>
                Welcome, {{ auth()->user()->username }}
            </span>    
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