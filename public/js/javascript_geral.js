$(document).ready(function(){
    $('input[name=cep]').change(function(){
        $("#ajax").load("http://localhost/CadastrarAluno/listar");
    });
});