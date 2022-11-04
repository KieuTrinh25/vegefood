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
                        <form class="forms-sample" method="post" action="{{ route('admin.vouchers.update', $voucher->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Code</label>
                                <input value="{{ $voucher->code }}" type="text" class="form-control" name="code" placeholder="Code">
                                
                            </div>                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Discount</label>
                                <input value="{{$voucher->discount}}" type="text" class="form-control" name="discount" placeholder="discount">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Quantity</label>
                                <input value="{{$voucher->quantity}}" type="text" class="form-control" name="quantity" placeholder="quantity">                            
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Quantity_used</label>
                                <input value="{{$voucher->quantity_used}}" type="text" class="form-control" name="quantity_used" placeholder="quantity_used">                            
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Time_from</label>
                                <input type="date"  value="{{$voucher->time_from}}" class="form-control" name="time_from" >
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Time_end</label>
                                <input type="date"  value="{{$voucher->time_end}}" class="form-control" name="time_end" >
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