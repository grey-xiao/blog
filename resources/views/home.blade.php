@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card mb-2">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
            @foreach(Auth::user()->posts as $post)
                <div class="card mb-2">
                    @if($post->created_at != $post->updated_at)
                    <div class="card-header">{{ $post->title.' - edited' }}</div>
                    @endif

                    <div class="card-body">
                    {{ $post->content ?? 'N/A' }}
                    <br>
                    Date: {{ $post->updated_at->carbonize()->format('jS \\of F Y h:i:s A') ?? 'N/A' }}
                    </div>
                    <div class="card-body d-flex">
                        <a class="btn btn-danger me-2" href="{{ route('post.destroy', $post) }}" role="button">Delete</a>
                        <a class="btn btn-success" href="{{ route('post.edit', $post) }}" role="button">Edit</a>
                    </div>
                </div>
            @endforeach

            <div class="card mb-2">
                <!-- <div class="card-header"></div> -->

                <div class="card-body">
                <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">Create New Post</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
