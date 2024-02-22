@extends('layouts.login')

@section('content')
<form action='/profile' method="post" enctype="multipart/form-data">
  @csrf
  <input type="text" name="username" value="{{ $user->username }}">
  <input type="text" name="mail" value="{{ $user->mail }}">
  <input type="text" value="⚫︎⚫︎⚫︎⚫︎⚫︎⚫︎">
  <input type="text" name="password" placeholder="NEW PASSWORD">
  <input type="text" name="bio" value="{{ $user->bio }}">
  <input type="file" name="image">
  <input type="submit" value="更新">
</form>

<img src="{{ asset('storage/img/' . $user->images) }}" >


@endsection
