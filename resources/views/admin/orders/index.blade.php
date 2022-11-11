@extends('admin.master')

@section('title', __("admin.label_all_order_details"))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                        <div>
                            <p class="statistics-title">Tổng số đơn hàng</p>
                            <h3 class="rate-percentage">{{$order_count}}</h3>
                            
                        </div>
                        <div>
                            <p class="statistics-title">Tổng số đơn pending</p>
                            <h3 class="rate-percentage">{{$number_pending}}</h3>
                            
                        </div>
                        <div>
                            <p class="statistics-title">Tổng số đơn finish</p>
                            <h3 class="rate-percentage">{{$number_finish}}</h3>
                        </div>            
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Table</h4>
                        <p class="card-description">
                            Add class <code>.table</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>User_id</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderList as $order)
                                        <tr>
                                            <td><a href="{{ route( 'admin.orders.show', $order->id) }}">{{ $order->code }}</a></td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->user->name }}</td>

                                            <td>
                                                <a href="{{  route('admin.orders.edit', $order->id) }}"><i class="mdi mdi-border-color"></i></a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{  route('admin.orders.destroy', $order->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn"><i class="mdi mdi-delete"></i></button>
                                            </td>

                                         
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection