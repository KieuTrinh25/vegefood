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

                        <form class="forms-sample" method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                    <label for="exampleInputName1">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="price" value="{{ old('price')}}">
                                    @if($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                                    <label for="exampleInputName1">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="quantity" value="{{ old('quantity')}}">
                                    @if($errors->has('quantity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                                    <label for="exampleInputName1">Images</label>
                                    <input type="file" class="form-control" name="image" placeholder="image" value="{{ old('img')}}">
                                    @if($errors->has('img'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                                    <label for="exampleInputName1">Photos</label>
                                    <input type="file" class="form-control" name="photo[]" placeholder="image" value="{{ old('img')}}" multiple="" accept="image/png, image/jpeg">
                                    @if($errors->has('img'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                    <label for="exampleTextarea1">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description')}}">
                                    @if($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Category</label>
                                    <select class="form-control" name="category_id" >
                                        @foreach($categoryList as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
