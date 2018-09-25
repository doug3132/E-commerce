<?php require_once("conexao/conexao.php"); ?>

<?php
    // iniciar a sessão
    session_start();
    $_SESSION["usuario"] = "Douglas";
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
        <?php echo $_SESSION["usuario"]; ?>
            <a href="pagina2.php">Pagina2</a>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($c);
?>