@extends('layouts.admin.pages')
@section('content')
@section('hint')
    @include('layouts.admin.hints.src')
@endsection
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <form action="{{'/adm/' .  $src . '/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        @if($document->id)
            <input type="hidden" name="id" value="{{$document->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="name" class="form-control" required value="{{$document ? $document->name : old('name')}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Посилання</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="src" class="form-control" required value="{{$document ? $document->src : old('src')}}">
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{'/adm/' .  $src . '/'}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
@endsection