<form class="form-horizontal form-box" >
    <h4 class="form-box-header">Підсказки щодо заповнення</h4>
    <div class="form-box-content">
        <div class="form-group">
            <label class="switch switch-success"><input type="checkbox" id="turn"><span></span></label>
        </div>
    </div>
</form>
<div id="push" class="panel-group" style="display: none">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                    Основні можливості редактора
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <p>
                    <img src="{{asset('admin/img/hints/редактор.jpg')}}"><br />
                    1 - Перейти до джерела. Це HTML код повідомлення. Вона виставляється
                    автоматично під час редагування тексту в редакторі. Але також можна редагувати напряму розмітку. Декілька стандартних при йомів:<br />
                    "&lt;p&gt;Текст&lt;/p&gt;" - текст як окремий абзац<br />
                    "&lt;br /&gt;" - перенос на наступну стрічку<br />
                    "&lt;hr /&gt;" - вставити горизонтальну пряму лінію <br />
                    2, 3, 4, 5, 6 - Редагування тексту "виділити","курсив", "підкреслити", "верхній індекс", "нижній індекс" відповідно <br />
                    7 - Очистити всі стилі. Весь текст стане простим абзацом <br />
                    8, 9 - Вставити маркований та злычувальний списки<br />
                    10 - взяти текст в лапки (цитування) <br />
                    11 - Панель управління розміщення тексту<br />
                    12 - Робота з посиланнями (вставити та видалити)<br />
                    13 - Вставити зображення в текст<br />
                    14 - Вставити таблицю<br />
                    15, 16, 17, 18 - Вибрати стиль, шрифт, розмір і т.д. тексту<br />
                    19 - колір тексту<br />
                    20 - фон тексту<br />
                    21 - розгорнути/згорнути редактор на весь екран<br />
                </p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                    Вставка зображень
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
                <p>
                    Основне фото можна вставити за допомогою окремого поля, якщо воно доступне для даного розділу. Наприклад:<br />
                    <img src="{{asset('admin/img/hints/standart_image.jpg')}}" width="80%">
                </p>
                <p class="well">
                    Для того щоб вставити зображення в текст потрібно зробити декілька кроків:
                </p>
                <ol>
                    <li>
                        Скопіювати адресу зображення в інтернеті. Приклад:<br />
                        <img src="{{asset('admin/img/hints/symple_copy.jpg')}}" width="50%">
                    </li>
                    <li>
                        В редакторі вибрати місце де має бути фото і викликати відповідне меню<br />
                        <img src="{{asset('admin/img/hints/значок_зображення.jpg')}}" width="50%">
                    </li>
                    <li>
                        Вставити скопійоване посилання в поле "URL" <br />Встановити параметри за бажання. Встановивши ширину, висота підтягуєься авоматично і наоборот. Це можна змінити, натисканням на "замочок" біля параметрів. Тоді потрібно буде самому встановлювати і ширину і висоту<br />
                        <br />
                        <b>Максимальна ширина зображення - 600! При перевищені виникають проблеми з дизайном! В таких блоках як інклюзивне навчання та педагогічний колектив - 900</b><br />
                        <img src="{{asset('admin/img/hints/parametri.jpg')}}" width="50%"><br />
                        Після цього нажати на "ОК". Щоб його відредагувати, просто натисніть на нього та виберіть теж саме меню зверху!
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                    Вставка зображень із Google Drive
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">
                <p>
                    Для того щоб вставити зображення в текст потрібно зробити дещо більше кроків:
                </p>
                <ol>
                    <li>
                        Скопіювати адресу зображення. Приклад:<br />
                        <img src="{{asset('admin/img/hints/google_copy.jpg')}}" width="50%"><br />
                        Натиснути на "Копыровать ссылку общего доступу" зверху справа<br />
                        <img src="{{asset('admin/img/hints/google_copy_address.jpg')}}" width="50%">
                    </li>
                    <li>
                        В редакторі вибрати місце де має бути фото і викликати відповідне меню<br />
                        <img src="{{asset('admin/img/hints/значок_зображення.jpg')}}" width="50%">
                    </li>
                    <li>
                        Вставити скопійоване посилання в поле "URL" <br />Встановити параметри за бажання. Встановивши ширину, висота підтягуєься авоматично і наоборот. Це можна змінити, натисканням на "замочок" біля параметрів. Тоді потрібно буде самому встановлювати і ширину і висоту<br />
                        <br />
                        <b>Максимальна ширина зображення - 600! При перевищені виникають проблеми з дизайном! В таких блоках як інклюзивне навчання та педагогічний колектив - 900</b><br />
                        <img src="{{asset('admin/img/hints/parametri.jpg')}}" width="50%"><br />
                        Після цього нажати на "ОК" і "Зберегти" внизу стоінки. Після цього зобрження буде доступне.  <br /> Щоб його відредагувати, просто натисніть на нього та виберіть теж саме меню зверху!
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">
                    Вставка посилань
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">

                <ol>
                    <li>
                        Скопіювати потрібну адресу<br />
                    </li>
                    <li>
                        В редакторі вибрати місце де має бути посилання і викликати відповідне меню (Основні можливості редактора -> №12)<br />
                    </li>
                    <li>
                        Написати текст який буде відображатись<br />Вставити скопійоване посилання в поле "URL" <br />
                        <img src="{{asset('admin/img/hints/src.jpg')}}" width="50%"><br />
                        Після цього нажати на "ОК".
                    </li>
                    <li>
                        Щоб посилання відразу відкривалось в новій вкладці браузера, можна вибрати значення "_blank" в пункті "Ціль"
                        <img src="{{asset('admin/img/hints/target.jpg')}}" width="50%"><br />

                    </li>
                </ol>
                <p>
                    Щоб відредагувати - поставити курсор на посилання і натиснути на те ж саме меню, що й при додаванні
                    Вставка посилань на будь-який ресурс із Google Drive не відрізняється нічим. Головне правильне посилання скопіювати :)
                </p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false">
                    Вставка таблиць
                </a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false">
            <div class="panel-body">

                <ol>
                    <li>
                        Скопіювати потрібну адресу<br />
                    </li>
                    <li>
                        В редакторі вибрати місце де має бути таблиця і викликати відповідне меню (Основні можливості редактора -> №14)<br />
                    </li>
                    <li>
                        Визначити кількість стовбців та рядків<br />
                        Встановити ширину за бажанням (максимум - 600) <br />
                        Визначити заголовок та опис за бажанням<br />
                        <img src="{{asset('admin/img/hints/table.jpg')}}" width="30%"><br />
                        Після цього нажати на "ОК".
                    </li>
                </ol>
                <p>
                    Щоб відредагувати - натиснути на таблицю правою клавішою миші і вибрати відповіднй пункт.
                    Вставка посилань на будь-який ресурс із Google Drive не відрізняється нічим. Головне правильне посилання скопіювати :)
                </p>
            </div>
        </div>
    </div>
</div>