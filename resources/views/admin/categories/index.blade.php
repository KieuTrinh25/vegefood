@extends('admin.master')

@section('title', @trans('admin.label_all_categories'))

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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryList as $cat)
                                        <tr>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->description }}</td>
                                            <td><img src="{{ $cat->getFirstMediaUrl('categories_images') }}" width="150px" height="150px"></td>
                                            <td>
                                                <a  class="btn btn-outline-primary" href="{{ route('admin.categories.edit', $cat->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('admin.categories.destroy', $cat->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <label class="">
                                                        <button  class="btn btn-outline-primary" type="submit">Delete</button>
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