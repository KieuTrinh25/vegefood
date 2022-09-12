@extends('admin.master')

@section('title', @trans('admin.label_all_categories'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic form elements</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample" method="post" action="{{ route('admin.products.update', $product->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input value="{{ $product->name }}" type="text" class="form-control" name="name" placeholder="Name">
                            </div>                       
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input value="{{$product->price }}" type="text" class="form-control" name="price" placeholder="price">
                            </div>     
                            <div class="form-group">
                                <label for="exampleInputName1">Quantity</label>
                                <input value="{{$product->quantity }}" type="text" class="form-control" name="quantity" placeholder="quantity">
                            </div>        
                            <div class="form-group">
                                <label for="exampleInputName1">Images</label>
                                <input value="{{$product->img }}" type="text" class="form-control" name="img" placeholder="img">
                            </div>                         
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Category</label>
                                <select class="form-control" name="category_id" >
                                    @foreach($categoryList as $cat)
                                    <option @if($cat->id == $product->category_id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection