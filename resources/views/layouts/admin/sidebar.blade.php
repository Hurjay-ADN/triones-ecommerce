<section>
    <div class="bg-[#101828] text-[#a0a5af] h-screen flex flex-col">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 py-5 border-b border-white/10">
            <div>
                <h1>Icon</h1>
            </div>
            <div>

                <a class="text-white font-bold text-lg" href="{{ route('admin.dashboard') }}">Triones</a>
                <p class="text-xs">Admin Panel</p>
            </div>
        </div>

        <div class="flex flex-col justify-between h-screen">
            {{-- Navigation --}}
            <ul class="px-4 py-10 flex flex-col gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'bg-[#3d4557]' : "" }} block px-2 py-2 rounded hover:bg-[#1e273c]">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="{{ Route::is('admin.products.*') ? 'bg-[#3d4557]' : "" }}  block px-2 py-2 rounded hover:bg-[#1e273c]">
                        Products
                    </a>
                </li>
                <li><a href="{{ route('admin.orders.index') }}"
                        class="{{ Route::is('admin.orders.index') ? 'bg-[#3d4557]' : "" }}  block px-2 py-2 rounded hover:bg-[#1e273c]">Orders</a></li>
            </ul>

            {{-- Logout --}}
            
            <form class="px-4 pb-5" action="{{ route('session.destroy') }}" method="POST">
                @csrf
                <button  class="block w-full text-center border border-red-400 text-red-400 font-semibold px-4 py-2 rounded hover:bg-red-200 transition cursor-pointer ">Logout</button>
            </form>
        </div>
    </div>
</section>
