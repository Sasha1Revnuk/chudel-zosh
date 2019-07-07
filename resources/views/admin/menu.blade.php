<nav id="primary-nav">
    <ul>
        <li><a href="{{route('main-admin')}}" class="{{Route::currentRouteName() == 'main-admin' ? 'active' : ''}}"><i class="fa fa-fire"></i>Головна</a></li>
        <li><a href="{{route('admin-slider')}}" class="{{Route::currentRouteName() == 'admin-slider' ? 'active' : ''}}"><i class="fa fa-sliders"></i>Слайдер на головній</a></li>
        <li><a href="{{route('admin-news')}}" class="{{Route::currentRouteName() == 'admin-news' ? 'active' : ''}}"><i class="fa fa-newspaper-o"></i>Новини</a></li>
    </ul>
</nav>