<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follows = DB::table('follows')
            ->join('users', 'follows.id', '=', 'users.id')
            ->where('follower',  Auth::id())
            ->select('follows.id', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('follows','users.id', '=', 'follows.follow')
            ->where('follower',  Auth::id())
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followList', ['follows'=>$follows, 'posts'=>$posts]);
    }

    public function followerList(){
        $follows = DB::table('follows')
            ->join('users', 'follows.id', '=', 'users.id')
            ->where('follow', Auth::id())
            ->select('follows.id', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('follow', Auth::id())
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followerList', ['follows'=>$follows, 'posts'->$post]);
    }

    public function otherUser(){
        $follows = DB::table('follows')
            ->join('users', 'follows.id', '=', 'users.id')
            ->select('users.id', 'users.username', 'users.bio', 'users.images')
            ->get();
    return view('users.other');
    }
}
