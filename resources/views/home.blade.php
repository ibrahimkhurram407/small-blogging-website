@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->topic }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <a href="{{ route('post') }}" class="btn btn-primary">New Post</a>
        </div>
    </div>
</div>
@endsection
