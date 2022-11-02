<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Product\ProductRepository;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
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
        $product = $this->productRepository->create($request->all);

        $product = Product::create( $request->all());
        $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('thumbnail');
        if ($request->hasFile('photo')) {
            $fileAdders = $product->addMultipleMediaFromRequest(['photo'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('photos');
                });
        }
        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.products.index');
    }

    public function edit($id){
        $product = $this->productRepository->find($id);
        $categoryList = Category::all();
        
        return view('admin.products.edit', array('product' => $product, 'categoryList' => $categoryList));
    }

    public function update(Request $request, $id){
        $product = $this->productRepository->update($id, $request->all());

        if($request->hasFile('image')){
            $product->clearMediaCollection('thumbnail');
            $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('thumbnail');
            // if ($request->hasFile('photo')) {
            //     $product->clearMediaCollection('photos');
            //     $fileAdders = $product->addMultipleMediaFromRequest(['photo'])
            //         ->each(function ($fileAdder) {
            //             $fileAdder->toMediaCollection('photos');
            //         });
            // }
        }
        return redirect()->route('admin.products.index');
    }

    public function destroy($id){
        $product = $this->productRepository->delete($id);
        return redirect()->route('admin.products.index');
    }

}
