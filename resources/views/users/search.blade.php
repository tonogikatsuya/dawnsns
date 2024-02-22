@extends('layouts.login')

@section('content')
<form action="/search" method="get">
  @csrf
  <input type="text" name="keyword" placeholder="ユーザー名">
  <input type="submit" value="検索">
</form>
<p>検索ワード：{{ $keyword }}</p>


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
