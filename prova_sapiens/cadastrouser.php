<?php
    require_once 'classes/validaruser.php';
    $u = new Usuario //chamando a classe;
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>ACME</title>
  </head>
  <header class="topo">
  <div class="container">
  <div class="row">
    <div class="col-sm">
    <img src="imagens/logoo.png" class="figure-img img-fluid rounded" alt="logosite">
    </div>
    <div class="col-sm">
    <h1 class="titulo-principal">ACME</h1>
  <p> onde tem de tudo e mais um pouco</p>
  </div>
</div>
</header>
  <body>

     <ul id="menu-horizontal">
       <li><a href="entraruser.php">ENTRAR</a></li>
       <li><a href="index.php">HOME</a></li>
</ul>

<div class="container-fluid">
<div class = "forlogin" >
                        <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <div class="mb-3">
                        <label for="conf_senha" class="form-label">Confirmar a Senha</label>
                        <input type="password" class="form-control" id="conf_senha" name="conf_senha">
                    </div>
                    <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                            <a href="entraruser.php"><strong>Fazer Login</strong></a>
                        </div>
                </form>
    <?php
      //verifica se após o clique o botão submit foi gerado alguma informação
      if(isset($_POST['email'])){
        $email               = addslashes($_POST['email']);
        $senha               = addslashes($_POST['senha']);
        $conf_senha          = addslashes($_POST['conf_senha']);

       if(!empty($email) && !empty($senha)){
         $u->conectar("bd_acme","localhost","root","");

         if($u->msgerro == "") {
           if($senha == $conf_senha){ 
              if($u->cadastrar($email, $senha)){
                  echo "Cadastrado com sucesso";
                } else {
                  echo "Usuário já cadastrado";
                }
            }else{
              echo "As senhas não conferem";
            } 
          } else {
            echo "Erro: ".$u->msgerro;
          }
        } else {
          echo "Preencha seus dados";
        }
      }

                  
    ?>


       </div>
       </div>
   </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>