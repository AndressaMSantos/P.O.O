<?php
session_start();
include "../servidor.php";
// Variaveis
$titulo = $_POST["titulo"];
$desc = $_POST["desc"];
$valor = $_POST["valor"];
$ed = $_POST["ed"];
$id = $_POST["cod_liv"];



$sql = "UPDATE tb_livro SET titulo_liv = '$titulo', desc_liv = '$desc', valor_liv = '$valor', cod_ed = '$ed' WHERE cod_liv = '$id'";
$resp = $OOP->query($sql);

if ($OOP->affected_rows) {
    echo "<script type='text/javascript'>
    alert('Alteração feita!');
    </script>";
