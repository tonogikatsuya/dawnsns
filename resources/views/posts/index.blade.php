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
    <a href="/public/images/edit.png"　alt="編集">編集</a>

  </td>
  <td>
    <a href="/public/images/trash_h.png"　onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"　alt="削除">削除</a>
  </td>
</tr>
@endforeach
</table>
@endsection
