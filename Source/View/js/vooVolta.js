$( document ).ready(function() {
    localStorage.setItem("paginaAtual", "vooVolta");
  renderizarVoos();
});

function goToFinalizar(id){
    localStorage.setItem("idVooVoltaSelecionado", id);
    
    window.location.href='confirmacao.html';

}

function renderizarVoos(){

    var origem = localStorage.destino;
    var destino = localStorage.origem;
    var data_volta = localStorage.data_volta;
    var quantidade = localStorage.quantidade;
    var data_volta_convertida = Date.parse(data_volta).toString("yyyy-MM-dd");

    var link = "http://localhost/Source/Slim/api.php/getVoos/"+data_volta_convertida+"/"+origem+"/"+destino;
    console.log(link);
    
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
                                            "<input disabled placeholder='"+origem+"' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name'>Origem</label>"+
                                        "</div>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='"+destino+"' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name'>Destino</label>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='row'>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='"+data_volta+"' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name'>Data</label>"+
                                        "</div>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='"+quantidade+"' id='first_name' type='text' class='validate'>"+
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
    
    
    $.ajax({
        url: link,
        dataType: 'json',
        async: false,
        success: function(voos) {
            
            if(voos == "VOO_404"){
                alert("Voo nao encontrado");
                return;
            }
            
            console.log(voos);

            for(var i = 0; i < voos.length; i++){

                $("#voos").append(

                    "<div class='row'>"+
                        "<div class='col s12 m12'>"+
                            "<div class='card cyan lighten-5'>"+
                                "<div class='card-content black-text' style='padding-bottom: 5px;'>"+                       
                                    "<div class='row'>"+                        
                                        "<form class='col s12'>"+
                                            "<span class='card-title'>"+voos[i].codigo+"</span>" +
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+voos[i].fabricante_aviao+" "+voos[i].modelo_aviao+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Aeronave</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+voos[i].preco+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Preço</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+voos[i].partida+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Horário Partida</label>"+
                                            "</div>"+
                                            "<div class='input-field col s6'>"+
                                                "<input disabled placeholder='"+voos[i].chegada+"' id='first_name' type='text' class='validate'>"+
                                                "<label for='first_name'>Horário Chegada</label>"+
                                            "</div>"+
                                            "<div class='blue-text text-darken-2'>"+
                                                "<a class='waves-effect waves-light btn' id='"+voos[i].idVoo+"' onclick='goToFinalizar(this.id);'><i class='material-icons right'>shopping_cart</i>Comprar</a>"+
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




