$( document ).ready(function() {
        
   if(localStorage.clienteId == 'null'){
      $("#autenticacao").html(
              "<ul id='nav-mobile' class='right hide-on-med-and-down'>"+                
                "<li><a href='login.html'>Login</a></li>"+                
              "</ul>"
              );
  }else{
      $("#autenticacao").html(
              "<ul id='nav-mobile' class='right hide-on-med-and-down'>"+                
                "<li><a>Olá " + localStorage.clienteNome + "</a></li>"+
                "<li><a onclick='deslogar()';><i class='material-icons'>exit_to_app</i>Logout</a></li>"+
              "</ul>"
              );
  }
    
  $('.modal').modal({
      dismissible: false,
      complete: function() { 
          window.location.href='login.html'; 
      }
    }
  );
   
  
  if(localStorage.clienteId == 'null'){
      localStorage.setItem("paginaAtual", "confirmacao");
      $('#modal1').modal('open');
  }
  renderizarConfirmacao();
});

function deslogar(){
    localStorage.clienteId = null;
    window.location.href='index.html';
}

function finalizarCompra(){

    var clienteCpf = localStorage.clienteCpf;
    var idVooSelecionado = localStorage.idVooSelecionado;
    var idVooVoltaSelecionado = localStorage.idVooVoltaSelecionado;    
    var nCartao = document.getElementById('numero_cartao').value;
    var numeroAssento = "9999";
    
    var req_inserirCompra = "http://localhost/Source/Slim/api.php/inserirCompra/" + nCartao+ "/" + clienteCpf;
    console.log(req_inserirCompra);
    
    //Inserir compra
        $.ajax({
        url: req_inserirCompra,
        dataType: 'json',
        async: false,
        success: function(idCompra) {
            
            localStorage.setItem("idCompra",idCompra);
            
            //Inserir os tickets
            for(var i = 0; i < localStorage.quantidade; i++){
                //Inserir tickets ida
                var dataNascimento = Date.parse(document.getElementById('dataNascimentoPassageiro' + i).value).toString("yyyy-MM-dd");
                var req_inserirTicketIda = "http://localhost/Source/Slim/api.php/inserirTicket/" + idCompra +"/"
                                                                                              + idVooSelecionado + "/" 
                                                                                              + numeroAssento + "/"
                                                                                              + document.getElementById('nomePassageiro' + i).value + "/"
                                                                                              + document.getElementById('cpfPassageiro' + i).value + "/"
                                                                                              + dataNascimento;
                console.log(req_inserirTicketIda);
                    $.ajax({
                        url: req_inserirTicketIda,
                        dataType: 'json',
                        async: false,
                        success: function(data) {


                        }
                    });

                //Verificar se possui volta, para inserir os tickets
                if(localStorage.tipo == "IDA_VOLTA"){
                    var dataNascimento = Date.parse(document.getElementById('dataNascimentoPassageiro' + i).value).toString("yyyy-MM-dd");
                    var req_inserirTicketVolta = "http://localhost/Source/Slim/api.php/inserirTicket/" + idCompra +"/"
                                                                                              + idVooVoltaSelecionado + "/" 
                                                                                              + numeroAssento + "/"
                                                                                              + document.getElementById('nomePassageiro' + i).value + "/"
                                                                                              + document.getElementById('cpfPassageiro' + i).value + "/"
                                                                                              + dataNascimento;
                console.log(req_inserirTicketVolta);
                $.ajax({
                    url: req_inserirTicketVolta,
                    dataType: 'json',
                    async: false,
                    success: function(data) {


                    }
                });
                
                
                }

            }
            

        }
      });
    
        
    window.location.href='recomendacao.html';
}

function renderizarConfirmacao(){
    
    var idVooSelecionado = localStorage.idVooSelecionado;
    var idVooVoltaSelecionado = localStorage.idVooVoltaSelecionado;
    
    var link = "http://localhost/Source/Slim/api.php/getVooById/"+idVooSelecionado;
    var link2 = "http://localhost/Source/Slim/api.php/getVooById/"+idVooVoltaSelecionado;
    
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
                                    "<span class='card-title' style='font-size: 30px;'>DETALHES IDA</span>"+    
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
      
      if(localStorage.tipo == "IDA_VOLTA"){
          
        $.ajax({
        url: link2,
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
                                    "<span class='card-title' style='font-size: 30px;'>DETALHES VOLTA</span>"+    
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
                                        "<input placeholder='' id='nomePassageiro" + i +"' type='text' class='validate'>"+
                                        "<label for='nomePassageiro" + i +"'>Nome</label>"+
                                    "</div>"+
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='nomePassageiro" + i +"' type='text' class='validate'>"+
                                        "<label for='nomePassageiro" + i +"'>Sobrenome</label>"+
                                    "</div>"+                            
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='cpfPassageiro" + i +"' type='text' class='validate'>"+
                                        "<label for='cpfPassageiro" + i +"'>CPF</label>"+
                                    "</div>"+
                                    "<div class='input-field col s6'>"+
                                        "<input placeholder='' id='dataNascimentoPassageiro" + i +"' type='text' class='datepicker'>"+
                                        "<label for='dataNascimentoPassageiro" + i +"'>Data nascimento</label>"+
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

      
      
    
    
}