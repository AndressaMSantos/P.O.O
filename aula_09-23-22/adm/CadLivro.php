<?php
// iniciar session;
session_start();
// incluir o servidor
include("../servidor.php");

//Variaveis post

$titulo = $_POST["titulo"];
$descricao = $_POST["desc"];
$valor = $_POST["valor"];
$ed = $_POST["ed"];

$imagem = $_FILES["arq"];



//1° Colocar o caminho da imagem no banco

//Pasta de Destino da foto
$pasta = "img/";

//Nome da imagem
$nomeDaImg = $imagem['name'];

//Alterando o nome do arquivo para um nome unico
$novoNomeDaFoto = uniqid();

//Pegando somente a extensão do arquivo
$extensao = strtolower(pathinfo($nomeDaImg, PATHINFO_EXTENSION));

$caminho = $pasta . $novoNomeDaFoto . "." . $extensao;

if($extensao != "jpg" && $extensao != "png"){
    die("Tipo de arquivo não aceito!!");
}

//2° Os dados no banco

$sql = " INSERT INTO TB_LIVRO(cod_ed, titulo_liv, desc_liv, img_liv, valor_liv) VALUES($ed, '$titulo', '$descricao', '$caminho', '$valor') ";

//Executar query

$res = mysqli_query($banco, $sql);

//saber se algo foi executado no banco

if(mysqli_affected_rows($banco)){
    echo " <script type='text/javascript'> alert('Cadastro feito!!!!') </script>";

    //3° Mover a imagem para pasta
    $movendoFoto = move_uploaded_file($imagem['tmp_name'], $caminho);

    //4° Indentificar o usuario e livro
    $cod_liv = mysqli_insert_id($banco);

    $sql_cad_livro = " INSERT INTO TB_CAD_LIVRO VALUES(".$_SESSION["login"]["id"].",".$cod_liv.") ";

    mysqli_query($banco, $sql_cad_livro);
}


?>