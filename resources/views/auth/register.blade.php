@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@error('username')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@error('mail')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
@error('password-confirm')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}



@endsection
