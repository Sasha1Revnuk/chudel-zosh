@extends('layouts.admin.pages')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <form action="{{'/adm/slider/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 class="form-box-header">{{$title}}</h4>
        @if($slider->id)
            <input type="hidden" name="id" value="{{$slider->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Зображення</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="image" class="form-control">
                </div>
                <span class="help-block"><code>Ширина зображення повинна бути не меньша ніж <b style="font-size: 15px">1920 px.</b> для якісного відображення</code></span>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{'/adm/slider/'}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>

@endsection