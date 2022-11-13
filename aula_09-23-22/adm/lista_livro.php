<?php
// caminho do servidor
include_once("../servidor.php");

extract($_POST);


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
        <section class="col-md-2">
        </section>
        <section class="col-md-8">
            <h3 class="mt-5">Lista de Livros</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Editar / DELETAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Query
                        $sql = " SELECT cod_liv, titulo_liv, valor_liv, img_liv FROM TB_LIVRO ";

                        // EXECUTAR
                        $resposta = mysqli_query($banco, $sql);

                        

                        // EXIBIR OS REGISTRO
                        //TABELA ["nome_coluna"] ; tabela[indece];
                        while($tabela = mysqli_fetch_array($resposta)){
                        // FAZER A FORMATAÇÃO DA LINHA DA TABELA
                        echo
                        
                                "
                                    <tr>
                                        <th scope='row'>".$tabela["cod_liv"]."</th>
                                        <td scope='row'>".$tabela["titulo_liv"]."</td>
                                        <td scope='row'><img src='".$tabela["img_liv"]."'></td>                                      
                                        <td scope='row'>".number_format($tabela["valor_liv"],2,",",".")."</td>
                                        <td scope='row'>
                                            <button type='button' class='btn btn-primary'>
                                                <a  href='altlivro.php?cod_liv=".$tabela["cod_liv"]."'>
                                                    <img src='img/lapis.svg' width=32 title='editar'>
                                                </a>
                                            </button>
                                            <button type='button' class='btn btn-danger'>
                                                <a class='text-white' href='delLivro.php?cod_liv=".$tabela["cod_liv"]."'>
                                                    <img src='img/lixo.svg' width=32 title='deletar'>
                                                </a>
                                            </button>
                                        </td>                                        
                                    </tr>
                                ";
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="col-md-2"></section>
    </div>
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>