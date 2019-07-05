@extends('layouts.admin.pages')
@section('content')
<div id="page-content">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <form action="{{'/adm/advantages/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        @if($advantage->id)
            <input type="hidden" name="id" value="{{$advantage->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва уроку</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="name" class="form-control" required value="{{$advantage ? $advantage->name : old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea">Текст</label>
                <div class="col-md-3">
                    <textarea id="example-textarea" name="text" class="form-control" required rows="5" cols="10">{{$advantage ? $advantage->text : old('text')}}</textarea>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{'/adm/advantages/'}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection