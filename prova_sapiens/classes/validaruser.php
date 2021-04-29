<?php

  Class Usuario{
      private $pdo;
      public $msgerro;
      
      public function conectar($dbname,$host, $user, $passwd)
      
      {
          global $pdo;
          try
          {
              $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $passwd);
          }
          catch(PDOException $e)
          {
              $msgerro = $e->getMessage();
          } 
      }

          //metódo para cadastrar novo usuário

        public function cadastrar($email,$senha)
          {
              global $pdo;

            //verficar se o usuário já está cadastrado
            $sql=$pdo->prepare("SELECT id_user FROM tb_usuario WHERE email_user=:u");
            $sql->bindValue(":u", $email);
            $sql->execute();

            if($sql->rowCount()>0){
                return false; //usuário já cadastrado
            }
            else
            {
                $sql=$pdo->prepare("INSERT INTO tb_usuario(email_user,senha_user) VALUES (:u, :s)");
                $sql->bindValue(":u", $email);
                $sql->bindValue(":s", sha1($senha));
                $sql->execute();

                return true; //usuário cadastrado com sucesso
            }
          }

         public function logar($email,$senha){
         global $pdo;

          $sql = $pdo->prepare("SELECT * FROM tb_usuario WHERE email_user=:n AND senha_user=:s");
          $sql->bindValue(":n", $email);
          $sql->bindValue(":s", md5($senha));
          $sql->execute();

          if($sql->rowCount()>0)
          {
              //criar sessão de usuário
              $dado = $sql->fetch();
              session_start();
              $_SESSION['id_user']=$dado['id_user'];

              return true; //usuário logado
          }

          else 
          {
              return false; //usuário não está logado
          }


          }


          
      }

  



?>