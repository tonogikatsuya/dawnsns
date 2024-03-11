<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{
    //
    public function index(Request $request){
        $folloings = DB::table('follows')
        ->where('follower' , Auth::id())
        ->pluck('follow');
        $keyword = $request->input('keyword');
        $follows = DB::table('users')
            ->leftJoin('follows', 'users.id', 'follows.follow')
            ->where('username','like','%'.$keyword.'%')
            ->where('users.id' , '!=', Auth::id())
            ->select('users.id', 'users.username', 'users.images')
            ->get();

        return view('users.search',['follows'=>$follows, 'keyword'=> $keyword, 'folloings'=>$folloings]);
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
                if($mail != Auth::user()->mail){
                    if($request->isMethod('post')){
                        $data = $request->input();
                        $validator = validator::make(
                        $data,
                        [
                            'username' => ['required', 'between:4,12', ],
                            'mail' => ['required', 'email', 'unique:users,email,'.Auth::user()->mail.',mail'],
                            'password' => ['nullable', 'between:4,12', 'alpha_num'],
                            'bio' => ['nullable', 'max:200'],
                            'image' => ['nullable', 'image'],
                        ],
                        [
                            'username.required' => '必須項目です',
                            'username.between' => '4文字以上、12文字以内で入力して下さい',
                            'mail.required' => '必須項目です',
                            'mail.email' => 'メールアドレスではありません',
                            'mail.unique' => '登録済みのメールアドレスのため使用不可',
                            'password.between' => '4文字以上、12文字以内で入力して下さい',
                            'password.alpha_num' => '英数字のみで入力して下さい',
                            'bio.max' => '200文字以内で入力して下さい',
                            'image.image' => '画像ファイルで入力して下さい'
                        ]
                        );
                    };
                    } else {
                    if($request->isMethod('post')){
                        $validator = validator::make(
                        $data,
                        [
                        'username' => ['required', 'between:4,12', ],
                        'password' => ['nullable', 'between:4,12', 'alpha_num'],
                        'bio' => ['nullable', 'max:200'],
                        'image' => ['nullable', 'image'],
                        ],
                        [
                        'username.required' => '必須項目です',
                        'username.between' => '4文字以上、12文字以内で入力して下さい',
                        'password.between' => '4文字以上、12文字以内で入力して下さい',
                        'password.alpha_num' => '英数字のみで入力して下さい',
                        'bio.max' => '200文字以内で入力して下さい',
                        'image.image' => '画像ファイルで入力して下さい'
                        ]
                        );
                        };
                    };
                    if($validator->fails()) {
                            return redirect('/profile')
                            ->withErrors($validator)
                            ->withInput();
                        }
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

}
