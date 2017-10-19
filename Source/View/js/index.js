function guardarDadosBusca(){

    //Lembrar de validar os campos

    var origem = document.getElementById('origem').value;
    var destino = document.getElementById('destino').value;
    var data_ida = document.getElementById('data_ida').value;
    var data_volta = document.getElementById('data_volta').value;
    var quantidade = document.getElementById('quantidade').value;
    var somente_ida = document.getElementById('somente_ida').value;
    var ida_volta = document.getElementById('ida_volta').value;

    if(origem == "" || destino == "" || data_ida == "" || quantidade == ""){
        alert("Preencha os campos necessários");
    }else{

        localStorage.setItem("origem", origem);
        localStorage.setItem("destino", destino);
        localStorage.setItem("data_ida", data_ida);
        localStorage.setItem("data_volta", data_volta);
        localStorage.setItem("quantidade", quantidade);
        localStorage.setItem("somente_ida", somente_ida);
        localStorage.setItem("ida_volta", ida_volta);

        window.location.href='voos.html';

    }
    
}