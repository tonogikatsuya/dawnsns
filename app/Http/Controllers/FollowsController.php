<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
        $follows = DB::table('folows')
        ->join('users', 'follows.id', '=', 'users.id')
            ->select('follows.id', 'follows.id', 'follows.posts', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.index',['follows'=>$follows]);
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
