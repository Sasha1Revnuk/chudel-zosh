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
                    Вставка посилання на ресурс
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <p>
                    <ol>
                        <li>Написати ім'я ресурсу яке буде відображатись на сайті</li>
                        <li>Вставити посилання, що веде до потрібного ресурсу</li>
                    </ol>
                </p>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                    Копіювання посилання на ресурс Google Drive
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <p>
                <ol>
                    <li>Натиснути на потрібний ресурс (папка, документ, фото і т.д..)</li>
                    <li>
                        Натиснути на "Открыть доступ к...". Приклад:<br />
                        <img src="{{asset('admin/img/hints/open.jpg')}}" ><br />
                    </li>
                    <li>
                        <h6>Відкрити доступ тільки для вказаних осіб</h6>
                        <ul>
                            <li>
                                <img src="{{asset('admin/img/hints/persons.jpg')}}" width="50%"><br />
                                1. Вибрати можливість тільки перегляду<br />
                                2. Вписати google-пошту (@gmail.com) людей, яким є доступ до файлу<br />
                                3. Натиснути кнопку "Отправить"<br />
                            </li>
                            <li>
                                Натиснути на "копировать ссылку общего доступа"<br />
                                <img src="{{asset('admin/img/hints/copy_personal.jpg')}}" width="50%"><br />
                            </li>
                            <li>
                                <img src="{{asset('admin/img/hints/turn.jpg')}}" width="50%"><br />
                                1. Вимкнути загальний доступ<br />
                                2. Натиснути "Копировать ссылку"<br />
                                3. Натиснути "Готово"<br />
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h6>Відкрити доступ для всіх за посиланням</h6>
                        <ul>
                            <li>
                                Натиснути на "копировать ссылку общего доступа"<br />
                                <img src="{{asset('admin/img/hints/turn.jpg')}}" width="50%"><br />
                            </li>
                            <li>
                                1. Натиснути "Копировать ссылку"<br />
                                2. Натиснути "Готово"<br />
                            </li>
                        </ul>
                    </li>
                </ol>
                </p>
            </div>
        </div>
    </div>
</div>