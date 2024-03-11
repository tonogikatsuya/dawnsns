@extends('layouts.login')

@section('content')
<form action="/search" method="get">
  @csrf
  <input type="text" name="keyword" placeholder="ユーザー名">
  <input type="submit" value="検索">
</form>
@if(isset($keyword))
<p>検索ワード：{{ $keyword }}</p>
@endif


<table>
@foreach ($follows as $follow)
<tr>
  <td>
    <img src="/images/{{ $follow->images }}" alt="アイコン">
  </td>
  <td>{{ $follow->username }}</td>
  <td>
    @if($folloings->contains($follow->id))
    <a href="/remfollow/{{ $follow->id }}" alt="フォローをはずす">フォローをはずす</a>
    @else
    <a href="/addfollow/{{ $follow->id }}" alt="フォローする">フォローする</a>
    @endif
  </td>
</tr>
@endforeach
</table>


@endsection
