<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function productsIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function productsCreate()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function productsStore(Request $request)
    {
        // validate
        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:255'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required'],
            'image' => ['required'],


        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            $pathName = basename($image);
        }
        $validatedData['image'] = $pathName;

        // insert
        Product::create($validatedData);

        // return
        return redirect()->route('admin.products.index');
    }

    public function productsEdit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function productsUpdate(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:255'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required'],
            'image' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            $pathName = basename($image);
        }
        $validatedData['image'] = $pathName;

        $product->update($validatedData);

        return redirect()->route('admin.products.index');
    }



    public function productsDestroy(Product $product)
    {

        $product->delete();

        return redirect()->route('admin.products.index');
    }

    public function ordersIndex(){

        $orders = Order::with('user')->with('items')->paginate(10);

        // dd($orders);
        return view('admin.orders.index', compact('orders'));
    }

    public function ordersUpdate(Request $request, Order $order){

        $order->status = $request->input('status');

        $order->update();

       return to_route('admin.orders.index');
    }

}
