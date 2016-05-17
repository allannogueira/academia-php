var idCidade=0;
function carregaCep(){       
   var cep = $("input[name='idEndereco[cepbrEnderecoCep][cep]']").val();
   $.ajax({
        url: "/cepbrEndereco/getCep",
        dataType: "json",
        data: {cep:cep},
        success: function(data){
            console.log(data[0]);
            $("input[name='idEndereco[rua]']").val(data[0].endereco + ", bairro: " + data[0].idBairro.bairro);
            $("select[name='idEndereco[cepbrEnderecoCep][idCidade][uf][uf]']").val(data[0].idCidade.uf.uf);
            idCidade = data[0].idCidade.idCidade;
            carregaCidade();
        },
        error: function(){
            alert("werro");
        }
    })   
}

function carregaCidade(){
   var uf = $("select[name='idEndereco[cepbrEnderecoCep][idCidade][uf][uf]']").val();
   var options="";
   $.ajax({
        url: "/cepbrEndereco/getCidades",
        dataType: "json",
        data: {uf:uf},
        success: function(data){
            for(var i=0;i<data.length;i++){
                options += "<option value='"+data[i].idCidade+"'>"+data[i].cidade+"</option>";
            }
            $("select[name='idEndereco[cepbrEnderecoCep][idCidade][idCidade]']").html(options);
            $("select[name='idEndereco[cepbrEnderecoCep][idCidade][idCidade]']").val(idCidade);
        },
        error: function(){
            alert("werro");
        }
    })   
}

$(document).ready(function(){
    $(".foto-perfil").removeClass("form-control");
    $(".form-inline").removeClass("form-horizontal");
    $(".table").dataTable({
        paging: false,
         language: {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    
            }
    });
    $(".dataTables_filter input").attr("placeholder","Pesquisar");
    
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
