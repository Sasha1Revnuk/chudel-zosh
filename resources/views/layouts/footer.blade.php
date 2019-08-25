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
                        <li><a href="/"><span class="ion-ios-arrow-round-forward mr-2"></span>Головна</a></li>
                        <li><a style="color: rgba(255, 255, 255, 0.7)"><span class="ion-ios-arrow-round-forward mr-2"></span>Управлінська діяльність</a></li>
                            <li style="margin-left: 15px"><a href="/atestation"><span class="ion-ios-arrow-round-forward mr-2"></span>Атестація</a></li>
                            <li style="margin-left: 15px"><a href="/library"><span class="ion-ios-arrow-round-forward mr-2"></span>Шкільна бібліотека</a></li>
                            <li style="margin-left: 15px"><a href="/psychological-service"><span class="ion-ios-arrow-round-forward mr-2"></span>Психологічна служба</a></li>
                            <li style="margin-left: 15px"><a href="/civil-save"><span class="ion-ios-arrow-round-forward mr-2"></span>Цивільний захист</a></li>
                            <li style="margin-left: 15px"><a href="/normy"><span class="ion-ios-arrow-round-forward mr-2"></span>Документи</a></li>
                        <li><a style="color: rgba(255, 255, 255, 0.7)"><span class="ion-ios-arrow-round-forward mr-2"></span>Освітній процес</a></li>
                            <li style="margin-left: 15px">
                                <a  href="/methodical-work" ><span class="ion-ios-arrow-round-forward mr-2"></span>Методична робота</a>
                            </li>
                            <li style="margin-left: 15px">
                                <a  href="/educational-activities" ><span class="ion-ios-arrow-round-forward mr-2"></span>Виховна робота</a>
                            </li>
                            <li style="margin-left: 15px">
                                <a href="/educational-work"> <span class="ion-ios-arrow-round-forward mr-2"></span>Навчальна робота</a>
                            </li>
                            <li style="margin-left: 15px">
                                <a href="/inclusive-education" ><span class="ion-ios-arrow-round-forward mr-2"></span>Інклюзивне навчанання</a>
                            </li>
                            <li style="margin-left: 15px">
                                <a href="/professional-training-and-career-guidance"> <span class="ion-ios-arrow-round-forward mr-2"></span>Профільне навчання та профорієнтація</a>
                            </li>
                            <li style="margin-left: 15px"><a href="/nush"><span class="ion-ios-arrow-round-forward mr-2"></span>НУШ</a></li>
                            <li style="margin-left: 15px"   ><a href="/zno-dpa"><span class="ion-ios-arrow-round-forward mr-2"></span>ДПА і ЗНО</a></li>

                        <li><a href="/public-information" ><span class="ion-ios-arrow-round-forward mr-2"></span>Публічна інформація</a></li>
                        <li><a href="/news"><span class="ion-ios-arrow-round-forward mr-2"></span>Новини</a></li>
                        <li><a href="/for-pupils"><span class="ion-ios-arrow-round-forward mr-2"></span>Учням</a></li>
                        <li><a href="/for-pare  nts"><span class="ion-ios-arrow-round-forward mr-2"></span>Батькам</a></li>
                        <li><a href="/our-pride"><span class="ion-ios-arrow-round-forward mr-2"></span>Наша гордість</a></li>
                        <li><a href="/archive"><span class="ion-ios-arrow-round-forward mr-2"></span>Архів</a></li>
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