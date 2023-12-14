<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{
    //
    public function index(){
        $follows = DB::table('users')
            ->leftJoin('follows', 'users.id', 'follows.follow')
            ->select('users.id', 'users.username', 'users.images')
            ->get();

        return view('users.search',['follows'=>$follows]);
    }

    public function addfollow($follow){
        DB::table('follows')->insert([
            'follow' => $follow,
            'follower' => Auth::id(),
            'created_at' => now(),
        ]);
        return back();
    }

    public function remfollow($follow){
        DB::table('follows')
        ->where([
            ['follow', '=', $follow],
            ['follower', '=', Auth::id()],
        ])
        ->delete();
        return back();
    }

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
