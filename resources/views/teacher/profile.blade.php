@extends('layouts.app')
@section('title', 'Durusi | Show Specific Video')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($teachers as $data)
                <div class="col-lg-6 mt-3">
                    <div class="card border-0">
                        <div class="card-body text-center bg-light ">
                            <h3> Name :{{ $data->name }}</h3>
                        </div>
                     <img src="{{asset('uploads/img/'. $data->image) }}" alt="not">
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
