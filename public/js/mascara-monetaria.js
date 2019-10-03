// $('#valor').mask('#.##0,00', {reverse: true});

$(function() {
    $('#valor').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
})

