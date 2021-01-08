<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'mysql', 'mysql');
    $select_db = mysqli_select_db($conn, 'workshop');
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }
        else {
            $query = "SELECT Email FROM registration WHERE UserName = '$username' and Password = '$password' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            //$count = mysqli_num_rows($result);
            $row = mysqli_fetch_row($result);
            $_SESSION['email'] = $row[0];
            $email = $_SESSION['email'];
            }
    }
    else {
        $username = "нет";
        $password = "нет";
        $email = "нет";
    }

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
                    <?php
                    if (isset($_SESSION['username'])) {
                        ?>
                        <li><a href="account.php"><i class="fas fa-user-alt"></i></a></li>
                    <?php
                    }
                    else {
                        ?>
                        <li><a href="#"><i class="fas fa-user-alt" id = "account"></i></a></li>
                        <?php
                    }
                    ?>
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
        <section class = "account wrapper">
            <div class="account__title">
                <h2 id = "persinfo">Personal Information</h2>
            </div>
            <?php
              if(isset($_SESSION['username'])) { 
            ?>
            <div class="account__info">
                <div class="personalInfo">
                    <p class = "personalInfo__info">E-mail</p>
                    <p class = "personalInfo__subinfo"><?php echo $email ?></p>
                </div>
                <div class="personalInfo">
                    <p class = "personalInfo__info">Username</p>
                    <p class = "personalInfo__subinfo"><?php echo $username ?></p>
                </div>
                <div class="personalInfo">
                    <p class = "personalInfo__info">Password</p>
                    <p class = "personalInfo__subinfo">****</p>
                </div>
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <?php } ?> 
        </section>
        <!-- Блок Корзина-->
        <section class = "wrapper basket">
          <div class="basket__title">
            <h2 id = "basket">My basket</h2>
            <?php
              if(isset($_SESSION['username'])) { 
            ?>
            <div class="basket__block">
            <?php
              $query2 = "SELECT productname, description, price, unicid FROM basket WHERE username = '$username' ";
              $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
              if($result2) {
                $rows2 = mysqli_num_rows($result2); // количество полученных строк
                
                  echo "<table><tr><td>Product name</td><td>Description</td><td>Price</td><td>Delete</td></tr>";
                  for ($i = 0 ; $i < $rows2 ; ++$i) {
                      $row2 = mysqli_fetch_row($result2);
                      echo "<tr>";
                      for ($j = 0 ; $j < 3 ; ++$j) {
                        if ($j == 2) {
                          echo "<td class = 'price'>$row2[$j]</td>";
                       } else {
                          echo "<td>$row2[$j]</td>";
                        }    
                      }
                      $a = $i+1;
                      echo "<td><a href='#del' id = '$row2[3]' class = 'delete'>Удалить $a товар</a></td></tr>";
                  }
                  echo "</table>";
                  ?>
                  <br>Итого: <input type="text" id = "sum" value = "" readonly>
                  <button class = "clear" id = "clrbtn">Clear Basket</button>    
                 <?php } ?>
            </div>
            <?php } ?> 
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