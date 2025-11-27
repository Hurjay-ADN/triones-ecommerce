@extends('layouts.admin.app')


@section('title', 'Orders')

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
                        <th class="py-3 px-4 text-left">Order Id</th>
                        <th class="py-3 px-4 text-left">Product Name</th>
                        <th class="py-3 px-4 text-left">Address</th>
                        <th class="py-3 px-4 text-left">Customer Name</th>
                        <th class="py-3 px-4 text-left">Total</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>

                            @foreach ($order->items as $item)
                                <td>{{ $item->product_name }}</td>
                            @endforeach
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->user->username }}</td>
                            <td>{{ $order->total }}</td>
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <select class="border-gray-700 bg-[#23314c]" name="status">

                                        <option class="text-white " value="pending"
                                            {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option class="text-white" value="order_shipped"
                                            {{ $order->status === 'order_shipped' ? 'selected' : '' }}>Order Shipped
                                        </option>
                                        <option class="text-white" value="delivered"
                                            {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    </select>
                                </td>

                                <td>
                                    <button type="submit">Update</button>
                                </td>
                            </form>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
