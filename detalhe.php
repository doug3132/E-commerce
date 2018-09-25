<?php require_once("conexao/conexao.php"); ?>
<?php
    // teste de segurança para não usuarios entrarem;
    session_start();
    if(!isset($_SESSION["user_portal"])){
        Header("location: login.php");
        exit;
    }
    
    if(isset($_GET["codigo"])){
    $produto_id = $_GET["codigo"];
    }
    else{
        Header("location: login.php");
    }

    // consulta ao banco de dados
    $consulta = "SELECT *";
    $consulta .= " FROM produtos";
    $consulta .= " where produtoID = {$produto_id}";
    $detalhe = mysqli_query($c, $consulta);
    
    if(!$detalhe) {
            die("Falha na consulta ao banco");   
    }
    else{
        $dados_detalhe = mysqli_fetch_assoc($detalhe);
        $produtoID = $dados_detalhe["produtoID"];
        $nome = $dados_detalhe["nomeproduto"];
        $descricao = $dados_detalhe["descricao"];
        $codigodebarra = $dados_detalhe["codigobarra"];
        $tempoentrega = $dados_detalhe["tempoentrega"];
        $precovenda = $dados_detalhe["precorevenda"];
        $precountario = $dados_detalhe["precounitario"];
        $estoque = $dados_detalhe["estoque"];
        $imagem = $dados_detalhe["imagemgrande"];
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
         <link href="../../css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li> <img src="<?php echo $imagem ?>"></li>
                    <li><b>Nome do produto: </b><h3><?php echo $nome ?></h3></li>
                    <li><b>Descrição: </b><?php echo $descricao ?></li>
                    <li><b>Código de barras: </b><?php echo $codigodebarra ?></li>
                    <li><b>Tempo de entrega: </b><?php echo $tempoentrega ?></li>
                    <li><b>Preço re venda: </b><?php echo "R$ ".number_format($precovenda,2,",",".") ?></li>
                    <li><b>Preço unitario: </b><?php echo "R$ ".number_format($precountario,2,",",".") ?></li>
                    <li><b>Estoque: </b><?php echo $estoque ?></li>
                </ul>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($c);
?>