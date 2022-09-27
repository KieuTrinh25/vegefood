<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(){
        $productList = Product::with('category')->get();
        return view('admin.products.index', array(
            'productList' => $productList
        ));
    }

    public function create(){
        $categoryList = Category::all();
        return view('admin.products.create', array('categoryList' => $categoryList));
    }

    public function store(Request $request){
        $product = Product::create( $request->all());
        $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('products_images');

        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.products.index');
    }

    public function edit($id){
        $product = Product::find($id);
        $categoryList = Category::all();
        return view('admin.products.edit', array('product' => $product, 'categoryList' => $categoryList));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->update( $request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }

}
