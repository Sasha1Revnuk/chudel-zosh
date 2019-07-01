@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    @if($data['news'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['news'] as $news)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                @if($news->image)
                                {!! '<a href="' . $news->getUrl() .'" class="block-20 d-flex align-items-end" style="background-image: url('. $news->getImage() .');">' !!}

                                <div class="meta-date text-center p-2">
                                    <span class="day">{{$news->created_at->format('d')}}</span>
                                    <span class="mos">{{$news->getMonth($news->created_at->format('F'))}}</span>
                                    <span class="yr">{{$news->created_at->format('Y')}}</span>
                                </div>
                                {!! '</a>' !!}
                                @else
                                    <div class="meta">
                                        <div><a><span class="icon-calendar"></span> {{$news->created_at->format('d')
                                        . ' ' . $news->getMonth($news->created_at->format('F')) . ', ' . $news->created_at->format('Y')}}</a></div>
                                    </div>
                                @endif
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$news->getUrl()}}">{{$news->name}}</a></h3>
                                    <p>{{$news->description}}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="{{$news->getUrl()}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto mb-0">
                                            <a class="mr-2">{{$news->user->full_name}}</a>
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
                            {{$data['news']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection