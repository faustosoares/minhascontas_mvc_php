$(document).ready(function() {
    ativarItem();
   // manterMenuLateral();
});

function ativarItem(){

    var largura = screen.width;
    var altura = screen.height;
    
    console.log(largura);
    
    var menu = "#" + $("#menu").val();
    if (largura > 414 && altura > 736 ) {
        $(menu).addClass("show");
    } else {
        $(menu).removeClass("show");
    }

    var item = "#" + $("#item").val();
    $(item).addClass("active");

    var body = $("body");
    var situacao = $("#situacaoMenu");

    if (body.is(".sidebar-toggled")) {
        //alert("Possui a classe");
        situacao.val("aberto");
    } else {
        situacao.val("fechado");
    }

    //manterMenuLateral();

}

function manterMenuLateral(){
    var body = $("body");
    var situacao = $("#situacaoMenu");
    var menuLateral = $("#accordionSidebar");

    console.log(situacao);

    if (situacao.val() == 'fechado') {
        body.addClass("sidebar-toggled");
        menuLateral.addClass("toggled");
    }

}