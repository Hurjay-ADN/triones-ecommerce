@extends('layouts.app')


@section('title', 'Products')

@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-lg">Orders</h2>
            </div>
        
        </div>
        <div class="bg-[#23314c] rounded-xl p-4 shadow-lg">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-300 border-b border-gray-700">
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Product Name</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-left">Quantity</th>
                        <th class="py-3 px-4 text-left">Total</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Action</th>

                    </tr>
                </thead>
                 <tbody>
                    {{ $n = 1 }}
                    @foreach ($orders as $order)
                      <tr>
                        @foreach ($order->items as $item)
                            <td>{{ $n}}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td>View</td>
                        @endforeach
                      </tr>
                      {{ $n++ }}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
