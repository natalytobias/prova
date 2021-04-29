<?php

  session_start();
  if(!isset($_SESSION['id_user'])){

    header('location: entraruser.php');
    exit;
  }


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
<form class="was-validated">
  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Descrição Do produto</label>
    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="invalid-feedback">
    </div>
  </div>

  <div class="mb-3">
    <input type="file" class="form-control" aria-label="file example" required>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
</div>

    <div class="tab_user">
      <table class="table">
        <thread>
          <tr>
             <th Scope="col" width="30%">EMAIL</th>
             <th Scope="col" width="30%">ID</th>
             <th scope="col" width="20%" colspan="2">Ação</th>
          </tr>
        </thread>

        <?php 
        
        $results = $mysqli->query("SELECT * FROM tb_usuario WHERE id_user ORDER BY id_user ASC");

        //output results

        print '<table border="0" class="table">';
        while($row = $results->fetch_array()) {

          $id = @($row["id"]);
            print '<tr>';
            print '<td width="30%">'.$row["email"].'</td>';
            print '<td width="20%">******</td>';
            print '<td width="20%">
                    <a href="deletar_usuario.php?idd='.$row["id_user"].'">Excluir</a>
            </td>';
            
            print '</tr>';

        }  
        print '</table>';

        echo 'Registros Encontrados: '. $results->num_rows;

        $results->free();
        $mysqli->close();
        ?>


          </table>
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