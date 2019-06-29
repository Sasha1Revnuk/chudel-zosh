<section class="home-slider owl-carousel">
    @foreach(\App\Models\Banner::all() as $banner)
        {!!'<div class="slider-item" style="background-image:url(' . $banner->getImage() . ');"></div>'  !!}
    @endforeach
</section>