@extends('admin.master')

@section('title', @trans('admin.label_all_orders'))

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
                        <form class="forms-sample" method="post" action="{{ route('admin.orders.update', $order->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Code</label>
                                <input value="{{ $order->code }}" type="text" class="form-control" name="name" placeholder="Name">
                            </div>                            
                            <!-- <div class="form-group">
                                <label for="exampleTextarea1">Status</label>

                                    <textarea class="form-control" name="description" rows="4">{{ $order->status }}</textarea>
                            </div> -->
                            <div class="form-group">
                                <label for="exampleTextarea1">Status: </label> 
                                <input value="{{ $order->status }}" type="text" class="form-control" name="status" placeholder="status"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">User_id</label>
                                <select class="form-control" name="user_id" >
                                    @foreach($userList as $user)
                                    <option @if($user->id == $order->user_id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
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