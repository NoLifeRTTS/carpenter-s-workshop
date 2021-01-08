// Функция для плавного перемещения на блок Контакты
$("#Down").click(function(event){
    event.preventDefault();
     let id = $(this).attr("href");
     let top = $(id).offset().top;
     $("*").animate({scrollTop:top},1000);
 });

 // Для стрелочки вверх
 $(window).scroll(function() {
    ($(this).scrollTop() != 0) ? $('#toTop').fadeIn() : $('#toTop').fadeOut(); 
});

$('#toTop').click(function() {
    $('*').animate({scrollTop:0},1000);
});

// Для отображения блока, который выбрали, а также для его скрытия
$("#categ-1").click(function(){
    $(".product").addClass("popup__active");
    $(".popup__bg").fadeIn();
    $(".product__title").html("Цена на послегарантийный ремонт фотоаппаратов");
    $(".info1").html("Чистка видоискателя");
    $(".info2").html("Чистка матрицы");
    $(".info3").html("Настройка (юстировка) автофокуса");
    $(".info4").html("Ремонт 'битых' пикелей");
    $(".info5").html("Ремонт слота карты памяти");
    $(".info6").html("Ремонт и замена затвора");
    $(".info7").html("PRO-диагностика, экспертная оценка");
    $(".info8").html("Предварительная диагностика");
    $(".cost1").html("от 500 рублей");
    $(".cost2").html("от 1200 рублей");
    $(".cost3").html("от 2200 рублей");
    $(".cost4").html("от 2200 рублей");
    $(".cost5").html("от 500 рублей");
    $(".cost6").html("от 600 рублей");
    $(".cost7").html("от 1700 рублей");
    $(".cost8").html("бесплатно");
        $(".popup__bg").click(function(){
           $(".product").removeClass("popup__active");
            $(".popup__bg").fadeOut();
        });
});

$("#categ-2").click(function(){
    $(".product").addClass("popup__active");
    $(".popup__bg").fadeIn();
    $(".product__title").html("Цена на послегарантийный ремонт фотоаппаратов");
    $(".info1").html("Чистка видоискателя");
    $(".info2").html("Чистка матрицы");
    $(".info3").html("Настройка (юстировка) автофокуса");
    $(".info4").html("Ремонт 'битых' пикелей");
    $(".info5").html("Ремонт слота карты памяти");
    $(".info6").html("Ремонт и замена затвора");
    $(".info7").html("PRO-диагностика, экспертная оценка");
    $(".info8").html("Предварительная диагностика");
    $(".cost1").html("от 500 рублей");
    $(".cost2").html("от 1200 рублей");
    $(".cost3").html("от 2200 рублей");
    $(".cost4").html("от 2200 рублей");
    $(".cost5").html("от 500 рублей");
    $(".cost6").html("от 600 рублей");
    $(".cost7").html("от 1700 рублей");
    $(".cost8").html("бесплатно");
        $(".popup__bg").click(function(){
           $(".product").removeClass("popup__active");
            $(".popup__bg").fadeOut();
        });
});

$("#categ__add").click(function(){
    $(".categ").addClass("popup__active");
    $(".popup__bg").fadeIn();
        $(".popup__bg").click(function(){
           $(".categ").removeClass("popup__active");
            $(".popup__bg").fadeOut();
        });
});

// Для отображения блока регистрации, который выбрали, а также для его скрытия
$("#account").click(function(){
    $(".register").addClass("popup__active");
    $(".popup__bg").fadeIn();
    $(".popup__bg").click(function(){
        $(".register").removeClass("popup__active");
        $(".popup__bg").fadeOut();
    });
});
$("#reg").click(function(){
    $(".author").removeClass("popup__active");
    $(".register").addClass("popup__active");
    $(".popup__bg").fadeIn();
    $(".popup__bg").click(function(){
        $(".register").removeClass("popup__active");
        $(".popup__bg").fadeOut();
    });
});
// Для отображения блока авторизации, который выбрали, а также для его скрытия
$("#log").click(function(){
    $(".register").removeClass("popup__active");
    $(".author").addClass("popup__active");
    $(".popup__bg").fadeIn();
    $(".popup__bg").click(function(){
        $(".author").removeClass("popup__active");
        $(".popup__bg").fadeOut();
    });
});