 <?php 
    //passo 1 - abrir conexão
    $c = mysqli_connect("localhost","root","","andes");
    
    // passo 2 - testar conexão
    if(mysqli_connect_errno()){
        die("conexão falhou: ".mysqli_connect_errno());
    }
?>