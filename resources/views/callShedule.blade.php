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
                @if($data['callShedule'])
                    <div class="col-lg-12 ftco-animate">
                        <h2 class="mb-3" style="text-align: center">{{$data['callShedule']->name}}</h2>
                        {!! $data['callShedule']->text !!}
                    </div> <!-- .col-md-8 -->
                @endif
                <!-- END COL -->
            </div>
        </div>
    </section>
@endsection