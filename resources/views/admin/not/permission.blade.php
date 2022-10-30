@extends('admin.master')

@section('title', @trans('admin.label_dashboard'))
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded table-darkBGImg">
                <div class="card-body">
                    <div class="col-sm-8">
                        <h2 class="text-danger upgrade-info mb-0">
                            <span class="fw-bold not_permission">Sorry you don't have permission</span>

                        </h2>
                        <div class="icon mt-3">
                            <i class="fa-sharp fa-solid fa-skull-crossbones"></i>
                        </div>

                        <a href="#" class="btn btn-info upgrade-btn mt-5">Black</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .not_permission {
        font-size: 50px;
    }
    .icon{
        font-size: 170px;
        color: rgb(222, 45, 45);
        text-align: center;
    }
</style>
