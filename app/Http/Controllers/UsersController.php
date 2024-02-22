<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{
    //
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $follows = DB::table('users')
            ->leftJoin('follows', 'users.id', 'follows.follow')
            ->where('username','like','%'.$keyword.'%')
            ->select('users.id', 'users.username', 'users.images')
            ->get();
        return view('users.search',['follows'=>$follows, 'keyword'=> $keyword]);
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
        $user = DB::table('users')
        ->where('id','=', Auth::id())
        ->select('username', 'mail', 'password', 'username', 'bio', 'images')
        ->first();

        return view('users.profile',['user'=>$user]);
    }

    public function upProfile(Request $request){
        $user = $request->input('username');
        $id = Auth::id();
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        DB::table('users')
            ->where('id',$id)
            ->update([
                    'username' => $user,
                    'mail' => $mail,
                    'bio' => $bio
                ]);
        if(!empty($password)){
            DB::table('users')
            ->where('id',$id)
            ->update([
                    'password' => bcrypt($password)
                ]);

        }
        $image = $request->file('image');
        if(!empty($image)){
            $dir = 'img';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            DB::table('users')
                ->where('id',$id)
                ->update([
                        'images' => $file_name
            ]);
        }
        return redirect('/profile');
    }

    public function search(){
        return view('users.search');
    }
}
