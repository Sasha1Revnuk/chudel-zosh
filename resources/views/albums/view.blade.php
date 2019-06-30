@extends('layouts.page')
@section('content')
    @if(count($data['albums']->photos) > 0)
        <section class="ftco-gallery">
            <div class="container-wrap">
                <div class="row no-gutters">
                    @foreach($data['albums']->photos as $photo)
                        @if($photo->name)
                            <div class="col-md-3 ftco-animate">
                                <a href="{{$photo->getImage()}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{$photo->getImage()}}); max-width: 300px; max-height: 150px; margin-bottom: 15px">
                                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                        <span class="icon-view_stream"></span>
                                    </div>
                                </a>
                            </div>
                        @endif
                  @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection