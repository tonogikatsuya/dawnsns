<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
     $follows = DB::table('folows')
        ->join('users', 'follows.id', '=', 'users.id')
            ->select('follows.id', 'follows.id', 'follows.posts', 'follows.created_at', 'users.username', 'users.images')
            ->get();
        return view('follows.followerList');
    }

    public function followerList(){
        return view('follows.followerList');
    }
}
