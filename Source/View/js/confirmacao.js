$( document ).ready(function() {
  renderizarConfirmacao();
});

function finalizarCompra(){
    var idCliente = 1;
    var nCartao = document.getElementById('numero_cartao').value;
    
    //Inserindo compra
    //AO INSERIR UM OBJETO, RETORNAR O ID DELE
    //$.ajax({url: "http://localhost/GIT/Airlifes/Source/Slim/api.php/inserirCompra/"+nCartao+"/"+idCliente});
    
    window.location.href='recomendacao.html';
}

function renderizarConfirmacao(){
    
    var idVooSelecionado = localStorage.idVooSelecionado;
    
    var link = "http://viniciuszorzanelli.com/Source/Slim/api.php/getVooById/"+idVooSelecionado;
    
    $.ajax({
        url: link,
        dataType: 'json',
        async: false,
        success: function(data) {
            
            $("#detalhes").append(
                "<div class='row'>"+
                    "<div class='col s12 m12'>"+
                        "<div class='card light-blue lighten-3'>"+
                            "<div class='card-content black-text' style='padding-bottom: 0px;'>"+
                                "<div class='row'>"+
                                    "<form class='col s12'>"+
                                    "<span class='card-title' style='font-size: 30px;'>DETALHES</span>"+    
                                        "<div class='row'>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+data[0].cidade_partida+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Origem</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+data[0].cidade_destino+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Destino</label>"+
                                            "</div>"+
                                        "</div>"+
                                        "<div class='row'>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+data[0].partida+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Data Ida</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+data[0].chegada+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Data Volta</label>"+
                                            "</div>"+
                                        "</div>"+
                                        "<div class='row'>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+data[0].preco+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Preço</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+localStorage.quantidade+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Quantidade</label>"+
                                            "</div>"+
                                        "</div>"+
                                    "</form>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"
            );
        }
      });
      
      
      for(var i = 0; i < localStorage.quantidade; i++){
          
          $("#passageiros").append(
      
            "<div class='row'>"+
                "<div class='col s12 m12'>"+
                    "<div class='card teal lighten-4'>"+
                        "<div class='card-content black-text' style='padding-bottom: 5px;'>"+                        
                            "<div class='row'>"+                        
                                "<form class='col s12'>"+
                                    "<span class='card-title'>PASSAGEIRO "+(i+1)+"</span>"+ 
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='first_name' type='text' class='validate'>"+
                                        "<label for='first_name'>Nome</label>"+
                                    "</div>"+
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='first_name' type='text' class='validate'>"+
                                        "<label for='first_name'>Sobrenome</label>"+
                                    "</div>"+                            
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='first_name' type='text' class='validate'>"+
                                        "<label for='first_name'>CPF</label>"+
                                    "</div>"+
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='first_name' type='text' class='datepicker'>"+
                                        "<label for='first_name'>Data nascimento</label>"+
                                    "</div>"+                         
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
            "</div>"
        );
          
      }
      
      
    
    
}