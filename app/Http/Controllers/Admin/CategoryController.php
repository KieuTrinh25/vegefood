<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categoryList = array();
        if ($user->can('viewAny')) {
            $categoryList = Category::all();
        }else{
            return redirect()->route('admin.not.permission');
        }                
        return view('admin.categories.index', array(
            'categoryList' => $categoryList
        ));
    }

    public function create()
    {
        $user = Auth::user();
        $categoryList = array();
        if ($user->can('create')) {
            $categoryList = Category::all();
        }
        return view('admin.categories.create', array('categoryList' => $categoryList));
    }

    public function store(CategoryRequest $request)
    {
        $user = Auth::user();
        $categoryList = array();
        if ($user->can('create')) {
            $category =  Category::create($request->all());
            $category->addMediaFromRequest('image')->usingName($category->name)->toMediaCollection('categories_images');
        }
        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {   $user = Auth::user();
        $categoryList = array();
        if ($user->can('viewAny')) {
            $category = Category::find($id);
        }else{
            return redirect()->route('admin.not.permission');
        }   
        return view('admin.categories.edit', array('category' => $category));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $categoryList = array();
        if ($user->can('update', Category::class)) {
            $category = Category::find($id);
            $category->update($request->all());
        }
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $categoryList = array();
        if ($user->can('delete', Category::class)) {
            Category::destroy($id);
        }else{
            return redirect()->route('admin.not.permission');
        } 
        return redirect()->route('admin.categories.index');
    }
}
