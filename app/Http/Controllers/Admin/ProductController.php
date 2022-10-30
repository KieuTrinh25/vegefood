<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $productList = Product::with('category')->get();
        return view('admin.products.index', array(
            'productList' => $productList
        ));
    }


    public function create()
    {
        $this->authorize('create', Product::class);
        $categoryList = Category::all();

        return view('admin.products.create', array('categoryList' => $categoryList));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
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

    public function edit($id)
    {
        $this->authorize('edit', Product::class);

        $productList = Product::find($id);
        $categoryList = Category::all();
        return view('admin.products.edit', array('product' => $productList, 'categoryList' => $categoryList));
    }

    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $productList = array();
        if ($user->can('update')) {
            $productList = Product::find($id);
            $productList->update($request->all());

            if ($request->hasFile('image')) {
                $productList->clearMediaCollection('thumbnail');
                $productList->addMediaFromRequest('image')->usingName($productList->name)->toMediaCollection('thumbnail');
                if ($request->hasFile('photo')) {
                    $productList->clearMediaCollection('photos');
                    $fileAdders = $productList->addMultipleMediaFromRequest(['photo'])
                        ->each(function ($fileAdder) {
                            $fileAdder->toMediaCollection('photos');
                        });
                }
            }
        } else {
            return redirect()->route('admin.not.permission');
        }

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}
