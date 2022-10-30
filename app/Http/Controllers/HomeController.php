<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Product\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->productRepository = $repository; 
    }
    
    public function index()
    {
        $productList = $this->productRepository->list();
        return view('home', array(  'productList' => $productList));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
         
        $productList =  $this->productRepository->list();
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
    public function location(Request $request){
        return Location::where('code', $request->input('code'))->first();
    }
}
