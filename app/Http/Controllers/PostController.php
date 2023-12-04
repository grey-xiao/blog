<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->posts()->create($data);

        return redirect('/home');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->posts()->update($data);

        return redirect('/home');
    }

    public function destroy($post){
        auth()->user()->posts()->delete($post);

        return redirect('/home');
    }
}
