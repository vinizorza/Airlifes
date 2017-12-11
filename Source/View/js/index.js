$( document ).ready(function() {
    
   localStorage.setItem("paginaAtual", "index");
      
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
});

function deslogar(){
    localStorage.clienteId = null;
    window.location.href='index.html';
}

function guardarDadosBusca(){

    //Lembrar de validar os campos

    var origem = document.getElementById('origem').value;
    var destino = document.getElementById('destino').value;
    var data_ida = document.getElementById('data_ida').value;
    var data_volta = document.getElementById('data_volta').value;
    var quantidade = document.getElementById('quantidade').value;
    var tipo;
   
    if (document.getElementById('somente_ida').checked) {
        tipo = "SOMENTE_IDA";
     }else{
         tipo = "IDA_VOLTA";
     }

    if(origem == "" || destino == "" || data_ida == "" || quantidade == ""){
        alert("Preencha os campos necessários");
    }else{

        localStorage.setItem("origem", origem);
        localStorage.setItem("destino", destino);
        localStorage.setItem("data_ida", data_ida);
        localStorage.setItem("data_volta", data_volta);
        localStorage.setItem("quantidade", quantidade);
        localStorage.setItem("tipo", tipo);
        
        window.location.href='voos.html';
    }
    
}