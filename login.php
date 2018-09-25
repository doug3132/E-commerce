<?php require_once("conexao/conexao.php"); ?>

<?php
    session_start();
    session_destroy();
    session_start();
    
    if(isset( $_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $login = "SELECT *";
        $login .= " FROM clientes";
        $login .= " WHERE usuario = '{$usuario}' and senha = '{$senha}'";
        
        $acesso = mysqli_query($c, $login);
        
        if(!$acesso){
            die("falha ao logar");
        }
        
        $info = mysqli_fetch_assoc($acesso);
        
        if(empty($info)){
            $mensagem = "falha ao logar";
        }else{
            $_SESSION["user_portal"] = $info["clienteID"];
            Header("location: listagem.php");
        }
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            
            <div id="janela_login">
                
                <form action="login.php" method="post">
                    <h2>Tela de login</h2>
                    <input type="text" name="usuario" placeholder="Usuario">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="login">
                    <?php 
                        if(isset($mensagem)){
                    ?>
                    <p><?php  echo $mensagem ?></p>
                    <?php    
                            $mesagem = null;
                        
                        }
                    ?>
                </form>
            </div>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($c);
?>