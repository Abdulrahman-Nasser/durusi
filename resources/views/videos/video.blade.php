@extends('layouts.app')
@section('title', 'Durusi | Show Videos')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($videos as $data)
                <div class="col-lg-8 mt-3">
                    <div class="card border-0">
                        <div class="card-body text-center bg-light ">
                            <h3> Video Name : {{ $data->videoName }}</h3>
                        </div>
                        <video controls muted autoplay>
                            <source src="{{ asset('Video/video_uploads/' .$data->videoName) }}">
                        </video>
                    </div>

                </div>
            @empty
                <div class="alert alert-danger bg-danger ">
                    <div class="error-message text-light">
                        <h3>There is no Media ..</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
