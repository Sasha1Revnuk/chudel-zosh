@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    @if($data['announcement'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['announcement'] as $announcement)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <div class="meta">
                                    <div><a><span class="icon-calendar"></span> {{$announcement->created_at->format('d')
                                    . ' ' . $announcement->getMonth($announcement->created_at->format('F')) . ', ' . $announcement->created_at->format('Y')}}</a></div>
                                </div>
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$announcement->getUrl()}}">{{$announcement->name}}</a></h3>
                                    <p>{{$announcement->description}}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="{{$announcement->getUrl()}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto mb-0">
                                            <a class="mr-2">{{$announcement->user->full_name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['announcement']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection