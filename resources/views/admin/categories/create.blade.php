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
                       
                        <form class="forms-sample" method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
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
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="exampleTextarea1">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Descripton" value="{{ old('description') }}">
                                @if($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">Images</label>
                                <input type="file" class="form-control" name="image">
                                @if($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
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
