@extends('layouts.page')
@if($data['banner'])
@section('banner')
    @include('layouts.banners')
@endsection
@endif
@section('content')
    @if($data['dpas'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['dpas'] as $dpa)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <div class="meta">
                                    <div><a><span class="icon-calendar"></span> {{$dpa->created_at->format('d')
                                    . ' ' . $dpa->getMonth($dpa->created_at->format('F')) . ', ' . $dpa->created_at->format('Y')}}</a></div>
                                </div>
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$dpa->getUrl()}}">{{$dpa->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['dpas']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection