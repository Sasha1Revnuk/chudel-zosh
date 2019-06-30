@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    @if($data['teachers'])
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                    @foreach($data['teachers'] as $teacher)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="staff">
                                <div class="img-wrap d-flex align-items-stretch">
                                    <div class="img align-self-stretch" style="background-image: url({{$teacher->getImage()}});"></div>
                                </div>
                                <div class="text pt-3 text-center">
                                    <h3>{{$teacher->name}}</h3>
                                    <span class="position mb-2">{{$teacher->status}}</span>
                                    <div class="faded">
                                        <p>{{$teacher->text}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    @endif
    @if($data['freeText'])
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12 ftco-animate">
                        {!! $data['freeText']->text !!}
                    </div> <!-- .col-md-8 -->
                <!-- END COL -->
            </div>
        </div>
    </section>
    @endif
@endsection