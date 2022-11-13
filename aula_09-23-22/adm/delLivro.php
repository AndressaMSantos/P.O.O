<?php
// iniciar session;
session_start();
// incluir o servidor
include("../servidor.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
</head>
<body>
    <div class="container">
    <?php
        //PEGA ID
        $id = $_GET["cod_liv"];

        // QUERY

        $sql = " DELETE FROM TB_LIVRO WHERE cod_liv = ". $id;

        //EXECUTAR

        mysqli_query($banco, $sql);

        if(mysqli_affected_rows($banco) == 1){
            echo 
                "
                    <script>
                        alert('Deletado com Sucesso !!!');
                        location.href='lista_livro.php';                  
                    </script>
                ";
        }
    ?>
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
</html>