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
    <h3 class="page-header">Зображення</h3>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="{{'/adm/slider/add'}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати слайдер</a>
            </div>
        </div>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Зображення</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Функції</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sliders as $slider)
            <tr>
                <td class="text-center">{{$slider->id}}</td>
                <td><img src="{{$slider->getThumbnail()}}" /></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{'/adm/slider/edit/' . $slider->id}}" data-toggle="tooltip" title="Редагувати" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{'/adm/slider/delete/' . $slider->id}}" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection