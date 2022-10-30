<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $categoryList = $this->repository->list();
        return view('admin.categories.index', array(
            'categoryList' => $categoryList
        ));
    }

    public function create(){
        $categoryList = Category::all();
        return view('admin.categories.create', array('categoryList' => $categoryList));
    }

    public function store(CategoryRequest $request){
        $category =  $this->repository->create($request->all);
        $category = Category::create($request->all);
        $category->addMediaFromRequest('image')->usingName($category->name)->toMediaCollection('categories_images');

        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = $this->repository->find($id);
        return view('admin.categories.edit', array('category' => $category));
    }

    public function update(Request $request, $id){
        $category = $this->repository->update($id, $request->all());
        $category->update($request->all());
        if($request->hasFile('image')){
            $category->clearMediaCollection('categories_images');
            $category->addMediaFromRequest('image')->usingName($category->name)->toMediaCollection('categories_images');
        }
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id){
        $category = $this->repository->delete($id);
        return redirect()->route('admin.categories.index');
    }

}
