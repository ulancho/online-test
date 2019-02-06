<main>
    <section class="map">
        <h2>КАК С НАМИ СВЯЗАТЬСЯ?:</h2>
        <div id="map"></div>
    </section>
</main>
<footer>
    <div class="wrapper">
        <div class="footerList flex clearfix">
            <div class="footerListItem">
                <h3>выбор профессии:</h3>
                <ul class="footerListItemProf">
                    <li><a href="#">Компьютерная грамотность</a></li>
                    <li><a href="#">1C Бухгалтерия</a></li>
                    <li><a href="#">Системный администратор</a></li>
                    <li><a href="#">HTML верстальщик</a></li>
                    <li><a href="#">PHP Junior разработчик</a></li>
                    <li><a href="#">Комплексное изучение JavaScript</a></li>
                    <li><a href="#">Framework ReactJS</a></li>
                    <li><a href="#">Python разработчик</a></li>
                    <li><a href="#">Ruby on Rails</a></li>
                    <li><a href="#">Android Разработчик</a></li>
                    <li><a href="#">QA Engineer</a></li>
                    <li><a href="#">Веб дизайнер</a></li>
                    <li><a href="#">Графический дизайнер</a></li>
                    <li><a href="#">Дизайн интерьер</a></li>
                    <li><a href="#">3D Аниматор</a></li>
                    <li><a href="#">Видео монтажер</a></li>
                    <li><a href="#">Видео оператор</a></li>
                    <li><a href="#">SMM менеджер</a></li>
                    <li><a href="#">SEO оптимизатор</a></li>
                </ul>
            </div>
            <div class="footerListItem">
                <h3>Студентам:</h3>
                <ul class="footerListItemStudents">
                    <li><a href="#">Расписание</a></li>
                    <li><a href="#">Журнал оценок</a></li>
                    <li><a href="#">Проекты студентов</a></li>
                    <li><a href="#">Отзывы наших выпускников</a></li>
                    <li><a href="#">Помощь при выборе специальности</a></li>
                    <li><a href="#">Тестовое подключение для вебинара</a></li>
                    <li><a href="#">События IT-Club</a></li>
                    <li><a href="#">Блог</a></li>
                    <li><a href="#">Анкетирование</a></li>
                </ul>
                <h3>Контакты</h3>
                <ul class="footerListItemContacts">
                    <li class="footerListItemContactsAdress">г.Бишкек, пр.Манаса 22, перес. ул.Московская</li>
                    <li class="footerListItemContactsPhone">Тел.: +996 (556) 97 97 33</li>
                    <li class="footerListItemContactsEmail">Е-мэйл: info@it-club.kg</li>
                    <li class="footerListItemContactsLic">Лицензия ОсОО «Ай-Ти клаб» КР © 2018, 720012, № 088 и 088/1</li>
                </ul>
            </div>
            <div class="footerListItem">
                <h3>Про IT-CLUB:</h3>
                <ul class="footerListItemItClub">
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Преимущества обучения</a></li>
                    <li><a href="#">Партнеры</a></li>
                    <li><a href="#">Преподавательский состав</a></li>
                    <li><a href="#">Вакансии</a></li>
                    <li><a href="#">Часто задаваемые вопросы</a></li>
                    <li><a href="#">Обратная связь</a></li>
                </ul>
                <h3>вРЕМЯ РАБОТЫ:</h3>
                <ul class="footerListItemWorkingHours">
                    <li>Наш сайт и почта работают 24/7, ответим при первой возможности.</li>
                    <li>Понедельник-Пятница: 9:00 - 19:00 Суббота: 10:00 - 17:00</li>
                    <li>Воскресенье: Выходной</li>
                    <li class="footerListItemWorkingHoursSocLink clearfix">
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="mob-links-overlay">
    <div class="table">
        <div class="middle">
            <div class="logoMob">
                <img src="<?=base_url()?>public/images/main/logo.png" alt="ITClub">
            </div>
            <ul class="menuMob">
                <li><a href="">О нас</a></li>
                <li><a href="">Курсы</a></li>
                <li><a href="">регистрация</a></li>
                <li><a href="">Войти</a></li>
                <li class="mobContacts">
                    <span>+996 312 57 19 57</span>
                    <span>+996 556 97 97 33</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="mob-close">
        <span></span>
        <span></span>
    </div>
</div>
<div class="mob-menu">
    <a href="#" class="menu-toggle-icon">
        <span></span>
        <span></span>
        <span></span>
    </a>
</div>
<div class="callback">
    <div id="somedialog" class="dialog">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
            <button class="action" data-dialog-close=""></button>
            <form action="#" name="contact-form" id="form" method="POST">
                <div class="forms">
                    <input type="text" id="name" placeholder="Имя (Обязательное поле)" required class="inputbox"/>
                </div>
                <div class="forms">
                    <input type="tel" id="phone" placeholder="Телефон (Обязательное поле)" required  class="inputbox"/>
                </div>
                <div class="forms">
                    <input type="email" id="email" placeholder="Введите ваш email" class="inputbox"/>
                </div>
                <div class="b-submit ">
                    <button type="submit" class="submitbtn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.bxslider.js"></script>
<script src="<?=base_url()?>public/js/test.js" defer></script>
<script src="<?=base_url()?>public/js/slick/slick.js"></script>
<script src="<?=base_url()?>public/js/common.js"></script>
<script src="<?=base_url()?>public/js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="<?=base_url()?>public/js/pie-chart.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/js/map.js"></script>
<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmOPD3DvI4xloaqfg0DOgY9ONlgisziT4&callback=initMap"></script>
</body>
</html>