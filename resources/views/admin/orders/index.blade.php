@extends('layouts.admin.app')

@section('title', 'Orders')

@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-2xl p-5">Orders</h2>
            </div>
        </div>

        <div class="bg-[#23314c] rounded-xl p-4 shadow-lg">
            <table class="w-full text-sm text-center">
                <thead>
                    <tr class="text-gray-300 border-b border-gray-700 text-center">
                        <th class="py-3 px-4">Order Id</th>
                        <th class="py-3 px-4">Product Name</th>
                        <th class="py-3 px-4">Address</th>
                        <th class="py-3 px-4">Customer Name</th>
                        <th class="py-3 px-4">Total</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b border-gray-700 last:border-0">
                            <td class="py-3 px-4 ">
                                {{ $order->id }}
                            </td>

                            {{-- keep $order and $item, but put all products in one cell --}}
                            <td class="py-3 px-4 ">
                                @foreach ($order->items as $item)
                                    <div>{{ $item->product_name }}</div>
                                @endforeach
                            </td>

                            <td class="py-3 px-4 ">
                                {{ $order->shipping_address }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $order->user->username }}
                            </td>

                            <td class="py-3 px-4 ">
                                ₱ {{ number_format($order->total, 2) }}
                            </td>

                            <td>
                                <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                                    class="py-3 px-4 flex justify-center items-center">
                                    @csrf
                                    @method('PUT')
                                    <select class="border-gray-700 bg-[#23314c]" name="status">
                                        <option class="text-white" value="pending"
                                            {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option class="text-white" value="order_shipped"
                                            {{ $order->status === 'order_shipped' ? 'selected' : '' }}>Order Shipped
                                        </option>
                                        <option class="text-white" value="delivered"
                                            {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    </select>
                            </td>

                            <td class="py-3 px-4 ">
                                <button type="submit" class="px-3 py-1 rounded bg-emerald-600 text-white text-xs">
                                    Update
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
