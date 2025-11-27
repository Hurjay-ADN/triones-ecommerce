<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $query = Product::query();
        
        $search = $request->input('search');
        $category = $request->input('category');

        if (filled($category)){
            $query->where('category_id',$category);
        }

        if (filled($search)){
            $query->where('name', 'LIKE', "%$search%");
        }

        $products = $query->get();

        return view('home', compact('products'));
    }
}
