@extends('admin.master')

@section('title', @trans('admin.label_all_products'))

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
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Images</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productList as $product)
                                        <tr>
                                            <td>
                                                <form method="post"
                                                    action="{{ route('admin.products.destroy', $product->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    {{-- <label class="badge badge-danger"> --}}
                                                    <label>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </label>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning"><a
                                                        href="{{ route('admin.products.edit', $product->id) }}">Edit</a></button>
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td><img src="{{ $product->getFirstMediaUrl('thumbnail') }}" width="150px"
                                                    height="150px"></td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->category->name }}</td>
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
