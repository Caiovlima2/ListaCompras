<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio1</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="CriarLista.html">Criar Lista</a>
        </li>
        
    </div>
      
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nome do Produto:</span>
        <input type="text" class="form-control" placeholder="Detergente" id="nome">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Quantidade do Produto:</span>
        <input type="text" class="form-control" placeholder="0" id="quantidade">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Preço do Produto:</span>
        <span class="input-group-text">R$</span>
        <input type="text" class="form-control" placeholder="00,00" id="preco">
      </div>
      <div class="input-group mb-3">
        <input class="btn btn-primary" type="button" value="Adicionar" onclick="AdicionaLinha()" style="width: 100%;">
      </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Total da Compra:</span>
      <input class="form-control" type="text" aria-label="readonly input example" readonly id="totCompra">
    </div>

    <div>
        <table class="table" id="tabelaLista">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th scoope="col">Total Produto</th>
                <th scope="col">Remover Linha</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>


    <script>

        var lista = [];
        var produto = [];
        var totalCompra = 0;

        function AdicionaLinha(){

          var nome = document.getElementById("nome").value;
          var quant = Number(document.getElementById("quantidade").value);
          var preco = Number(trocaPonto(document.getElementById("preco").value));

          var totalProduto = quant * preco;

          produto = [nome, quant, preco, totalProduto];

          adicionaProduto(produto);

          calculaTotal();

          addLinTab();

          limpaCampos();

        }


        function trocaPonto(x){

          var ret = x.replace("," , ".");

          return(ret);

        }

        function adicionaProduto(prod){

          lista.push(prod);

        }

        function calculaTotal(){

          totalCompra = 0;

          for(var i = 0; i < lista.length; i++){

            
            totalCompra += lista[i][3];

          }

          document.getElementById("totCompra").value = totalCompra;

        }



          function addLinTab(){

            var tabela = document.getElementById("tabelaLista");
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            var celula6 = linha.insertCell(5);

            var dados = geraValIns();

            celula1.innerHTML = dados[0];
            celula2.innerHTML = dados[1]; 
            celula3.innerHTML = dados[2];
            celula4.innerHTML = dados[3];
            celula5.innerHTML = dados[4];
            celula6.innerHTML = "<button type='button' class='btn btn-outline-danger' onclick='removeLinha(this)'>x</button>";

          }

          function removeLinha(linha) {
              var i=linha.parentNode.parentNode.rowIndex;
              document.getElementById('tabelaLista').deleteRow(i);
              lista.splice(i-1, 1);
              calculaTotal();
            }      


          function geraValIns(){

            var x = [];
            x[0] = lista.length;
            x[1] = lista[lista.length-1][0];
            x[2] = lista[lista.length-1][2];
            x[3] = lista[lista.length-1][1];
            x[4] = lista[lista.length-1][3];

            return x;

          }

          function limpaCampos(){

          document.getElementById("nome").value = "";
          document.getElementById("quantidade").value = "";
          document.getElementById("preco").value = "";

          }
        

    </script>
    

</body>
</html>
