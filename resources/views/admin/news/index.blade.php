@extends('layouts.admin.pages')
@section('content')
<div id="page-content">
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
    <h3 class="page-header">Новини</h3>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="{{'/adm/news/add'}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати новину</a>
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
        @if($news)
            @foreach($news as $item)
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td><a href="{{$item->getUrl()}}" title="Подивитись на сайті" target="_blank">{{$item->name}}</a></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{'/adm/news/access/' . $item->id}}" data-toggle="tooltip" title="{{$item->status == \App\Models\News::STATUS_ACTIVE ? 'Вимкнути новину на сайті (не видаляти)' : 'Ввімкнути новину'}}" class="btn btn-xs btn-{{$item->status == \App\Models\News::STATUS_ACTIVE ? 'default' : 'info'}}"><i class="{{$item->status == \App\Models\News::STATUS_ACTIVE ? 'fa fa-ban' : 'fa fa-check'}}"></i></a>
                            <a href="{{'/adm/news/edit/' . $item->id}}" data-toggle="tooltip" title="Редагувати" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{'/adm/news/delete/' . $item->id}}" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
                    {{$news->links('vendor.pagination.admin')}}
                </div>
            </div>
        </div>
</div>
@endsection