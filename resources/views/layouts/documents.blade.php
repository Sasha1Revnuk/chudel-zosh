@extends('layouts.page')
@section('banner')
    @include('layouts.banners')
@endsection
@section('content')
    @if($data['documents'])
        <section class="ftco-section bg-light">
            <div class="container">
                @if(Route::currentRouteName() == 'methodical-work')
                <div class="row">
                    <div class="col-md-12 col-lg-12 ftco-animate">
                        <div class="blog-entry">
                            <div class="text bg-white" style="text-align: center">
                                <h3 class="heading"><a target="_blank" href="/mo-teachers">МО вчителів</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    @foreach($data['documents'] as $document)
                        <div class="col-md-12 col-lg-6 ftco-animate">
                            <div class="blog-entry">
                                <div class="text bg-white p-4">
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