@extends('backend.layouts.app')
@section('content')
    <div class="container">   
        @foreach ($posts as $item)
        <div class="card card-info">
            <div class="card-header">
                <p>{{ $item['title'] }}</p>
            </div>
            <div class="card-body">
                <p>{{ $item['content'] }}</p>
            </div>
        </div>
        @endforeach 
    </div>
@endsection