@extends('layouts.page')
@section('banner')
    @include('layouts.banners')
@endsection
@section('content')
    @if($data['mo_teachers'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['mo_teachers'] as $mo_teachers)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                @if($mo_teachers->image)
                                {!! '<a href="' . $mo_teachers->src .'" class="block-20 d-flex align-items-end" style="background-image: url('. $mo_teachers->getImage() .');">' !!}
                                {!! '</a>' !!}
                                @endif
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$mo_teachers->src}}">{{$mo_teachers->name}}</a></h3>
                                    <p>{{$mo_teachers->description}}</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="{{$mo_teachers->src}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['mo_teachers']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection