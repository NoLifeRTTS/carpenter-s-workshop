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
                    <li><a href="#">Контакты</a></li>
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
    <main>
        <section class="category">
            <div class="wrapper">

            </div>
        </section>
    </main>
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
    <script src="https://kit.fontawesome.com/dd4a236084.js" crossorigin="anonymous"></script>
</body>
</html>