<header>
    <div id="header_central">
        <?php
            if(isset($_SESSION["user_portal"])){
                $user = $_SESSION["user_portal"];
                $saudacao = "select nomecompleto";
                $saudacao .= " from clientes";
                $saudacao .= " where clienteID = {$user}"; 
                
                $pesquisa  = mysqli_query($c, $saudacao);
                
                $nome = "";
                
                if(!$pesquisa){
                    die("falou a conexão");
                }else{
                    $pesquisa = mysqli_fetch_assoc($pesquisa);
                    $nome = $pesquisa["nomecompleto"];
                }
        ?>
            <div id="header_saudacao">
                <h5 style=" color: brown"><b>Bem vindo ,<?php echo $nome; ?></b> <a href="sair.php"> <button class="btn btn-warning navbar-btn" type="submit"> Sair</button>  </a></h5>
            
            </div>
        <?php        
            }
        ?>
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif">
    </div>
</header>