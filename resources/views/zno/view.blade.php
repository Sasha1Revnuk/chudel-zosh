@extends('layouts.page')
@section('content')
    @if($data['zno'])
        <section class="ftco-section" style="padding: 3em 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ftco-animate">
                        <h2 class="mb-3">{{$data['zno']->name}}</h2>
                        {!! $data['zno']->text !!}
                        <div class="about-author mt-12" style="margin-top: 30px; display: flex; flex-direction: row; justify-content: space-between;">
                                <h6><a style=""><span class="icon-calendar"></span> {{$data['zno']->created_at->format('d')
                                    . ' ' . $data['zno']->getMonth($data['zno']->created_at->format('F')) . ', ' . $data['zno']->created_at->format('Y')}}</a></h6>
                        </div>
                    </div> <!-- .col-md-8 -->

                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                            <form action="/zno/search" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Пошук виховних робіт за назвою" name="name">
                                </div>
                            </form>
                        </div>
                        @if(count($data['lastZno']) > 0)
                            <div class="sidebar-box ftco-animate" >
                            <h3>ЗНО</h3>
                            @foreach($data['lastZno'] as $lastZno)
                                <div class="block-21 mb-4 d-flex">
                                <div class="text">
                                    <h3 class="heading"><a href="{{$lastZno->getUrl()}}">{{$lastZno->name}}</a></h3>
                                    <div class="meta">
                                        <div><a><span class="icon-calendar"></span> {{$lastZno->created_at->format('d')
                                        . ' ' . $lastZno->getMonth($lastZno->created_at->format('F')) . ', ' . $lastZno->created_at->format('Y')}}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @if(count($data['archive']) > 0)
                            <div class="sidebar-box ftco-animate">
                                <h3>Архів</h3>
                                <ul class="categories">
                                    @foreach($data['archive'] as $archive)
                                        <li><a href="{{'/zno/search/year/' . $archive->year}}">{{$archive->year . ' рік'}}<span>{{$archive->data}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div><!-- END COL -->
                </div>
            </div>
        </section>
    @endif
@endsection