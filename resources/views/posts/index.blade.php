@extends('layouts.login')

@section('content')
<form action="/create" method="post">
  @csrf
  <input type="text" name="newPost" placeholder="何をつぶやこうか？">
  <input type="image" src="/images/post.png" alt="投稿画像">
</form>

<table>
@foreach ($posts as $post)
<tr>
  <td>
    <img src="/images/{{ $post->images}}" alt="アイコン">
  </td>
  <td>{{ $post->username }}</td>
  <td>{{ $post->posts }}</td>
  <td>{{ $post->created_at }}</td>
  <td>
    <form action="/post/update" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $post->id }}">
      <input type="text" name="upPost" placeholder="何？">
      <input type="image" src="/images/post.png" alt="投稿画像">
    </form>

  </td>
  <td>
    <a href="/post/delete/{{ $post->id }}" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')" alt="削除">削除</a>
  </td>
</tr>
@endforeach
</table>
@endsection
