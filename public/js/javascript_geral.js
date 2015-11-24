function carregaCep(){       
   var cep = $("input[name='endereco[cepbr_endereco_cep]']").val();
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

function add_field(name,index) {
    var currentCount = $('#'+name+'  input').length ;
    var template = $('#'+name+'  > span').data('template');
    var re = new RegExp("__"+index+"__","g");
    template = $($(template.replace(re, currentCount)));
    c = template.find('div.col-sm-5');
    d = template.find('div.input-group');
	var b = $(' <span class="input-group-btn"><button class="btn btn-default" >remove</button></span>');
	b.click(function (){$(this).parent().parent().parent().remove();});
    b.appendTo(d);
    d.appendTo(c);
    c.appendTo(template);
    $('#'+name+' ').append(template);
    return false;
}