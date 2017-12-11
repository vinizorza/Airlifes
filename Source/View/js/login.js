  $(document).ready(function(){
    $('.modal').modal({
      dismissible: false
    });    
  });
  
  function realizarLogin(){
      var email = document.getElementById('email').value;
      var senha = document.getElementById('senha').value;
      
      var link = "http://localhost/Source/Slim/api.php/getClienteByEmail/"+email;
      
      $.ajax({
        url: link,
        dataType: 'json',
        async: false,
        success: function(cliente){
                        
            if(cliente.email == null){
                localStorage.setItem("clienteId", null);
                localStorage.setItem("clienteEmail", null);      
                localStorage.setItem("clienteNome", null);
                localStorage.setItem("clienteCpf", null);
                $('#modal1').modal('open');
                return;
            }else if(cliente.email == email && cliente.senha != senha){
                localStorage.setItem("clienteId", null);
                localStorage.setItem("clienteEmail", null);      
                localStorage.setItem("clienteNome", null);
                localStorage.setItem("clienteCpf", null);
                $('#modal2').modal('open');
                return;
            }else{
                localStorage.setItem("clienteId", cliente.id);
                localStorage.setItem("clienteEmail", cliente.email);      
                localStorage.setItem("clienteNome", cliente.nome);
                localStorage.setItem("clienteCpf", cliente.cpf);
                if(localStorage.paginaAtual == "confirmacao"){                    
                    localStorage.setItem("paginaAtual", null);
                    window.location.href='confirmacao.html';
                }else{
                    window.location.href='index.html';
                }
                 
            }
        }
      });  
  }