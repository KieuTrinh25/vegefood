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
                        <form class="forms-sample" method="post" action="{{ route('admin.categories.update', $category->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input value="{{ $category->name }}" type="text" class="form-control" name="name" placeholder="Name">
                                
                            </div>                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ $category->description }}</textarea>
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