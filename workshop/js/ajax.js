$(document).ready(function () {

    var add = $('.card__link');
    for(let i = 0; i <add.length; i++) {
        $(add[i]).click(function(e) {
            e.preventDefault();
            let id = $(add[i]).attr('id');
            console.log(id);
            $.ajax({
                type: "POST",
                url : "swaplink.php",
                data : {id: id}
            }).done(function() {
                document.location.href = 'shop.php';
            }).fail(function() {
                alert("error");
            });
        });
    }
});