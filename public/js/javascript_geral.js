function carregaCep(){       
   var cep = $("input[name='endereco[cepbr_endereco_cep][cep]']").val();
   $.ajax({
        url: "/CepbrEndereco/getCep",
        dataType: "json",
        data: {cep:cep},
        success: function(data){
            $("input[name='endereco[rua]']").val(data[0].endereco);
        },
        error: function(){
            alert("werro");
        }
    })   
}

$(document).ready(function(){
     $('#telaAjax').each(function(){
        var $link = $(this);
        var $dialog = $('<div></div>')
            .load($link.attr('href'))
        
        $link.click(function() {            
            $dialog.dialog({
                    width:'auto',height:'auto',modal:true,
                    close: function(){
                        $(this).dialog().remove()
                    }
             });           
        });
    });
});