 ///onload="renderizarVoos();"
// $(document).on("click", "#body", function(evt){
//     renderizarVoos();
// });

$( document ).ready(function() {
  renderizarVoos();
});

function goToFinalizar(id){
    //Salvar id no localStorage para ser usado na pagina posterior
    
    alert(id);
}

function renderizarVoos(){

    var origem = localStorage.origem;
    var destino = localStorage.destino;
    var data_ida = localStorage.data_ida;
    var data_ida_convertida = Date.parse(data_ida).toString("yyyy-MM-dd");

    var link = "http://viniciuszorzanelli.com/Source/Slim/api.php/getTodosVoos";
    //+data_ida_convertida+"/"+origem+"/"+destino;

    $.getJSON(link, function(voos) {
        
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
                                            "<label for='first_name' style='position: absolute; top: -30px;'>Aeronave</label>"+
                                        "</div>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='R$ 299' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name' style='position: absolute; top: -30px;'>Preço</label>"+
                                        "</div>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='17/05/2017 16:00' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name' style='position: absolute; top: -30px;'>Horário Partida</label>"+
                                        "</div>"+
                                        "<div class='input-field col s6'>"+
                                            "<input disabled placeholder='17/05/2017 21:00' id='first_name' type='text' class='validate'>"+
                                            "<label for='first_name' style='position: absolute; top: -30px;'>Horário Chegada</label>"+
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
			
    });
}




