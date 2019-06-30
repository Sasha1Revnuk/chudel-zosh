@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    @if($data['albums'])
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    @foreach($data['albums'] as $album)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{$album->getUrl()}}" class="block-20 d-flex align-items-end" style="background-image: url({{$album->getImage()}});"></a>
                            <div class="text bg-white p-4">
                                <h3 class="heading"><a href="{{$album->getUrl()}}">{{$album->name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['albums']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection