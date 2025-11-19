<section>
    <div class="bg-[#101828] text-[#a0a5af] h-screen w-56 flex flex-col">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 py-5 border-b border-white/10">
            <div>
                <h1>Icon</h1>
            </div>
            <div>
                <h2 class="text-white font-bold">Triones</h2>
                <p class="text-xs">Admin Panel</p>
            </div>
        </div>

        <div class="flex flex-col justify-between h-screen">
            {{-- Navigation --}}
            <ul class="px-4 py-10 flex flex-col gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block px-2 py-2 rounded hover:bg-[#1e273c]">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="block px-2 py-2 rounded hover:bg-[#1e273c]">
                        Products
                    </a>
                </li>
                <li><a href="#" class="block px-2 py-2 rounded hover:bg-[#1e273c]">Inventory</a></li>
                <li><a href="#" class="block px-2 py-2 rounded hover:bg-[#1e273c]">Reports</a></li>
                <li><a href="#" class="block px-2 py-2 rounded hover:bg-[#1e273c]">Settings</a></li>
            </ul>

            {{-- Logout --}}
            <div class="px-4 pb-5">
                <a href="#"
                    class="block w-full text-center border border-red-400 text-red-400 font-semibold px-4 py-2 rounded hover:bg-red-200 transition">Logout</a>
            </div>
        </div>

    </div>
</section>
