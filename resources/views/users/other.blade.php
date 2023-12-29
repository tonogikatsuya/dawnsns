@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<td>{{ $follow->username }}</td>
<td>
  <a href="/other-profile/{{ $follow->id }}"  alt="アイコン">>/images/{{ $follow->images }}</a>
</td>
<td>{{ $follow->created_at }}</td>
@endforeach


@endsection
