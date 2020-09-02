jQuery(function ($) {
    const valores = [$("#valor"), $("#agua"), $("#luz")]
    const valOptions = { prefix: "R$:", decimal: ",", thousands: "." }
    $("#cpf").mask("999.999.999-99")
    if(document.getElementById('valor')) {
        for(val of valores) val.maskMoney(valOptions)
    }
});
$(document).ready(function () {

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $("#fone").mask(SPMaskBehavior, spOptions);

});