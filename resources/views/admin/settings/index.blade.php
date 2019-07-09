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
    @if($settings)
        <form action="{{'/adm/settings/save'}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{$title}}</h4>
            <div class="form-box-content">
                @foreach($settings as $item)
                <div class="form-group">
                    <label class="control-label col-md-3" for="example-input-normal">{{$item->title}}</label>
                    <div class="col-md-3">
                        @if($item->type == \App\Models\Setting::TYPE_NUMBER)
                            <input type="number" min="1" max="100"  name="{{$item->name}}" class="form-control" required value="{{$item ? $item->value : old($item->name)}}">
                        @else
                            <input type="text" id="example-input-normal" name="{{$item->name}}" class="form-control" required value="{{$item ? $item->value : old($item->name)}}">
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection