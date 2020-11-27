@extends('backend.layouts.app');
@section('content')
    <form action="{{route('admin-post-add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title Post</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>Post Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="">
                            <option disabled selected>Category</option>
                            @foreach ($category as $key=>$item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="" class="btn btn-secondary">Post List</a>
        <input type="submit" value="Add Post" name="submit" class="btn btn-success">
    </div>
</form>
@endsection