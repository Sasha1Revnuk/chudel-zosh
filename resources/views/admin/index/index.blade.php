@extends('layouts.admin.pages')
@section('content')
    @if($data['role']->role_id == \App\Models\User::ROLE_ROOT)
        @include('admin.index.root')
    @endif
@endsection