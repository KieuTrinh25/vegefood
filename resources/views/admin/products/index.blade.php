@extends('admin.master')

@section('title', __('admin.label_all_products'))

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
                                        
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Images</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productList as $product)
                                        <tr>
                                            
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td><img src="{{ $product->getFirstMediaUrl('thumbnail') }}" width="150px"
                                                    height="150px"></td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"><i
                                                        class="mdi mdi-border-color"></i></a>
                                            </td>
                                            <td>
                                                <form method="post"
                                                    action="{{ route('admin.products.destroy', $product->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn"><i
                                                            class="mdi mdi-delete"></i></button>
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
