@extends('layouts.admin.pages')
@section('content')
@section('hint')
    @include('layouts.admin.hints.text')
@endsection
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <form action="{{'/adm/our-pride/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        @if($pride->id)
            <input type="hidden" name="id" value="{{$pride->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="name" class="form-control" required value="{{$pride ? $pride->name : old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea">Підпис</label>
                <div class="col-md-8">
                    <textarea id="example-textarea" name="text" class="form-control" required rows="7" cols="300">{{$pride ? $pride->text : old('text')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Зображення</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="image" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Задіяне зображення</label>
                <div class="col-md-3">
                    
                    <img src="{{$pride->getThumbnail()}}" />
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{'/adm/our-pride/'}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
@endsection