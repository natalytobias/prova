<?php
    session_start();
    include_once ('conexao.php');

        $id = $_GET['idd'];

        $sql = "DELETE FROM tb_usuario WHERE id_user = {$id}";
        $resul_user = mysqli_query($mysqli, $sql);

        if($mysqli->query($sql) === TRUE){
            echo "<script>alert('Registro excluido com sucesso');
            location.href='usuarios.php'
            </script>";
        }
        else
        {
            echo "<script>alert('Não foi possivel excluir o registro');
            location.href='usuarios.php'
            </script>";
        }

?>