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
    
  $('#modal1').modal({
      dismissible: false,
      complete: function() { 
          window.location.href='login.html'; 
      }
    }
  );
  
  $('#modal2').modal({
      dismissible: false
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

function verHospedagem(idHospedagem){
    
    var req_hospedagem = "http://echohotel.azurewebsites.net/api/Acomodacao/" + idHospedagem;

    $.ajax({
        url: req_hospedagem,
        dataType: 'json',
        async: false,
        success: function(hosp){
            console.log(hosp);
            $("#nome_hotel").html("<h4>"+ hosp.Hotel.Nome +"</h4>");
            $("#detalhe_hotel").html("<p><b>Descrição:</b> "+ hosp.Descricao +"</p>");
            $("#preco_hotel").html("<p><b>Preço:</b> "+ hosp.Valor +"</p>");
            $('#modal2').modal('open');
        }
    });
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
                                                    "<a id='" + data[i].ID_HOSPEDAGEM + "' onclick='verHospedagem(this.id);'  class='waves-effect waves-light btn'>HOSPEDAGEM</a>" +
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