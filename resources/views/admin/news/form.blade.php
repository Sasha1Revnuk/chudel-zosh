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
    <form action="{{'/adm/news/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        @if($news->id)
            <input type="hidden" name="id" value="{{$news->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Поточна дата</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" readonly value="{{$news->created_at ? $news->created_at->format('d-m-Y') : old('created_at')}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Задати дату створення? (Або залиште поле порожнім)</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="created_at">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="name" class="form-control" required value="{{$news ? $news->name : old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea">Короткий опис</label>
                <div class="col-md-3">
                    <textarea id="example-textarea" name="description" class="form-control" required rows="7" cols="30">{{$news ? $news->description : old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea-ckeditor">Текст</label>
                <div class="col-md-10">
                    <textarea id="example-textarea-ckeditor" name="text" required class="ckeditor">{{$news ? $news->text : old('text')}}</textarea>
                </div>
            </div><div class="form-group">
                <label class="control-label col-md-2" for="example-file">Зображення</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="image" class="form-control">
                </div>
                <span class="help-block"><code>Ширина зображення повинна бути не меньша ніж <b style="font-size: 15px">800 px.</b> для якісного відображення</code></span>

            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Задіяне зображення</label>
                <div class="col-md-3">
                    
                    <img src="{{$news->getThumbnail()}}" />
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{'/adm/news/'}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
@endsection