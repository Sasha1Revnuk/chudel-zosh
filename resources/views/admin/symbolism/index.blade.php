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
    <form action="{{'/adm/symbolism/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        <input type="hidden" name="id" value="{{$symbolism->id}}">
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea-ckeditor">Гімн</label>
                <div class="col-md-10">
                    <textarea id="example-textarea-ckeditor" name="gimn" class="ckeditor">{{$symbolism->gimn}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Герб</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="gerb" class="form-control">
                </div><br />
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Задіяний герб</label>
                <div class="col-md-3">
                    <img src="{{$symbolism->getThumbnailGerb()}}" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Емблема</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="emblem" class="form-control">
                </div><br />
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Задіяна емблема</label>
                <div class="col-md-3">
                    <img src="{{$symbolism->getThumbnailEmblem()}}"  />
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection