@extends('backend.layouts.app');
@section('content')
@if (session()->has('fail'))
        <div class="alert alert-danger">
            {{session()->get('fail')}}
        </div>
@endif
    <form action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="customFile">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="avatar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Role ID</label>
                        {{ Form::select('role_id', [null => 'Please choose a Role'] + $roles, old('role_id'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="text" name="birthday" class="form-control" placeholder="yyyy-dd-mm" value="{{ old('birthday') }}">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option>Please choose gender</option>
                            @foreach(["male" => "Male", "female" => "Female"] AS $contactWay => $contactLabel)    
                            <option value="{{ $contactWay }}">{{ $contactLabel }}</option>
                            @endforeach
                        </select>
                        {{-- {{ Form::select('gender', [null => 'Please choose gender'] + $genders, old('gender'), ['class' => 'form-control']) }} --}}
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="{{ route('admin-user-index') }}" class="btn btn-secondary">User List</a>
        <input type="submit" value="Add" name="submit" class="btn btn-success">
    </div>
</form>
@endsection