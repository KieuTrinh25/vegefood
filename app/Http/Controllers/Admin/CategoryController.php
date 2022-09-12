<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categoryList = Category::all();
        return view('admin.categories.index', array(
            'categoryList' => $categoryList
        ));
    }

    public function create(){
        $categoryList = Category::all();
        return view('admin.categories.create', array('categoryList' => $categoryList));
    }

    public function store(CategoryRequest $request){
        $request->validated();
        Category::create($request->all());
        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit', array('category' => $category));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->update( $request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }

}
