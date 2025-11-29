@extends('layouts.admin.app')

@section('title')
    Admin Dashboard
@endsection

@section('main-content')
    <div class="min-h-screen  bg-no-repeat bg-cover bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] px-10">

        <div class="w-full text-2xl">


            <header class="mb-10">
                <h1 class="text-white pt-5">Dashboard</h1>
                <p class="text-gray-500 text-sm">Analyze your business performance.</p>
            </header>

            {{-- Report Cards --}}
            <main class="grid grid-cols-3 gap-5 place-items-center min-h-[80vh]">

                {{-- Total Users --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">
                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Total Users</h1>
                            <h2 class="text-[#d7d9dc]">{{ $totalUsers }}</h2>
                        </div>
                        <x-heroicon-o-users class="w-15 h-15 text-gray-500" />
                    </div>
                </div>

                {{-- Total Orders --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">
                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Total Orders</h1>
                            <h2 class="text-[#d7d9dc]">{{ $totalOrders }}</h2>
                        </div>
                        <x-heroicon-o-clipboard-document-list class="w-15 h-15 text-gray-500" />
                    </div>
                </div>

                {{-- Total Sales --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">
                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Total Sales</h1>
                            <h2 class="text-[#d7d9dc]"> ₱ {{ number_format($totalSales, 2) }}</h2>
                        </div>
                        <x-heroicon-o-banknotes class="w-15 h-15 text-gray-500" />
                    </div>
                </div>

                {{-- Total Products --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">
                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Total Products</h1>
                            <h2 class="text-[#d7d9dc]">{{ $totalProducts }}</h2>
                        </div>
                        <x-heroicon-o-rectangle-stack class="w-15 h-15 text-gray-500" />
                    </div>
                </div>

                {{-- Orders Pending --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">
                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Orders Pending</h1>
                            <h2 class="text-[#d7d9dc]">{{ $ordersPending }}</h2>
                        </div>
                        <x-heroicon-o-clock class="w-15 h-15 text-gray-500" />
                    </div>
                </div>

                {{-- Low Stocks --}}
                <div class="border p-5 text-[#515f75] bg-[#1e2939] rounded-lg w-full h-5/12">

                    <div class="flex justify-between items-center p-5">
                        <div>
                            <h1>Low Stocks</h1>
                            <h2 class="text-[#d7d9dc]">{{ $lowStocks }}</h2>
                        </div>
                        <x-heroicon-o-exclamation-triangle class="w-15 h-15 text-gray-500" />
                    </div>
                </div>


            </main>

        </div>

    </div>
@endsection
