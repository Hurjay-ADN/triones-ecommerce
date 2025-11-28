@extends('layouts.app')


@section('title', 'Products')

@section('main-content')
    <div class="p-8">

        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-lg">Orders</h2>
            </div>

        </div>
        <div class="bg-[#23314c] rounded-xl p-4 shadow-lg">


            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-300 border-b border-gray-700 text-center">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Product Name</th>
                        <th class="py-3 px-4">Price</th>
                        <th class="py-3 px-4">Quantity</th>
                        <th class="py-3 px-4">Total</th>
                        <th class="py-3 px-4">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $n = 1 }}</span>
                    @foreach ($orders as $order)
                        <tr class="border-b border-gray-700 text-center last:border-0">
                            @foreach ($order->items as $item)
                                <td class="py-3 px-4 align-top">{{ $n }}</td>
                                <td class="py-3 px-4 align-top">{{ $item->product_name }}</td>
                                <td class="py-3 px-4 align-top"> ₱ {{ number_format($item->price, 2) }}</td>
                                <td class="py-3 px-4 align-top">{{ $item->quantity }}</td>
                                <td class="py-3 px-4 align-top"> ₱ {{ number_format($order->total, 2) }}</td>
                                <td class="py-3 px-4 align-top">{{ Str::headline($order->status) }}</td>
                            @endforeach
                        </tr>
                        <span class="hidden">{{ $n++ }}</span>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
