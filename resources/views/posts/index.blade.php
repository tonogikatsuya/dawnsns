@extends('layouts.login')

@section('content')
<form action="/create" method="post">
  @csrf
  <input type="text" name="newPost" maxlength="150" placeholder="何をつぶやこうか？">
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
  @if($post->user_id == Auth::id())
  <td>
    <div class="/post/update" >
      <div class="modalopen" data-target="modal{{ $post->id }}">
        <img class="/post/update" src="./images/post.png" alt="投稿画像">
      </div>
    </div>
    <div class="modal-main js-modal" id="modal{{ $post->id }}">
      <div class="modal-inner">
        <div class="inner-content">
          <form action="/post/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="text" name="upPost" maxlength="150" value="{{ $post->posts }}">
            <input type="image" src="/images/post.png" alt="投稿画像">
          </form>
        </div>
      </div>
    </div>

  </td>
  <td>
    <a href="/post/delete/{{ $post->id }}" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')" alt="削除" ><img src="/images/trash.png" onmouseover="this.src='/images/trash_h.png'" onmouseout="this.src='/images/trash.png'"alt="削除"></a>
  </td>
     @endif
</tr>
@endforeach
</table>
@endsection
