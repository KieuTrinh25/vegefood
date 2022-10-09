<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $productList = Product::all();
        return view('home', array('productList' => $productList));
    }

    public function productDetail($productId)
    {
        $product = Product::find($productId);
        $productList = Product::all();
        return view('product_detail', array(
            'product' => $product,
            'productList' => $productList
        ));
    }

    public function categoryDetail(Request $request, $categoryId)
    {        
        $category = Category::find($categoryId);
        $categoryList = Category::all();

        if($request->has('sort_by')){
            $sort_by = $request->get('sort_by');
            $order_by = $request->has('order_by') ? $request->get('order_by') : 'asc';
            $productList = Product::where('category_id', $categoryId)->orderBy($sort_by, $order_by)->get();
        }else{
            $productList = $category->products;
        }
        
        return view(
            'category_detail',
            array(
                'category' => $category,
                'productList' => $productList,
                'categoryList' => $categoryList
            )
        );
    }

    public function productSearch(Request $request)
    {
        $productName = $request->input('productName');

        $productList = Product::where('name', 'like', "%$productName%")->get();
        $categoryList = Category::all();

        return view('product_search', array(
            'productList' => $productList,
            'categoryList' => $categoryList
        ));
    }
}
