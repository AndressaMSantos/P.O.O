<?php
session_start();
include("../servidor.php");

// iremos pegar o dados preenchido no formulario

$login = $_POST['login'];
$senha = $_POST['senha'];

//echo $login . " " . $senha; 

$sql = " SELECT  * FROM tb_usuario ";
$sql .= " WHERE login_us = '" . $login . "' AND  senha_us ='" . md5($senha) . "'";

//echo $sql;

// executar a string feita em php e converte em comando sql

$resultado = mysqli_query($banco, $sql);
// saber o numero de linha retornado



// Direcionar par a tela menu.php
if (mysqli_num_rows($resultado) == 1) {
   // ler o registro do banco de dados
   $campos = mysqli_fetch_array($resultado); // tabela do banco

   $_SESSION["login"]["id"] = $campos["cod_us"];
   $_SESSION["login"]["user"] = $campos["nome_us"];

   // echo $campos["cod_us"];
   // echo $campos["nome_us"];
   // echo $campos["login_us"];
   // echo $campos["senha_us"];

   header("location:menu.php");
}
else {
   header("location:index.php");
}
