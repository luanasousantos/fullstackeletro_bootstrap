<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fseletro";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("A conexão ao BD falhou: " . mysqli_connect_error());
}
if(isset($_POST['nome']) && isset($_POST['msg'])){
    $nome = $_POST['nome'];
    $msg = $_POST['msg'];

    $sql = "insert into comentarios (nome, msg) values('$nome', '$msg')";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="./estilo.css">
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
        <h2>Contato</h2>
    </header>
    <hr>
    </div>

    <div class="row ml-5">
  <div class="col"><img src="./imagens/email.png" width="50px"></div>
  <div class="col"><img src="./imagens/whatsapp.png" width="50px"></div>
  </div>
  <div class="row ml-5">
  <div class="col ">contato@fullstackeletro.com</div>
  <div class="col">(11)99999-9999</div>
  </div>

<br><br>
    <form method="post" action="">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control w-50 p-3" id="nome" placeholder="Seu nome">

  </div>
  <div class="form-group">
    <label for="msg">Mensagem</label>
    <input type="text" name="msg" class="form-control w-75 p-3" id="msg" placeholder="Digite sua mensagem...">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>


    <h2><b>Comentários</b></h2>
      <?php
$sql = "select * from comentarios";
$result = $conn->query($sql);

if($result->num_rows > 0){
while($rows = $result->fetch_assoc()){
    echo "Data: ", $rows['data'], "</br>";
    echo "Nome: ", $rows['nome'], "</br>";
    echo "Mensagem: ", $rows['msg'], "</br>";
    echo "<hr>";
}
}
else{
    echo "Nenhum comentário ainda!";
}
    
?>
</div>

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
