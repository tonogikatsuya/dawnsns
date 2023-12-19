@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
  <form action="/follow-list" method="get">
    <input type="image" src="/images/{{ $follow->images}}" alt="アイコン">
    @csrf
  </form>
@endforeach

@endsection
