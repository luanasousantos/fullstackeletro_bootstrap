<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fseletro";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("A conexão ao BD falhou: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Produtos - Full Stack Eletro</title>
    <link rel="stylesheet" href="./estilo.css">
    <script src="./funcoes.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <!-- Menu-->
    <div class="container-fluid bg-danger">
<nav class="nav nav-pills nav-fill ">
    <a class="nav-item nav-link" href="index.php"><img width="100px" src="./imagens/logo" alt="Full Stack Eletro"></a>
    <a class="nav-item nav-link text-white" href="./produtos.php">Produtos</a>
    <a class="nav-item nav-link text-white" href="./loja.php">Nossas lojas</a>
    <a class="nav-item nav-link text-white" href="./contato.php">Fale conosco</a>
  </nav>
</div>
    <!-- Fim do Menu-->
   <div class="container-fluid">
    <header>
        <h2>Produtos</h2>
    </header>
    <hr>
    </div>

    <div class="container-left">
        <h3 style="font-size:22px">Categorias</h3>
                <ul>
                    <li class="linha-produtos" onclick="exibir_todos()"> Todos (12)</li>
                    <li class="linha-produtos" onclick="exibir_categorias('geladeira')">Geladeiras (3)</li>
                    <li class="linha-produtos" onclick="exibir_categorias('fogao')">Fogões (2)</li>
                    <li class="linha-produtos" onclick="exibir_categorias('microondas')">Microondas (3)</li>
                    <li class="linha-produtos" onclick="exibir_categorias('lavadora')">Lavadora de roupas (2)</li>
                    <li class="linha-produtos" onclick="exibir_categorias('lavaloucas')">Lava louças (2)</li>
                    
                </ul>
</div>     
    
<div class="container">
    <?php
$sql = "select * from produto";
$result = $conn->query($sql);

if($result->num_rows > 0){
while($rows = $result->fetch_assoc()){
   
?>
    <div class="row mx-md-n5">
    <div class="box-produtos" id="<?php echo $rows["categoria"]; ?>" style="display:inline-block;">
        <img src="<?php echo $rows["imagem"]; ?>" class="cursorzoom" width="140px" onmouseenter="destaque(this)" onmouseout="tirazoom(this)">
        <br>
        <p class="descrição"><?php echo $rows["descricao"]; ?></p>
        <hr>
        <p class="descrição" ><strike>R$<?php echo $rows["preco"]; ?></strike></p>
        <p class="text-danger" style="font-size:30px;">R$<?php echo $rows["precofinal"]; ?></p>
    </div>
    </div>
    
<?php
}
}
else{
    echo "Nenhum produto cadastrado!";
}
    
?>
</div>
<br><br><br><br><br><br>

<div class="container" style="text-align:center;">
    <footer>
        <p class="text-danger">Formas de pagamento</p>
        <img src="./imagens/formas-pagamento.png" alt="Formas de pagamento">
        <p>&copy;Recode Pro</p>
    </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
