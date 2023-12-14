@extends('layouts.login')

@section('content')
<form action="/search" method="post">
  @csrf
  <input type="text" name="userName" placeholder="ユーザー名">
</form>

<table>
@foreach ($follows as $follow)
<tr>
  <td>
    <img src="/images/{{ $follow->images }}" alt="アイコン">
  </td>
  <td>{{ $follow->username }}</td>
  <td>
    <a href="/addfollow/{{ $follow->id }}" alt="フォローする">フォローする</a>
    <a href="/remfollow/{{ $follow->id }}" alt="フォローをはずす">フォローをはずす</a>
  </td>
</tr>
@endforeach
</table>


@endsection
