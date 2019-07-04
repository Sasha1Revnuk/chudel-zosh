@extends('layouts.admin.pages')
@section('content')
    @if($role->role_id == \App\Models\User::ROLE_ROOT)
        @include('admin.index.root')
    @endif
    @if($role->role_id == \App\Models\User::ROLE_ADMIN)
        @include('admin.index.admin')
    @endif
@endsection