<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Контакти</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{$data['settings']['address']}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{$data['settings']['phone']}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{$data['settings']['email']}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Новини</h2>
                    @foreach(\App\Models\News::where('status', \App\Models\News::STATUS_ACTIVE)->with('user')->orderBy('created_at', 'desc')->limit(\App\Models\Setting::where('name', 'mainPage_news')->first()->value)->get() as $news)
                    <div class="block-21 mb-5 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{$news->getImage()}});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{$news->getUrl()}}">{{$news->name}}</a></h3>
                            <div class="meta">
                                <div><a><span class="icon-calendar"></span> {{$news->created_at}}</a></div>
                                <div><a><span class="icon-person"></span> {{$news->user->full_name}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">Меню</h2>
                    <ul class="list-unstyled">
                        @foreach($data['menu'] as $item)
                            @if(is_array($item['src']))
                                <li><a style="color: rgba(255, 255, 255, 0.7)"><span class="ion-ios-arrow-round-forward mr-2"></span>{{$item['name']}}</a></li>
                                @foreach($item['src'] as  $subitem)
                                    <li style="margin-left: 15px"><a href="{{$subitem['src']}}"><span class="ion-ios-arrow-round-forward mr-2"></span>{{$subitem['name']}}</a></li>
                                @endforeach
                            @else
                                <li><a href="{{$item['src']}}"><span class="ion-ios-arrow-round-forward mr-2"></span>{{$item['name']}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>Copyright &copy;2019 All rights reserved</p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/scrollax.min.js')}}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>--}}
{{--<script src="{{asset('js/google-map.js')}}"></script>--}}
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>