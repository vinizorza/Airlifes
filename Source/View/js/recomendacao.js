$( document ).ready(function() {
  renderizarRecomendacao();
});

function reservarHospedagem($idHospedagem){
    var req = "http://localhost/Source/Slim/api.php/inserirHospedagem/" + $idHospedagem + "/" + localStorage.idCompra;
    console.log(req);
    $.ajax({
        url: req,
        dataType: 'json',
        async: false
        success: function(ins){
        var link_comprarAcomo = "http://echohotel.azurewebsites.net/api/Acomodacao/InsertAcomodacao?cpf=" + localStorage.clienteCpf + "&idAcomodacao=" + ins;
      
        $.ajax({
            url: link_comprarAcomo,
            dataType: 'json',
            async: false,
      }
    });
    window.location.href='meusPedidos.html';
}


function renderizarRecomendacao(){

    var destino = localStorage.destino;
    var data_ida = localStorage.data_ida;
    var data_volta = localStorage.data_volta;
    var quantidade = localStorage.quantidade;
    var data_ida_convertida = Date.parse(data_ida).toString("yyyy-MM-dd");
    var data_volta_convertida = Date.parse(data_volta).toString("yyyy-MM-dd");

    var link = "http://echohotel.azurewebsites.net/api/hotel/GetHoteisPorDataLocal?dataInicio="+ data_ida_convertida 
                                                                             + "&dataTermino=" + data_volta_convertida 
                                                                                   + "&sigla=" + destino
                                                                                  + "&guests=" + quantidade;
    
    console.log(link);
   
    
    $.ajax({
        url: link,
        dataType: 'json',
        async: false,
        success: function(hoteis) {
            
        console.log(hoteis);

        for(var i = 0; i < hoteis.length; i++){

            $("#hoteis").append(
                        "<div class='col l4'>"+
                            "<div class='card '>"+
                                "<div class='card-image waves-effect waves-block waves-light'>"+
                                    "<img class='activator' src='https://images.trvl-media.com/media/content/expus/graphics/launch/hotel1320x742.jpg'>"+
                                "</div>"+
                                "<div class='card-content'>"+
                                    "<span class='card-title activator grey-text text-darken-4'>"+hoteis[i].Nome+"<i class='material-icons right'>more_vert</i></span>"+
                                    "<p><a id='"+hoteis[i].AcomodacaoId+"' onclick='reservarHospedagem(this.id)';>RESERVAR</a></p>"+
                                "</div>"+
                                "<div class='card-reveal'>"+
                                    "<span class='card-title grey-text text-darken-4'>"+hoteis[i].Nome+"<i class='material-icons right'>close</i></span>"+
                                    "<p>"+hoteis[i].DescricaoHotel+"</p>"+
                                    "<p> Endereço: "+ hoteis[i].Rua + ", Bairro: " + hoteis[i].Bairro + ", CEP: "+ hoteis[i].Cep +"</p>"+
                                "</div>"+
                            "</div>"+
                        "</div>"

            );
        }
            

        }
      });
    

}
