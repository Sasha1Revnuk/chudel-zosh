@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @if($data['symbolism']->gerb)
                    <div class="col-md-3 col-lg-4 ftco-animate">
                        <div class="pricing-entry bg-light pb-4 text-center">
                            <div>
                                <h3 class="mb-3">Герб школи</h3>
                            </div>
                            <img src="{{$data['symbolism']->getGerb()}}" />
                        </div>
                    </div>
                @endif
                @if($data['symbolism']->gimn)
                    <div class="col-md-3 col-lg-4 ftco-animate">
                        <div class="pricing-entry bg-light pb-4 text-center">
                            <div>
                                <h3 class="mb-3">Гімн школи</h3>
                            </div>
                            <div class="px-4">
                                {!! $data['symbolism']->gimn !!}
                            </div>
                        </div>
                    </div>
                @endif
                @if($data['symbolism']->emblem)
                    <div class="col-md-3 col-lg-4 ftco-animate">
                        <div class="pricing-entry bg-light pb-4 text-center">
                            <div>
                                <h3 class="mb-3">Емблема школи</h3>
                            </div>
                            <img src="{{$data['symbolism']->getEmblem()}}" />
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection