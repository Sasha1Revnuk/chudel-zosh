@extends('layouts.page')
@section('banner')
    @include('layouts.banners')
@endsection
@section('content')
    @if($data['documents'])
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                @if(Route::currentRouteName() == 'methodical-work')
                        <div class="col-md-12 col-lg-6 ftco-animate">
                            <div class="blog-entry" style="margin-bottom: 5px">
                                <div class="text bg-light ">
                                    <h3 class="heading"><a target="_blank" href="/mo-teachers">МО вчителів</a></h3>
                                </div>
                            </div>
                        </div>
                @endif
                @foreach($data['documents'] as $document)
                    <div class="col-md-12 col-lg-6 ftco-animate">
                        <div class="blog-entry" style="margin-bottom: 5px">
                            <div class="text bg-light">
                                <h3 class="heading"><a target="_blank" href="{{$document->src}}">{{$document->name}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
                    </div>
            </div>
        </section>
    @endif
@endsection