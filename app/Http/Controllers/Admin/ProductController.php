<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Product\Actions\CreateProductAction;
use App\Services\Product\Actions\DeleteProductAction;
use App\Services\Product\Actions\ShowProductAction;
use App\Services\Product\Actions\UpdateProductAction;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $productList = Product::with('category')->get();
        return view('admin.products.index', array(
            'productList' => $productList,
        ));
    }

    public function create()
    {
        $categoryList = resolve(ShowCategoryAction::class)->run();
        return view('admin.products.create', array('categoryList' => $categoryList));
    }

    public function store(Request $request)
    {
        $product = resolve(CreateProductAction::class)->create($request->all());
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

        $product = resolve(ShowProductAction::class)->getSingleProduct($id);
        $categoryList = resolve(ShowCategoryAction::class)->run();

        return view('admin.products.edit', array('product' => $product, 'categoryList' => $categoryList));
    }

    public function update(Request $request, $id)
    {
        $product = resolve(UpdateProductAction::class)->update($id, $request->all());

        $product->update($request->all());

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('thumbnail');
            $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('thumbnail');
            if ($request->hasFile('photo')) {
                $product->clearMediaCollection('photos');
                $fileAdders = $product->addMultipleMediaFromRequest(['photo'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('photos');
                    });
            }
        }
        if ($product) {
            $request->session()->flash('status', 'Update Success');
        } else {
            $request->session()->flash('status', 'Update Fail');
        }
        return redirect()->route('admin.products.index');
    }

    public function destroy($id, Request $request)
    {
        $bool = resolve(DeleteProductAction::class)->delete($id);
        if ($bool) {
            $request->session()->flash('status', 'Delete Success');
        } else {
            $request->session()->flash('status', 'Delete Fail');
        }

        return redirect()->route('admin.products.index');
    }

}
