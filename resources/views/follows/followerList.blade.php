@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<img src="images/{{ $follower->images}}">
@endforeach

@foreach($posts as $post)
<td>{{ $post->posts }}</td>
<td>{{ $post->created_at }}</td>

@endforeach

@endsection
