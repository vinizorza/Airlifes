  $(document).ready(function(){
      localStorage.setItem("paginaAtual", "cadastro");
    $('.modal').modal({
      dismissible: false
    });
  });
  
  function realizarCadastro(){
      
      var nome = document.getElementById('nome').value;
      var email = document.getElementById('email').value;
      var senha = document.getElementById('senha').value;
      var confirmacao_senha = document.getElementById('confirmacao_senha').value;
      var cpf = document.getElementById('cpf').value;
      var data_nascimento = document.getElementById('data_nascimento').value;
      data_nascimento = Date.parse(data_nascimento).toString("yyyy-MM-dd");
      
      
      if(senha !== confirmacao_senha){
          $('#modal1').modal('open');
          return;
      }
      
      if(senha.length < 4){
          $('#modal2').modal('open');
          return;
      }
      
      if(nome == "" || email == "" || senha == "" || cpf == "" || data_nascimento == ""){
          $('#modal3').modal('open');
          return;
      }
      
      var req = "http://localhost/Source/Slim/api.php/inserirCliente/" +
                nome + "/" +
                "9999" + "/" +
                email + "/" +
                cpf + "/" +
                senha; 
       
        $.ajax({
            url: req,
            async: false,
            success: function(resp) {            
                if(resp !== "CLIENTE_INSERIDO"){
                    $('#modal4').modal('open');
                }     
            }
        });      
    
    window.location.href='login.html';
}