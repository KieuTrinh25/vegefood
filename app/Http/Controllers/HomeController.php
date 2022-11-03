<?php

namespace App\Http\Controllers;
 
use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Product\Actions\ShowProductAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function index()
    {
        $productList = resolve(ShowProductAction::class)->run();
        return view("home", array("productList" => $productList));
    }

    public function productDetail($slug)
    {
        $product = resolve(ShowProductAction::class)->getProductBySlug($slug);
        $productList = resolve(ShowProductAction::class)->run();

        return view("product_detail", array(

            "product" => $product,
            "productList" => $productList,
        ));
    }

    public function categoryDetail(Request $request, $slug)
    {
        try {
            $category = Category::where("slug", $slug)->firstOrFail();
        } catch (ModelNotFoundException $ex) {
            redirect()->route("category.notfound");
        }

        $categoryList = resolve(ShowCategoryAction::class)->run();
        if ($request->has("sort_by")) {
            $sort_by = $request->get("sort_by");
            $order_by = $request->has("order_by") ? $request->get("order_by") : "asc";
            $productList = Product::where("slug", $slug)->orderBy($sort_by, $order_by)->firstOrFail();
        } else {
            $productList = $category->products;
        }

        return view(
            "category_detail",
            array(
                "category" => $category,
                "productList" => $productList,
                "categoryList" => $categoryList,
            )
        );
    }

    public function productSearch(Request $request)
    {
        $productName = $request->input("productName");
        $productList = resolve(ShowProductAction::class)->getProductByName("%" . $productName . "%")->get();

        $categoryList = resolve(ShowCategoryAction::class)->run();

        return view("product_search", array(
            "productList" => $productList,
            "categoryList" => $categoryList,
        ));
    }
    public function location(Request $request)
    {
        return Location::where("code", $request->input("code"))->first();
    }
}
