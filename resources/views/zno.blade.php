@extends('layouts.page')
@if($data['banner'])
@section('banner')
    @include('layouts.banners')
@endsection
@endif
@section('content')
    @if($data['znos'])
        <section class="ftco-section bg-light" >
            <div class="container">
                <div class="row">
                    @foreach($data['znos'] as $zno)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <div class="meta">
                                    <div><a><span class="icon-calendar"></span> {{$zno->created_at->format('d')
                                    . ' ' . $zno->getMonth($zno->created_at->format('F')) . ', ' . $zno->created_at->format('Y')}}</a></div>
                                </div>
                                <div class="text bg-white p-4">
                                    <h3 class="heading"><a href="{{$zno->getUrl()}}">{{$zno->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row no-gutters my-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{$data['znos']->links('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection