@extends('layouts.admin.app')

@section('title')
    Admin Dashboard
@endsection

@section('main-content')
    <h1 class="p-5">Dashboard Page</h1>

    <div class="grid grid-cols-3 gap-10 p-5">

        {{-- Total Users --}}
        <div class="border bg-amber-100 ">
            <h1>Total Users</h1>
            <h2>{{ $totalUsers}}</h2>
        </div>

        {{-- Total Orders --}}
        <div  class="border bg-amber-100 ">
            <h1>Total Orders</h1>
            <h2>{{ $totalOrders}}</h2>

        </div>

        {{-- Total Sales --}}
        <div class="border bg-amber-100 ">
            <h1>Total Sales</h1>
            <h2>{{ $totalSales}}</h2>
        </div>

        {{-- Total Products --}}
        <div  class="border bg-amber-100 ">
            <h1>Total Products</h1>
            <h2>{{ $totalProducts}}</h2>

        </div>

         {{-- Number of Pendings --}}
        <div  class="border bg-amber-100 ">
            <h1>Orders Pending</h1>
            <h2>{{ $ordersPending}}</h2>
        </div>


         {{-- Low Stocks --}}
        <div  class="border bg-amber-100 ">
            <h1>Low Stocks</h1>
            <h2>{{ $lowStocks}}</h2>
        </div>
       



    </div>
  





@endsection
