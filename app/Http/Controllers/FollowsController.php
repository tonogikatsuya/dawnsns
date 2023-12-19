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
            ->where('follow',  Auth::id())
            ->select('follows.id', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followList', ['follows'=>$follows]);
    }

    public function followerList(){
        $follows = DB::table('follows')
            ->join('users', 'follows.id', '=', 'users.id')
            ->where('follower', Auth::id())
            ->select('follows.id', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followerList', ['follows'=>$follows]);
    }
}
