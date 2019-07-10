<nav id="primary-nav">
    <ul>
        <li><a href="{{route('main-admin')}}" class="{{Route::currentRouteName() == 'main-admin' ? 'active' : ''}}"><i class="fa fa-fire"></i>Головна</a></li>
        <li><a href="{{route('admin-symbolism')}}" class="{{Route::currentRouteName() == 'admin-symbolism' ? 'active' : ''}}"><i class="fa fa-empire"></i>Символіка</a></li>
        <li><a href="{{route('admin-slider')}}" class="{{Route::currentRouteName() == 'admin-slider' ? 'active' : ''}}"><i class="fa fa-sliders"></i>Слайдер на головній</a></li>
        <li><a href="{{route('admin-main-text')}}" class="{{Route::currentRouteName() == 'admin-main-text' ? 'active' : ''}}"><i class="fa fa-file-text"></i>Текст на головній</a></li>
        <li>
            <a href="#"><i class="fa fa-th-list"></i>Упр. діяльність</a>
            <ul>
                <li><a href="{{route('admin-atestation')}}" class="{{Route::currentRouteName() == 'admin-atestation' ? 'active' : ''}}"><i class="fa fa-dot-circle-o"></i>Атестація</a></li>
                <li><a href="{{route('admin-library')}}" class="{{Route::currentRouteName() == 'admin-library' ? 'active' : ''}}"><i class="fa fa-book"></i>Шкільна бібліотека</a></li>
                <li><a href="{{route('admin-psychological-service')}}" class="{{Route::currentRouteName() == 'admin-psychological-service' ? 'active' : ''}}"><i class="fa fa-spotify"></i>Психологічна служба</a></li>
                <li><a href="{{route('admin-civil-save')}}" class="{{Route::currentRouteName() == 'admin-civil-save' ? 'active' : ''}}"><i class="fa fa-shield"></i>Цивільний захист</a></li>
                <li><a href="{{route('admin-normy')}}" class="{{Route::currentRouteName() == 'normy' ? 'active' : ''}}"><i class="fa fa-paper-plane"></i>Документи</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-th-list"></i>Осв. процес</a>
            <ul>
                <li><a href="{{route('admin-methodical-work')}}" class="{{Route::currentRouteName() == 'admin-methodical-work' ? 'active' : ''}}"><i class="fa fa-fax"></i>Методична робота</a></li>
                <li><a href="{{route('admin-mo-teachers')}}" class="{{Route::currentRouteName() == 'admin-mo-teachers' ? 'active' : ''}}"><i class="fa fa-tasks"></i>МО вчителів</a></li>
                <li><a href="{{route('admin-educational-activities')}}" class="{{Route::currentRouteName() == 'admin-educational-activities' ? 'active' : ''}}"><i class="fa fa-cc-discover"></i>Виховна робота</a></li>
                <li><a href="{{route('admin-educational-work')}}" class="{{Route::currentRouteName() == 'admin-educational-work' ? 'active' : ''}}"><i class="fa fa-level-up"></i>Навчальна робота</a></li>
                <li><a href="{{route('admin-inclusive-education')}}" class="{{Route::currentRouteName() == 'admin-inclusive-education' ? 'active' : ''}}"><i class="fa fa-lemon-o"></i>Інклюзивне навчання</a></li>
                <li><a href="{{route('admin-professional-training-and-career-guidance')}}" class="{{Route::currentRouteName() == 'admin-professional-training-and-career-guidance' ? 'active' : ''}}"><i class="fa fa-print"></i>Профільне навчання та профорієнтація</a></li>
                <li><a href="{{route('admin-nush')}}" class="{{Route::currentRouteName() == 'admin-nush' ? 'active' : ''}}"><i class="fa fa-building"></i>НУШ</a></li>
                <li><a href="{{route('admin-zno-dpa')}}" class="{{Route::currentRouteName() == 'admin-zno-dpa' ? 'active' : ''}}"><i class="fa fa-code"></i>ДПА і ЗНО</a></li>
            </ul>
        </li>
        <li><a href="{{route('admin-public-information')}}" class="{{Route::currentRouteName() == 'admin-public-information' ? 'active' : ''}}"><i class="fa fa-instagram"></i>Публічна інформація</a></li>
        <li><a href="{{route('admin-news')}}" class="{{Route::currentRouteName() == 'admin-news' ? 'active' : ''}}"><i class="fa fa-newspaper-o"></i>Новини</a></li>
        <li><a href="{{route('admin-for-pupils')}}" class="{{Route::currentRouteName() == 'admin-for-pupils' ? 'active' : ''}}"><i class="fa fa-pencil"></i>Учням</a></li>
        <li><a href="{{route('admin-for-parents')}}" class="{{Route::currentRouteName() == 'admin-for-parents' ? 'active' : ''}}"><i class="fa fa-home"></i>Батькам</a></li>
        <li><a href="{{route('admin-our-pride')}}" class="{{Route::currentRouteName() == 'admin-our-pride' ? 'active' : ''}}"><i class="fa fa-legal"></i>Наша гордість</a></li>
        <li><a href="{{route('admin-archive')}}" class="{{Route::currentRouteName() == 'admin-archive' ? 'active' : ''}}"><i class="fa fa-archive"></i>Архів</a></li>
        <li><a href="{{route('admin-settings')}}" class="{{Route::currentRouteName() == 'admin-settings' ? 'active' : ''}}"><i class="fa fa-cogs"></i>Налаштування</a></li>
    </ul>
</nav>