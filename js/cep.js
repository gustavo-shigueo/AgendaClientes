jQuery(function ($) {
    $("#cep").mask("99999-999");
});
$("#cep").focusout(function () {
    $.ajax({
        url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
        dataType: 'json',
        success: function (resposta) {
            $("#rua").val(resposta.logradouro);
            $("#complemento").val(resposta.complemento);
            $("#bairro").val(resposta.bairro);
            $("#num").focus();
        }
    });
});