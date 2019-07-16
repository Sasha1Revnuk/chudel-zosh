@extends('layouts.admin.pages')
@section('content')
    @if($value = \Illuminate\Support\Facades\Session::pull('PasswordChange'))
        <div class="alert alert-success alert-dismissible" style="z-index: 9999">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$value}}
        </div>
    @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('ProfileChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
    <h3 class="page-header">{{$title}}</h3>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="{{'/adm/mo-teachers/add'}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати об'єднання</a>
            </div>
        </div>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Назва</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Функції</th>
        </tr>
        </thead>
        <tbody>
        @if($moTeachers)
            @foreach($moTeachers as $item)
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{'/adm/mo-teachers/edit/' . $item->id}}" data-toggle="tooltip" title="Редагувати" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{'/adm/mo-teachers/delete/' . $item->id}}" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
        <div class="row">

            <div class="col-sm-12 col-xs-12 clearfix">
                <div class="dataTables_paginate paging_bootstrap" id="example-datatables3_paginate">
                    {{$moTeachers->links('vendor.pagination.admin')}}
                </div>
            </div>
        </div>
@endsection