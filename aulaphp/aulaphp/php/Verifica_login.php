<?php

    $Login = htmlspecialchars($_GET['login']);
    $senha = htmlspecialchars($_GET['senha']);

    if($Login == "clara.leonardo@aluno.senai.br" && $senha == "123456"){
       echo("logado");
    }else{
       echo("login ou senha incorretos");
    }
?>
