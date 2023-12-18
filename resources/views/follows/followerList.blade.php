@extends('layouts.login')

@section('content')
<form action="/follow-list" method="post">
  <input type="image" src="/images/{{ $follows->images}}" alt="アイコン">
  @csrf

</form>
@
@endsection
