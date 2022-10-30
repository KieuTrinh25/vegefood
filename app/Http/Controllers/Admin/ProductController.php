<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Product\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
        $product = $this->repository->create( $request->all());
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

        $product = $this->repository->find($id);
        $categoryList = Category::all();
        
        return view('admin.products.edit', array('product' => $product, 'categoryList' => $categoryList));
    }

    public function update(Request $request, $id){
        $product = $this->repository->update($id, $request->all());
        $product->update( $request->all());

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
        $product = $this->repository->delete( $id);
        return redirect()->route('admin.products.index');
    }

}
