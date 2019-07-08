<section class="home-slider owl-carousel">
    @foreach(\App\Models\Banner::all() as $banner)
        {!!'<div class="slider-item" style="background-image:url(' . $banner->getImage() . ');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">' .\App\Models\MainText::first()->banner_label . '</h1>
          </div>
        </div>
        </div>
        </div>'  !!}
    @endforeach
</section>