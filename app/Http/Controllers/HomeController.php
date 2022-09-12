<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $productList = Product::all();
        return view('home', array('productList' => $productList));
    }

    public function productDetail($productId){
        $product = Product::find($productId);
        $productList = Product::all();
        return view('product_detail', array('product' => $product,
        'productList' => $productList
    ));
    }

    public function categoryDetail($categoryId){
        $category = Category::find($categoryId);
        $categoryList = Category::all();

        return view('category_detail', 
        array('category' => $category,
        'categoryList' => $categoryList
        ));
    }

    public function productSearch(Request $request){
        $productName = $request->input('productName');

        $productList = Product::where('name', 'like', "%$productName%")->get();
        $categoryList = Category::all();
        
        return view('product_search', array('productList' => $productList,
            'categoryList' => $categoryList ));
    }


}
