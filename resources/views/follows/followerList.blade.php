@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<a href="/other-profile/{{ $follow->id }}"><img src="images/{{ $follow->images }}"></a>
@endforeach

@foreach($posts as $post)
<td>{{ $post->posts }}</td>
<td>{{ $post->created_at }}</td>

@endforeach

@endsection
