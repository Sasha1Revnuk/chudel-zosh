<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">Новини</h2>
            </div>
        </div>
        <div class="row">
            @foreach(\App\Models\News::where('status', \App\Models\News::STATUS_ACTIVE)->with('user')->orderBy('created_at', 'desc')->limit(\App\Models\Setting::where('name', 'mainPage_news')->first()->value)->get() as $news)
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="blog-entry">
                    {!! '<a href="/news/' . $news->id .'" class="block-20 d-flex align-items-end" style="background-image: url('. $news->getImage() .');">' !!}
                        <div class="meta-date text-center p-2">
                            <span class="day">{{$news->created_at->format('d')}}</span>
                            <span class="mos">{{$news->getMonth($news->created_at->format('F'))}}</span>
                            <span class="yr">{{$news->created_at->format('Y')}}</span>
                        </div>
                    {!! '</a>' !!}
                    <div class="text bg-white p-4">
                        <h3 class="heading"><a href="{{'/news/' . $news->id}}">{{$news->name}}</a></h3>
                        <p>{{$news->description}}</p>
                        <div class="d-flex align-items-center mt-4">
                            <p class="mb-0"><a href="{{'/news/' . $news->id}}" class="btn btn-secondary">Читати детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                            <p class="ml-auto mb-0">
                                <a class="mr-2">{{$news->user->full_name}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
