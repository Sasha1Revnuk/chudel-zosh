@extends('layouts.page')
@if($data['banner'])
@section('banner')
    @include('layouts.banners')
@endsection
@endif
@section('content')
    @if($data['educationalWorks'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['educationalWorks'] as $educationalWorks)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <div class="meta">
                                    <div><a><span class="icon-calendar"></span> {{$educationalWorks->created_at->format('d')
                                    . ' ' . $educationalWorks->getMonth($educationalWorks->created_at->format('F')) . ', ' . $educationalWorks->created_at->format('Y')}}</a></div>
                                </div>
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$educationalWorks->getUrl()}}">{{$educationalWorks->name}}</a></h3>
                                    <p>{{$educationalWorks->description}}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="{{$educationalWorks->getUrl()}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['educationalWorks']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection