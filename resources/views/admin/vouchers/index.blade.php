@extends('admin.master')

@section('title', @trans('admin.label_all_vouchers'))

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
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Quantity_used</th>
                                        <th>Time_from</th>
                                        <th>Time_end</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voucherList as $voucher)
                                        <tr>
                                            <td>{{ $voucher->code }}</td>
                                            <td>{{ $voucher->discount }}</td>
                                            <td>{{ $voucher->quantity }}</td>
                                            <td>{{ $voucher->quantity_used }}</td>
                                            <td>{{ $voucher->time_from }}</td>
                                            <td>{{ $voucher->time_end }}</td>
                                            <td>
                                                <a href="{{ route('admin.vouchers.edit', $voucher->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('admin.vouchers.destroy', $voucher->id) }}">
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