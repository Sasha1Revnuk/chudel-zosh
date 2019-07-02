@extends('layouts.page')
@section('content')
    @if($data['dpa'])
        <section class="ftco-section" style="padding: 3em 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ftco-animate">
                        <h2 class="mb-3">{{$data['dpa']->name}}</h2>
                        {!! $data['dpa']->text !!}
                        <div class="about-author mt-12" style="margin-top: 30px; display: flex; flex-direction: row; justify-content: space-between;">
                                <h6><a style=""><span class="icon-calendar"></span> {{$data['dpa']->created_at->format('d')
                                    . ' ' . $data['dpa']->getMonth($data['dpa']->created_at->format('F')) . ', ' . $data['dpa']->created_at->format('Y')}}</a></h6>
                        </div>
                    </div> <!-- .col-md-8 -->

                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                            <form action="/dpa/search" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Пошук виховних робіт за назвою" name="name">
                                </div>
                            </form>
                        </div>
                        @if(count($data['lastDpas']) > 0)
                            <div class="sidebar-box ftco-animate" >
                            <h3>ДПА</h3>
                            @foreach($data['lastDpas'] as $lastDpa)
                                <div class="block-21 mb-4 d-flex">
                                <div class="text">
                                    <h3 class="heading"><a href="{{$lastDpa->getUrl()}}">{{$lastDpa->name}}</a></h3>
                                    <div class="meta">
                                        <div><a><span class="icon-calendar"></span> {{$lastDpa->created_at->format('d')
                                        . ' ' . $lastDpa->getMonth($lastDpa->created_at->format('F')) . ', ' . $lastDpa->created_at->format('Y')}}</a></div>
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
                                        <li><a href="{{'/dpa/search/year/' . $archive->year}}">{{$archive->year . ' рік'}}<span>{{$archive->data}}</span></a></li>
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