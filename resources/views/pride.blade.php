@extends('layouts.page')
@section('banner')
    @include('layouts.banners')
@endsection
@section('content')
    @if($data['pride'])
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                    @foreach($data['pride'] as $pride)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="staff">
                                @if($pride->image)
                                    <div class="img-wrap d-flex align-items-stretch">
                                        <div class="img align-self-stretch" style="background-image: url({{$pride->getImage()}});"></div>
                                    </div>
                                @endif
                                <div class="text pt-3 text-center">
                                    <h3>{{$pride->name}}</h3>
                                    <div class="faded">
                                        <p>{{$pride->text}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            <div class="row no-gutters my-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{$data['pride']->links('vendor.pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection