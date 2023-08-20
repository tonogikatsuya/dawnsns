<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/top');

    }
}
