<nav id="primary-nav">
    <ul>
        <li><a href="{{route('main-admin')}}" class="{{Route::currentRouteName() == 'main-admin' ? 'active' : ''}}"><i class="fa fa-fire"></i>Головна</a></li>
        <li><a href="{{route('admin-slider')}}" class="{{Route::currentRouteName() == 'admin-slider' ? 'active' : ''}}"><i class="fa fa-sliders"></i>Слайдер на головній</a></li>
        <li><a href="{{route('admin-symbolism')}}" class="{{Route::currentRouteName() == 'admin-symbolism' ? 'active' : ''}}"><i class="fa fa-empire"></i>Символіка</a></li>
    </ul>
</nav>