<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'mysql', 'mysql');
    $select_db = mysqli_select_db($conn, 'workshop');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Плотницкая мастерская</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- ИКОНКА НА ВКЛАДКЕ СТРАНИЦЫ -->
    <link rel="shortcut icon" href="img/logo.jpg" type="image/jpeg">
    <!-- ПОДКЛЮЧЕНИЕ ФАЙЛА СО СТИЛЯМИ -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- СТРЕЛКА ДЛЯ ПРОКРУТКИ СТРАНИЦЫ ВВЕРХ -->
    <div id="toTop">
        <div class="arrow">
          <span class="arrow__left"></span>
          <span class="arrow__right"></span>
       </div>
    </div>
    <!-- ШАПКА САЙТА -->
    <header>
        <!-- БЛОК НАВИГАЦИИ -->
        <section class = "navigation">
            <nav>
                <input type="checkbox" id="checkbox-menu" />
                <label for="checkbox-menu">
                <ul class="menu touch">
                    <li><a href="#">О компании</a></li>
                    <li><a href="#">Оплата</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">Возврат и гарантия</a></li>
                    <li><a href="#contacts" id = "Down">Контакты</a></li>
                </ul>
                <span class="toggle">☰</span>
                </label>
            </nav>
        </section>
         <!-- БЛОК ШАПКИ -->
         <section class = "head">
             <div class="wrapper">
                <a href=""><img src="img/logo.jpg" alt="logo" class="head__logo"></a>
                <p class="head__text">Телефон: <br> 8(888)-888-88-88</p>
                <p class="head__text">Режим работы: <br> 9:00 - 21:00</p>
                <div class="head__button">
                    <form action="">
                        <input type="text" placeholder="Поиск по категориям" />
                        <input type="submit" value="Search" />
                    </form>
                </div>
             </div>
        </section>
    </header>
    <!-- БЛОК КАТАЛОГА -->
    <main>
        <section class="category">
            <div class="wrapper">
                <div class="category__listblock">
                    <div class="category__list">
                        <h2 class="category__title">Категории</h2>
                        <ul class="category__sublist">
                            <?php
                                $query = "SELECT categoryName, categoryId FROM categories ";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                if($result) {
                                    $rows = mysqli_num_rows($result); // количество полученных строк
                                    for ($i = 0 ; $i < $rows ; ++$i) {
                                    $row = mysqli_fetch_row($result);
                            ?>
                                    <li class="category__text"><a href="<?php echo $row[1] ?>"><?php echo $row[0] ?></a></li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="category__catalog">
                    <div class="category__cards">
                        <?php
                            $query1 = "SELECT categoryName, link, categoryId FROM categories ";
                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                            if($result1) {
                                $rows = mysqli_num_rows($result1); // количество полученных строк
                                for ($i = 0 ; $i < $rows ; ++$i) {
                                $row = mysqli_fetch_row($result1);
                        ?>
                                    <a href="#up" id="<?php echo $row[2] ?>"><div class="category__card">
                                        <img class="category__card__img" src="<?php echo $row[1] ?>" alt="">
                                        <div class="category__card__container">
                                            <p class="name"><?php echo $row[0] ?></p>
                                        </div>
                                    </div></a>
                        <?php
                                }
                            }
                        ?>
                        <a href="#up" id="categ__add"><div class="category__card">
                            <img class="category__card__img" src="/img/plus.png" alt="">
                            <div class="category__card__container">
                                <p class="name">Добавить категорию</p>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- БЛОК ПОДВАЛА -->
    <footer class="footer" id = "contacts">
        <div class="wrapper">
            <div class="footer__inner">
                <div class="footer__item">
                    <i class="fas fa-phone-square"></i>
                    <div class="footer__text">8(888)-888-88-88</div>
                </div>
                <div class="footer__item">
                    <i class="far fa-clock"></i>
                    <div class="footer__text">9:00 - 21:00</div>
                </div>
                <div class="footer__item">
                    <a href="https://www.instagram.com/karkculator.ru/" target="_blank" class="footer__link"><i class="fab fa-instagram"></i></a>
                    <a href="https://vk.com/karkculator" target="_blank" class="footer__link"><i class="fab fa-vk"></i></a>
                    <a href="https://www.youtube.com/channel/UCpQ0Y6FwE9djNsEI2lmWzzw" target="_blank" class="footer__link"><i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/79231902050" target="_blank" class="footer__link"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:1@karkculator.ru" target="_blank" class="footer__link"><i class="far fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Скрытый блок с подробной информацией о категории -->
    <div class="product" id = "prodAnchor">
        <div class="product__inner">
            <div class="product__text">
                <div class="product__title">Цены на послегарантийный ремонт фотоаппаратов</div>
            </div>
            <div class="product__price">
                <table>
                    <tr><td class="product__info">Название</td><td class="product__cost__logo">Стоимость</td></tr>
                    <tr><td class="product__info info1">Чистка видоискателя</td><td class="product__cost cost1">от 500 рублей</td></tr>
                    <tr><td class="product__info info2">Чистка матрицы</td><td class="product__cost cost2">от 1200 рублей</td></tr>
                    <tr><td class="product__info info3">Настройка (юстировка) автофокуса</td><td class="product__cost cost3">от 2200 рублей</td></tr>
                    <tr><td class="product__info info4">Ремонт "битых" пикелей</td><td class="product__cost cost4">от 2200 рублей</td></tr>
                    <tr><td class="product__info info5">Ремонт слота карты памяти</td><td class="product__cost cost5">от 500 рублей</td></tr>
                    <tr><td class="product__info info6">Ремонт и замена затвора</td><td class="product__cost cost6">от 600 рублей</td></tr>
                    <tr><td class="product__info info7">PRO-диагностика, экспертная оценка</td><td class="product__cost cost7">от 1700 рублей</td></tr>
                    <tr><td class="product__info info8">Предварительная диагностика</td><td class="product__cost cost8">бесплатно</td></tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Скрытый блок с добавлением новой категории -->
    <div class="product" id = "prodAnchor">
        <form action="addpic.php" method="post" enctype="multipart/form-data">
            <input type="file" name="picture">
            <input type="submit" value="Загрузить">
        </form>
    </div>
    <!--    Фон для невидимых блоков -->
    <div class="popup__bg"></div>
    <!-- ПОДКЛЮЧЕНИЕ СКРИПТОВ -->
    <!-- ИКОНКИ -->
    <script src="https://kit.fontawesome.com/dd4a236084.js" crossorigin="anonymous"></script>
    <!-- ПОДКЛЮЧЕНИЕ JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script  src="https://code.jquery.com/jquery-migrate-3.3.0.min.js"></script>
    <!-- СКРИПТ -->
    <script src="js/script.js"></script>
</body>
</html>