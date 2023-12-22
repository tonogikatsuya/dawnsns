@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<img src="images/{{ $follow->images}}">

@endforeach

@endsection
