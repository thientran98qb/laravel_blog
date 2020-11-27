@extends('backend.layouts.app')
@section('content')
<form action="{{route('admin-category-add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="" class="btn btn-secondary">Post List</a>
        <input type="submit" value="Add Category" name="submit" class="btn btn-success">
    </div>
</form>
@endsection