@extends('backend.layouts.app');
@section('content')
    <form action="{{route('admin-post-update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            @if (!$post)
                <p>Khong tim thay post phu hop</p>
            @endif
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title Post</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label>Post Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="10">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>

                        <select name="category" id="">
                            <option disabled selected>Category</option>
                            @foreach ($categories as $key=>$item)
                                <option value="{{$item['id']}}" @if (in_array($item['id'],$categorySelected))
                                    selected="selected"
                                @endif>{{$item['name']}}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="{{route('admin-post-index')}}" class="btn btn-secondary">Post List</a>
        <input type="submit" value="Edit Post" name="submit" class="btn btn-success">
    </div>
</form>
@endsection