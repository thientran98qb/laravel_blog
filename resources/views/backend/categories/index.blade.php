@extends('backend.layouts.app')
@section('content')
    <div class="container">
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
        <a href="{{route('admin-category-add')}}" class="btn btn-success">Add Category</a>
        <table class="table table-bordered">
            <tr class="text-center table-info">
                <th>Name Category</th>
                <th>Action</th>
            </tr>
            @foreach ($categories as $item)
            <tr class="text-center table-secondary">
                <td>{{$item['name']}}</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <form action="" style="display: inline-block;">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach     
        </table>
    </div>
@endsection