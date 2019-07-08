<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <!-- <p class="button-custom order-lg-last mb-0"><a href="appointment.html" class="btn btn-secondary py-2 px-3">Make An Appointment</a></p> -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{Route::currentRouteName() == 'main' ? 'active' : ''}}"><a href="/" class="nav-link">Головна</a></li>
                <li class="nav-item  dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" >Управлінська діяльність</a >
                    <ul class="dropdown-menu">
                        <li class="nav-item {{Route::currentRouteName() == 'atestation' ? 'active' : ''}}"><a href="/atestation" {!!   '/' . request()->route()->uri == '/atestation' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} class="nav-link">Атестація</a></li>
                        <li class="nav-item {{Route::currentRouteName() == 'library' ? 'active' : ''}}"><a href="/library" {!! '/' . request()->route()->uri == '/library' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} class="nav-link">Шкілька бібліотека</a></li>
                        <li class="nav-item {{Route::currentRouteName() == 'psychological-service' ? 'active' : ''}}"><a href="/psychological-service" {!! '/' . request()->route()->uri == '/psychological-service' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"'!!} class="nav-link">Психологічна служба</a></li>
                        <li class="nav-item {{Route::currentRouteName() == 'civil-save' ? 'active' : ''}}"><a href="/civil-save" {!! '/' . request()->route()->uri == '/civil-save' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"'!!} class="nav-link">Цивільний захист</a></li>
                        <li class="nav-item {{Route::currentRouteName() == '/normy' ? 'active' : ''}}"><a href="/normy" {!! '/' . request()->route()->uri == '/normy' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"'!!} class="nav-link">Документи</a></li>
                    </ul>
                </li>
                <li class="nav-item  dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" >Освітній процес</a >
                    <ul class="dropdown-menu">
                            <li class="nav-item {{Route::currentRouteName() == 'methodical-work' ? 'active' : ''}}">
                                <a class="nav-link" href="/methodical-work"   {!! '/' . request()->route()->uri == '/methodical-work' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} style="color: #000; font-size: 15px;">Методична робота</a>
                            </li>
                            <li class="nav-item {{Route::currentRouteName() == 'educational-activities' ? 'active' : ''}}">
                                <a class="nav-link" href="/educational-activities"   {!! '/' . request()->route()->uri == '/educational-activities' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} style="color: #000; font-size: 15px;">Виховна робота</a>
                            </li>
                            <li class="nav-item {{Route::currentRouteName() == 'educational-work' ? 'active' : ''}}">
                                <a class="nav-link" href="/educational-work"   {!! '/' . request()->route()->uri == '/educational-work' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} style="color: #000; font-size: 15px;">Навчальна робота</a>
                            </li>
                            <li class="nav-item {{Route::currentRouteName() == 'inclusive-education' ? 'active' : ''}}">
                                <a class="nav-link" href="/inclusive-education"   {!! '/' . request()->route()->uri == '/inclusive-education' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} style="color: #000; font-size: 15px;">Інклюзивне навчнання</a>
                            </li>
                            <li class="nav-item {{Route::currentRouteName() == 'professional-training-and-career-guidance' ? 'active' : ''}}">
                                <a class="nav-link" href="/professional-training-and-career-guidance"   {!! '/' . request()->route()->uri == '/professional-training-and-career-guidance' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} style="color: #000; font-size: 15px;">Профільне навчання та профорієнтація</a>
                            </li>
                            <li class="nav-item {{Route::currentRouteName() == 'nush' ? 'active' : ''}}"><a href="/nush" {!! '/' . request()->route()->uri == '/nush' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} class="nav-link">НУШ</a></li>
                        <li class="nav-item {{Route::currentRouteName() == 'zno-dpa' ? 'active' : ''}}"><a href="/zno-dpa" {!! '/' . request()->route()->uri == '/zno-dpa' ? 'style="color: #218a39; font-size: 15px;"' : 'style="color: #000; font-size: 15px;"' !!} class="nav-link">ДПА і ЗНО</a></li>

                    </ul>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'public-information' ? 'active' : ''}}"><a href="/public-information" class="nav-link">Публічна інформація</a></li>
                <li class="nav-item {{Route::currentRouteName() == 'news' ? 'active' : ''}}"><a href="/news" class="nav-link">Новини</a></li>
                <li class="nav-item {{Route::currentRouteName() == 'for-pupils' ? 'active' : ''}}"><a href="/for-pupils" class="nav-link">Учням</a></li>
                <li class="nav-item {{Route::currentRouteName() == 'for-parents' ? 'active' : ''}}"><a href="/for-parents" class="nav-link">Батькам</a></li>
                <li class="nav-item {{Route::currentRouteName() == 'our-pride' ? 'active' : ''}}"><a href="/our-pride" class="nav-link">Наша гордість</a></li>
                <li class="nav-item {{Route::currentRouteName() == 'archive' ? 'active' : ''}}"><a href="/archive" class="nav-link">Архів</a></li>
            </ul>
        </div>
    </div>
</nav>