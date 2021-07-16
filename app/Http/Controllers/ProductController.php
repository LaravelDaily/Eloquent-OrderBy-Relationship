<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // This way is slower
//        $products = Product::with('category')
//            ->orderBy(Category::select('name')->whereColumn('categories.id', 'products.category_id'))
//            ->paginate(100);

        $products = Product::select(['products.*', 'categories.name as category_name'])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->orderBy('categories.name')
            ->paginate(100);


        return view('products.index', compact('products'));
    }
}





//        $products = Product::with('category')
//            ->orderBy(Category::select('name')->whereColumn('categories.id', 'products.category_id'))
//            ->paginate(100);

//        $products = Product::select(['products.*', 'categories.name as category_name'])
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->orderBy('categories.name')
//            ->paginate(100);
