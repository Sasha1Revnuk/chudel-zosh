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
    @if($inclusive)
        <form action="{{'/adm/inclusive-education/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{$title}}</h4>
            <input type="hidden" name="id" value="{{$inclusive->id}}">
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="name" class="form-control" required value="{{$inclusive ? $inclusive->name : old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-textarea-ckeditor">Текст</label>
                    <div class="col-md-10">
                        <textarea id="example-textarea-ckeditor" name="text" class="ckeditor">{{$inclusive->text ? $inclusive->text : old('text')}}</textarea>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection