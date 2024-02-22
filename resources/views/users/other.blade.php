@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<td>
    <img src="/images/{{ $follow->images }}" alt="アイコン">
  </td>
<td>{{ $follow->username }}</td>
<td>{{ $follow->bio }}</td>
@endforeach

@foreach($posts as $post)
<td>
    <img src="/images/{{ $post->images }}" alt="アイコン">
  </td>
<td>{{ $post->posts }}</td>
<td>{{ $post->created_at }}</td>
@endforeach



@endsection
