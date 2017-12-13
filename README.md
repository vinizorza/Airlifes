Airlifes
===================


Sistema web para venda de passagens de uma companhia aérea (Airlifes). Inclui integração com um sistema de aluguel de carro e de hotéis.

----------


Tecnologias
-------------
O sistema possui o *server side* na linguagem PHP. Se comunica com o *client side* através de REST. Para facilitar o uso de REST, utiliza-se o Slim Framework (PHP).

No *client side* utiliza-se apenas HTML, Javascript, jQuery, CSS e o framework Materilialize.

Os serviços REST, é utilizado tanto pela aplicação do sistema terceiro, quanto o *client side* da Airlifes

Processo de Negócio
-------------

Primeiramente é necessário que um administrador insira nos sistemas as
informações do voo, bem como o aeroporto de origem e destino e a aeronave.
Quando o cliente acessar o site, ele fará uma busca definida pela data e o destino
desejado. O site mostrará os voos que condizem com a busca do cliente. O
cliente escolherá o(s) voo(s). Se ele não estiver logado no sistema, será
direcionado para uma página de login ou criação de conta. Ao estiver logado,
seguirá para a página de fechamento de compra. Quando a compra for
finalizada, será recomendada alguns hotéis. Caso o cliente escolha algum, será
direcionado ao sistema da rede de hotéis para o fechamento da compra.

[<i class="icon-file"></i>Veja aqui a definição de requisitos](https://github.com/vinizorza/Airlifes/blob/master/Documentos/Documento_Definicao_Requisitos.pdf) 

Diagrama de Cado de Uso
-------------
![enter image description here](https://raw.githubusercontent.com/vinizorza/Airlifes/master/Documentos/Diagrama_Caso_Uso.png)

Diagrama de Classe
-------------
![enter image description here](https://raw.githubusercontent.com/vinizorza/Airlifes/master/Documentos/Diagrama_De_Classe.png)

Diagrama de Classe
-------------
![enter image description here](https://raw.githubusercontent.com/vinizorza/Airlifes/master/Documentos/Diagrama_Arquitetura.png)


Documentação REST
-------------

**BUSCAR VOO PELA SIGLA:**

	http://localhost/Source/Slim/api.php/getVoos/{data}/{SiglaAeroportoOrigem}/{SiglaAeroportoDestino}
	
	Exemplo:	
	http://localhost/Source/Slim/api.php/getVoos/2017-09-13/VIX/CGH

**INSERIR COMPRA (Esta função retorna o ID da compra):**
	
	http://localhost/Source/Slim/api.php/inserirCompra/{nCartao}/{cpfCliente}
	
	Exemplo:
	http://localhost/Source/Slim/api.php/inserirCompra/3232/32132132132

**INSERIR TICKET (Esta função retorna o ID da compra):**

	http://localhost/Source/Slim/api.php/inserirTicket/{idCompra}/{idVoo}/{numeroAssento}/{nomePassageiro}/{cpf}/{dataNascimento}
	
	Exemplo:
	http://localhost/Source/Slim/api.php/inserirTicket/1/1/42/Jose/15874/1980-05-09
