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
                       
                        <form class="forms-sample" method="post" action="{{ route('admin.vouchers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">Code</label>
                                <input type="text" class="form-control" name="code" placeholder="Code" value="{{ old('code') }}">
                                @if($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
                                <label for="exampleTextarea1">discount</label>
                                <input type="text" class="form-control" name="discount" placeholder="discount" value="{{ old('discount') }}">
                                @if($errors->has('discount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">quantity</label>
                                <input type="text" class="form-control" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                                @if($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('quantity_used') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">quantity_used</label>
                                <input type="text" class="form-control" name="quantity_used" placeholder="quantity_used" value="{{ old('quantity_used') }}">
                                @if($errors->has('quantity_used'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity_used') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('time_from') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">time form</label>
                                <input type="date" class="form-control" name="time_from" placeholder="time from" value="{{ old('time_from') }}">
                                @if($errors->has('time_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('time end') ? 'has-error' : ''}}">
                                <label for="exampleInputName1">time_end</label>
                                <input type="date" class="form-control" name="time_end" placeholder="time end" value="{{ old('time_end') }}">
                                @if($errors->has('time_end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_end') }}</strong>
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
