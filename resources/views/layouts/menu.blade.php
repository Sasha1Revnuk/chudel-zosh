<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand" href="{{route('main')}}">ЗОШ І-ІІІ ступенів</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <!-- <p class="button-custom order-lg-last mb-0"><a href="appointment.html" class="btn btn-secondary py-2 px-3">Make An Appointment</a></p> -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @foreach($data['menu'] as $item)
                    @if(is_array($item['src']))
                        <li class="nav-item  dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" >{{$item['name']}}</a >
                            <ul class="dropdown-menu">
                                @foreach($item['src'] as  $subitem)
                                    <li class="nav-item {{request()->path() == $subitem['src'] ? 'active' : ''}}">
                                        <a class="nav-link" href="{{$subitem['src']}}" style="color: #000; font-size: 15px;">{{$subitem['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item {{request()->path() == $item['src'] ? 'active' : ''}}"><a href="{{$item['src']}}" class="nav-link">{{$item['name']}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>