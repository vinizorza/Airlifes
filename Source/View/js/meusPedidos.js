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
      localStorage.setItem("paginaAtual", "meusPedidos");
      $('#modal1').modal('open');
  }
  renderizarMeusPedidos();
});

function deslogar(){
    localStorage.clienteId = null;
    window.location.href='index.html';
}

function renderizarMeusPedidos(){        
    
    var req = "http://localhost/Source/Slim/api.php/getCompras/"+localStorage.clienteId;
    
    $.ajax({
        url: req,
        dataType: 'json',
        async: false,
        success: function(data) {
            
            for(var i = 0; i < data.length; i++){
                
                $("#compras").append(
                    "<div class='row'>"+
                        "<div class='col s12 m12'>"+
                            "<div class='card light-blue lighten-3'>"+
                                "<div class='card-content black-text' style='padding-bottom: 0px;'>"+
                                    "<div class='row'>"+
                                        "<form class='col s12'>"+
                                        "<span class='card-title' style='font-size: 30px;'>COMPRA "+ (i+1) +"</span>"+    
                                            "<div class='row'>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].HORARIO_COMPRA+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Horário Compra</label>"+
                                                "</div>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].CODIGO_VOO+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Código Voo</label>"+
                                                "</div>"+
                                            "</div>"+
                                            "<div class='row'>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].CIDADE_ORIGEM+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Cidade Origem</label>"+
                                                "</div>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].CIDADE_DESTINO+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Cidade Destino</label>"+
                                                "</div>"+
                                            "</div>"+
                                            "<div class='row'>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].PRECO+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Preço</label>"+
                                                "</div>"+
                                                "<div class='input-field col s6'>"+
                                                    "<input disabled placeholder='"+data[i].ID_HOSPEDAGEM+"' id='first_name' type='text' class='validate'>"+
                                                    "<label for='first_name'>Hospedagem</label>"+
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
            
            
        }
      });
      

}