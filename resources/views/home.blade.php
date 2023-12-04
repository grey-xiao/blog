@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(Auth::user()->posts->count() <1)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-center h3 no-post">
                            {{ __('No post yet') }}
                        </div>
                    </div>
                </div>
            @else
                @foreach(Auth::user()->posts as $post)
                    <div class="card mb-2">
                        @if($post->created_at != $post->updated_at)
                        <div class="card-header">{{ $post->title.' - edited' }}</div>
                        @else
                        <div class="card-header">{{ $post->title }}</div>
                        @endif

                        <div class="card-body">
                            {{ $post->content ?? 'N/A' }}
                            <br>
                            Date: {{ $post->updated_at->carbonize()->format('jS \\of F Y h:i:s A') ?? 'N/A' }}
                            </div>
                            <div class="card-body d-flex">
                                <div class="me-2">
                                    <form action="{{ route('post.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                                
                                <a class="btn btn-success" href="{{ route('post.edit', $post) }}" role="button">Edit</a>
                            </div>
                    </div>
                @endforeach
            @endif

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
