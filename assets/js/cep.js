/**
 * Created by bruno on 10/31/15.
 */
$(document).ready( function() {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#cep').blur(function(){
        /* Configura a requisição AJAX */
        $.ajax({
            url : '/usuario/buscaCep', /* URL que será chamada */
            type : 'POST', /* Tipo da requisição */
            data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data){
                if(data.sucesso == 1){
                    $('#nm_endereco').val(data.rua);
                    $('#nm_bairro').val(data.bairro);
                    $('#nm_cidade').val(data.cidade);
                    $('#nm_estado').val(data.estado);

                    $('#nr_endereco').focus();
                }
            }
        });
        return false;
    })
});