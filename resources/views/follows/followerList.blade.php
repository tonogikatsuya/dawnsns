@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<img src="images/{{ $follower->images}}">
@endforeach


@endsection
