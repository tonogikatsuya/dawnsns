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
    <a href="/public/images/edit.png">編集</a>

  </td>
  <td>
    <img src="/images/trash_h.png" alt="削除">
  </td>
</tr>
@endforeach
</table>
@endsection
