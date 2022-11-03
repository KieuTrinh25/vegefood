@extends('admin.master')

@section('title', __("admin.label_all_order_details"))

@section('content')
    <div class="content-wrapper">
        <div class="row">
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
                                            <td><a href="{{ route( 'admin.orders.show', $order->code) }}">{{ $order->code }}</a></td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('admin.orders.destroy', $order->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <label class="badge badge-danger">
                                                        <button type="submit">Delete</button>
                                                    </label>
                                                </form>
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