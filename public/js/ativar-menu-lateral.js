$(document).ready(function() {
    ativarItem();
});

function ativarItem(){
    var menu = "#" + $("#menu").val();
    $(menu).addClass("show");

    var item = "#" + $("#item").val();
    $(item).addClass("active");
}