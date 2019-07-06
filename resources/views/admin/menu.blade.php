<nav id="primary-nav">
    <ul>
        <li><a href="{{route('main-admin')}}" class="{{Route::currentRouteName() == 'main-admin' ? 'active' : ''}}"><i class="fa fa-fire"></i>Головна</a></li>
        <li><a href="{{route('admin-slider')}}" class="{{Route::currentRouteName() == 'admin-slider' ? 'active' : ''}}"><i class="fa fa-sliders"></i>Слайдер на головній</a></li>
        <li><a href="{{route('admin-advantages')}}" class="{{Route::currentRouteName() == 'admin-advantages' ? 'active' : ''}}"><i class="fa fa-leaf"></i>Переваги</a></li>
        <li>
            <a href="#"><i class="fa fa-info"></i>Інф. відділ</a>
            <ul>
                <li><a href="{{route('admin-symbolism')}}" class="{{Route::currentRouteName() == 'admin-symbolism' ? 'active' : ''}}"><i class="fa fa-empire"></i>Символіка</a></li>
                <li><a href="{{route('admin-history')}}" class="{{Route::currentRouteName() == 'admin-history' ? 'active' : ''}}"><i class="fa fa-history"></i>Історія школи</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-print"></i>Пресс центр</a>
            <ul>
                <li><a href="{{route('admin-news')}}" class="{{Route::currentRouteName() == 'admin-news' ? 'active' : ''}}"><i class="fa fa-newspaper-o"></i>Новини</a></li>
            </ul>
        </li>
        </ul>
</nav>