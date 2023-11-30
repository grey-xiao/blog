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
            <div class="card mb-2">
                <div class="card-header">{{ $user->post->title ?? 'N/A' }}</div>

                <div class="card-body">
                   {{ $user->post->content ?? 'N/A' }}
                   <br>
                   Date: {{ $user->post->timestamps ?? 'N/A' }}
                </div>
                <div class="card-body">
                   Delete Edit
                </div>
            </div>

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
