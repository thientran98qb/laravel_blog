@extends('backend.layouts.app')
@section('content')
    <div class="container">   
        @if (session()->has('update'))
           <div class="alert alert-success">
                {{session()->get('update')}}
           </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success">
             {{session()->get('success')}}
        </div>
     @endif
     @if (session()->has('fail'))
     <div class="alert alert-error">
          {{session()->get('fail')}}
     </div>
  @endif
        @foreach ($posts as $item)
        <div class="card card-info">
            <div class="card-header">
                <p>{{ $item['title'] }}</p>
            </div>
            <div class="card-body">
                <p>{{ $item['content'] }}</p>
                <div style="float: right">
                <a href="{{route('admin-post-edit',$item['id'])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('admin-post-delete',$item['id'])}}" method="post" style="display: inline-block">
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
@endsection