<section class="ftco-section ftco-no-pt ftc-no-pb" >
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                <div class="text px-4 ftco-animate">
                    <h2 class="mb-1" style="text-align:center">Герб школи</h2>
                    <p style="text-align:center"><img src="{{$data['symbolism']->getGerb()}}" /></p>
                    <h2 class="mb-1" style="text-align:center">Гімн школи</h2>
                    {!! \App\Models\Symbolism::first()->gimn ?? '' !!}
                </div>
            </div>
            <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                <h2 class="mb-1">Наша історія</h2>
                <div class="row mt-1">
                    <div class="col-lg-12 ftco-animate">
                        <h2 class="mb-1" style="text-align: center"></h2>
                        {!! $data['mainText']->history !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section" style="padding: 3em 0;">
    <div class="container">
        <div class="row">
            @if($data['mainText'])
                <div class="col-lg-12 ftco-animate">
                    {!! $data['mainText']->teachers !!}
                </div> <!-- .col-md-8 -->
            @endif
        <!-- END COL -->
        </div>
    </div>
</section>