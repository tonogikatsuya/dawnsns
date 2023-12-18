@extends('layouts.login')

@section('content')
<form action="/follow-list" method="get">
  <input type="image" src="/images/{{ $follows->images}}" alt="アイコン">
  @csrf
</form>

@foreach
<table>
  <td>
    <img src="/images/{{ $post->images}}" alt="アイコン">
  </td>
  <td>{{ $follows->username }}</td>
  <td>{{ $follows->posts }}</td>
  <td>{{ $follows->created_at }}</td>
</table>
@endsection
