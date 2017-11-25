$( document ).ready(function() {
  renderizarRecomendacao();
});


function renderizarRecomendacao(){

    var destino = localStorage.destino;
    var data_ida = localStorage.data_ida;
    //var data_volta = localStorage.data_volta;
    var quantidade = localStorage.quantidade;
    var data_ida_convertida = Date.parse(data_ida).toString("yyyy-MM-dd");

    var link = "http://echohotel.azurewebsites.net/api/hotel/";
   
    
    $.ajax({
        url: link,
        dataType: 'json',
        async: false,
        success: function(hoteis) {
            
        console.log(hoteis);

        for(var i = 0; i < hoteis.length; i++){
            
        var estrelas = "";    
        for(var j = 0; j < hoteis[i].QtdEstrelas; j++){
        estrelas += "<i class='material-icons center'>star</i>";                                       
        }

            $("#hoteis").append(
                        "<div class='col l4'>"+
                            "<div class='card '>"+
                                "<div class='card-image waves-effect waves-block waves-light'>"+
                                    "<img class='activator' src='https://images.trvl-media.com/media/content/expus/graphics/launch/hotel1320x742.jpg'>"+
                                "</div>"+
                                "<div class='card-content'>"+
                                    "<span class='card-title activator grey-text text-darken-4'>"+hoteis[i].Nome+"<i class='material-icons right'>more_vert</i></span>"+
                                    "<p><a href='#'>RESERVAR</a></p>"+
                                "</div>"+
                                "<div class='card-reveal'>"+
                                    "<span class='card-title grey-text text-darken-4'>"+hoteis[i].Nome+"<i class='material-icons right'>close</i></span>"+
                                    "<div class='row'>"+
                                        "<p>"+estrelas+"</p>"+
                                    "</div>"+
                                    "<p>"+hoteis[i].Descricao+"</p>"+
                                "</div>"+
                            "</div>"+
                        "</div>"

            );
        }
            

        }
      });
    

}