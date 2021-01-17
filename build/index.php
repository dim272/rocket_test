<?php

  $db_ip = '127.0.0.1';
  $db_user = 'username';
  $db_pass = 'password';
  $db_name = 'news';

  $db_connect = myscqli_connect($db_ip, $db_user, $db_pass, $db_name);
  $all_news = myscqli_query($db_connect, "SELECT * FROM `news`");

?>

<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Rocket Buisness</title>

</head>

  <body>

    <!-- Шапка -->
    <header class="header container-fluid">

      <!-- Шапку писал сам из-за мобильного меню -->
      <!-- Меню без jQuery, как договаривались -->
      <!-- Дальше использовал бутстрап -->

      <section class="header__box container-sm">

        <!-- лого -->
        <div class="header__logo">
          <a class="logo" href="#">
            <img src="./img/logo.png" alt="RedEdge logo">
          </a>
        </div>

        <!-- гамбургер -->
        <input type="checkbox" id="hmt" class="hidden-menu-ticker">
        <label class="btn-menu" for="hmt">
          <span class="first"></span>
          <span class="second"></span>
          <span class="third"></span>  </label>

        <!-- меню -->
        <nav class="header__menu">
          <ul class="menu">
            <li class="menu__item"><a href="#" class="menu__link">Услуги</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Портфолио</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Отзывы</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Вакансии</a></li>
            <li class="menu__item"><a href="#" class="menu__link">Контакты</a></li>
          </ul>
          <div class="menu__contacts menu__contacts--hidden">
            <p>Ростов-на-Дону,<br>Ленина, 21</p>
            <p style="font-weight: bold;">8(863)243-15-10</p>
          </>
        </nav>

        <!-- контакты -->
        <div class="header__contacts">
          <a href="" class="header__text header__text--bold">8(863)243-15-10</a>
          <p class="header__text">Ростов-на-Дону</p>
        </div>

      </section>

    </header>

    <!-- Верхний блок -->
    <section class="container-fluid p-0 position-relative d-flex justify-content-start align-items-center " style="height: 507px;">
      <img src="./img/bg_image.png" class="img-fluid bg_image h-100" alt="Рекламно-информационное агентство">

      <div class="container-sm d-flex flex-column align-items-start">

        <h1 class="text-light w-50">Рекламно-информационное агентство</h2>

          <p class="text-start text-light w-50 mt-3">
            Будем рады, если Вы обратитесь в наше Агентство. Мы готовы предложить Вам передовые решения для продвижения Вашего бизнеса.
          </p>

          <form class="tel-form container-md d-flex justify-content-start p-0 mt-3">

            <div class=" me-3">
              <label class="visually-hidden" for="specificSizeInputName">Phone Number</label>
              <input type="text" class="form-control tel-form__input rounded-0" id="specificSizeInputName" placeholder="Номер телефона">
            </div>

            <button type="submit" class="btn btn-danger rounded-0 tel-form___btn">Обратный звонок</button>

          </form>
      </div>

    </section>

    <!-- Новости -->
    <section class="min-vh-75 container-fluid d-flex justify-content-center align-items-center news">

      <div class="container flex-row justify-content-center align-items-center">
        <h2 class="text-center mt-5">Новости</h2>
        <!-- Карусель -->
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel" class="mb-10 mt-10">

          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active carousel__indicator carousel__indicator--active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="carousel__indicator"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="carousel__indicator"></li>
          </ol>

          <div class="carousel-inner d-flex align-items-center">

            <div class="carousel-item active">
              <div class="container d-flex mb-10 mt-10">
                <div class="container d-flex">

                  <?php
                    // не больше трёх новостей в одном слайде
                    $news_count = 1

                    while ($one_news = myscqli_fetch_assoc($all_news) && $news_count >= 3 )
                    {
                    ?>

                      <div class="card-body">
                        <p class="card-text"> <small class="text-muted"><?php echo $one_news['date'];?> </small></p>
                        <h5 class="card-title flex-grow-1"> <?php echo $one_news['title'];?> </h5>
                        <a href="<?php echo $one_news[link];?>" class="btn btn-danger card_btn">Подробнее</a>
                      </div>

                  <?php
                  }
                  $news_count ++;
                  ?>

                </div>
              </div>
            </div>
            <div class="carousel-item">

              <div class="container d-flex mb-10 mt-10">
                <div class="container d-flex">

                  <?php
                    // не больше трёх новостей в одном слайде
                    $news_count = 1

                    while ($one_news = myscqli_fetch_assoc($all_news) && $news_count >= 3 )
                    {
                    ?>

                      <div class="card-body">
                        <p class="card-text"> <small class="text-muted"><?php echo $one_news['date'];?> </small></p>
                        <h5 class="card-title flex-grow-1"> <?php echo $one_news['title'];?> </h5>
                        <a href="<?php echo $one_news[link];?>" class="btn btn-danger card_btn">Подробнее</a>
                      </div>

                  <?php
                  }
                  $news_count ++;
                  ?>

                </div>
              </div>

            </div>
            <div class="carousel-item">

              <div class="container d-flex mb-10 mt-10">
                <div class="container d-flex">

                  <?php
                    // не больше трёх новостей в одном слайде
                    $news_count = 1

                    while ($one_news = myscqli_fetch_assoc($all_news) && $news_count >= 3 )
                    {
                    ?>

                      <div class="card-body">
                        <p class="card-text"> <small class="text-muted"><?php echo $one_news['date'];?> </small></p>
                        <h5 class="card-title flex-grow-1"> <?php echo $one_news['title'];?> </h5>
                        <a href="<?php echo $one_news[link];?>" class="btn btn-danger card_btn">Подробнее</a>
                      </div>

                  <?php
                  }
                  $news_count ++;
                  ?>

                </div>
              </div>

            </div>

          </div>

        </div>
      </div>

    </section>

    <!-- Подвал -->
    <footer class="container-fluid d-flex justify-content-center align-items-center footer">
      <nav class="w-75 navbar navbar-dark">
        <div class="container-md d-flex justify-content-around align-items-center footer__box">

          <a class="navbar-brand footer__logo" href="#">
            <img src="./img/logo.png" alt="RedEdge logo">
          </a>

          <ul class="d-flex justify-content-center footer__nav">
            <li class="nav-item me-2">
              <a class="nav-link text-light active p-0" aria-current="page" href="#">Услуги</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link text-light p-0" href="#">Портфолио</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link text-light p-0" href="#">Отзывы</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link text-light p-0" href="#">Вакансии</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link text-light p-0" href="#">Контакты</a>
            </li>
          </ul>

      </nav>
    </footer>

    <!-- Бутстрап -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>

</html>
