  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
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
                $('#modal1').modal('open');
                return;
            }else if(cliente.email == email && cliente.senha != senha){
                localStorage.setItem("clienteId", null);
                localStorage.setItem("clienteEmail", null);      
                localStorage.setItem("clienteNome", null);
                $('#modal2').modal('open');
                return;
            }else{
                localStorage.setItem("clienteId", cliente.id);
                localStorage.setItem("clienteEmail", cliente.email);      
                localStorage.setItem("clienteNome", cliente.nome);
            }
        }
      });
  }