@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if ($profile)
                        <div class="">
                            <label class="text-bold" for="">User Birthday</label>
                            <p class="ml-2">{{ $profile->birthday }}</p>
                        </div>
                        <div class="">
                            <label for="">User gender</label>
                            <p class="ml-2">{{ $profile->gender }}</p>
                        </div>
                        <div class="">
                            <label for="">User address</label>
                            <p class="ml-2">{{ $profile->address }}</p>
                        </div>
                        <div>
                            <img src="{{ Storage::disk('local')->url($profile->avatar) }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
