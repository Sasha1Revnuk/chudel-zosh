@extends('layouts.page')
@section('banner')
    @include('layouts.banners')
@endsection
@section('content')

        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    @if($data['inclusive'])
                        <div class="col-lg-12 ftco-animate">
                            <h2 class="mb-3" style="text-align: center">{{$data['inclusive']->name}}</h2>
                            {!! $data['inclusive']->text !!}
                        </div> <!-- .col-md-8 -->
                        <!-- END COL -->
                    @endif
                </div>
            </div>
        </section>

@endsection