@extends('backend.layouts.app')

@section('content')
    <h2>User list</h2>

    <div class="row">
        <div class="col-3">
            <p><a href="{{ route('admin-user-add') }}" class="btn btn-dark">Add User</a></p>
        </div>
        <div class="col-9">
            <form action="{{ route('admin-user-index') }}" method="get">
                <table class="table table-bordered">
                    <tr>
                        <td>User Name</td>
                        <td>
                            <input type="text" name="search_user_name" value=""class="form-control">
                        </td>
                        <td>
                            <input type="submit" value="Search" class="btn btn-dark">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    @if (session()->has('fail'))
        <div class="alert alert-danger">
            {{session()->get('fail')}}
        </div>
    @endif
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>User Name</th>
                <th>Role Name</th>
                <th>Avatar</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach ($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{ $user->role->first()->role_name }}</td>
                    <td>
                        @if (!empty($user->profile->avatar) && Storage::disk('local')->exists($user->profile->avatar))
                        <img width="100px" src="{{ Storage::disk('local')->url($user->profile->avatar) }}" alt="{{ $user->profile->avatar }}" class="img-fluid">
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-dark">Detail</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        @if ($user->id != session('admin_users')->get()->first()->id)
                            <form action="{{route('admin-user-delete',$user->id)}}" method="post">
                                @csrf
                                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger deleteUser">
                            </form>
                        @endif  
                    </td>
                </tr>
            @endforeach
        </table>
        {{$users->links()}}
@endsection