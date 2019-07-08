@extends('layouts.page')
@section('content')
    @if($data['news'])
        <section class="ftco-section" style="padding: 3em 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ftco-animate">
                        <h2 class="mb-3">{{$data['news']->name}}</h2>
                        @if($data['news']->image)
                        <p>
                            <img src="{{$data['news']->getImage()}}" alt="{{$data['news']->image}}" class="img-fluid">
                        </p>
                        @endif
                        {!! $data['news']->text !!}
                        <div class="about-author mt-12" style="margin-top: 30px; display: flex; flex-direction: row; justify-content: space-between;">
                                <h6><a style=""><span class="icon-calendar"></span> {{$data['news']->created_at->format('d')
                                    . ' ' . $data['news']->getMonth($data['news']->created_at->format('F')) . ', ' . $data['news']->created_at->format('Y')}}</a></h6>
                            <h6><b>Автор: </b>{{$data['news']->user->full_name}}</h6>
                        </div>
                    </div> <!-- .col-md-8 -->

                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                            <form action="/news/search" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Пошук новин за назвою" name="name">
                                </div>
                            </form>
                        </div>
                        @if(count($data['lastNews']) > 0)
                            <div class="sidebar-box ftco-animate" >
                            <h3>Новини</h3>
                            @foreach($data['lastNews'] as $lastNews)
                                <div class="block-21 mb-4 d-flex">

                                    <a class="blog-img mr-4" href="{{$lastNews->getUrl()}}" style="background-image: url({{$lastNews->getImage()}});"></a>

                                <div class="text">
                                    <h3 class="heading"><a href="{{$lastNews->getUrl()}}">{{$lastNews->name}}</a></h3>
                                    <div class="meta">
                                        <div><a><span class="icon-calendar"></span> {{$lastNews->created_at->format('d')
                                        . ' ' . $lastNews->getMonth($lastNews->created_at->format('F')) . ', ' . $lastNews->created_at->format('Y')}}</a></div>
                                        <div><a><span class="icon-person"></span> {{$lastNews->user->full_name}}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @if(count($data['archive']) > 0)
                            <div class="sidebar-box ftco-animate">
                                <h3>Пошук за датою</h3>
                                <ul class="categories">
                                    @foreach($data['archive'] as $year => $monthArray)
                                        <li style=" border-bottom: #218a38 dashed"><a href="{{'/news/search?year=' . $year}}">{{$year . ' рік'}}</a></li>
                                        @foreach($monthArray as $month => $collections)
                                            <li style="margin-left: 20px;"><a href="{{'/news/search?year=' . $year . '&month=' . $month}}">{{\App\Http\Controllers\Controller::getStockMonth($month)}}<span>{{count($collections)}}</span></a></li>
                                        @endforeach
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