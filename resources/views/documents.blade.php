@extends('layouts.page')
@if($data['banner'])
@section('banner')
    @include('layouts.banners')
@endsection
@endif
@section('content')
    @if($data['documents'])
        <section class="ftco-section bg-light">
            <div class="container">
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