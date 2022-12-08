<?php 
    session_start();
    include_once "../servidor.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
	
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
</head>

<body>
    <div class="container">

<?php


$id = $_GET["cod_liv"];
$sql = " DELETE FROM tb_livro WHERE cod_liv = " . $id;
$OOP->query($sql);


if ($OOP->affected_rows) {

    echo    "<script>
                alert('Deletado com sucesso!');
                window.location.href='lista_livro.php'
            </script>";
}
?>
</body>

<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>
