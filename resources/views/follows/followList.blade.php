@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<a href="/other-profile/{{ $follow->id }}"><img src="images/{{ $follow->images }}"></a>
<td>{{ $follow->username }}</td>
@endforeach

@foreach($posts as $post)
<td>{{ $post->username }}</td>
<td>{{ $post->posts }}</td>
<td>{{ $post->created_at }}</td>

@endforeach

@endsection
