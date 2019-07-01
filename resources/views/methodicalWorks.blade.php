@extends('layouts.page')
@if($data['banner'])
@section('banner')
    @include('layouts.banners')
@endsection
@endif
@section('content')
    @if($data['methodicalWorks'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['methodicalWorks'] as $methodicalWorks)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <div class="meta">
                                    <div><a><span class="icon-calendar"></span> {{$methodicalWorks->created_at->format('d')
                                    . ' ' . $methodicalWorks->getMonth($methodicalWorks->created_at->format('F')) . ', ' . $methodicalWorks->created_at->format('Y')}}</a></div>
                                </div>
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$methodicalWorks->getUrl()}}">{{$methodicalWorks->name}}</a></h3>
                                    <p>{{$methodicalWorks->description}}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="{{$methodicalWorks->getUrl()}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['methodicalWorks']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection