<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./meuCss/myStyle2.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Pesquisar Ocorrência</title>
    <style>
        .n-like {
            margin-right: 10px;
            font-size: 20px;
        }
        .area-do-post form .op-post {
            display: flex;
            flex-direction: row;
        }
        .btn{
            width: 150px;
        }
        .navbar{
            width: 1000px;
        }
    </style>
</head>

<body>
    <?php

    $pequisa = $_POST['busca'] ?? '';

    include "conexao.php";
    $sql = "SELECT publicacaoagente.datahora, publicacaoagente.id,bairro.nomeBairro, rua.nome, publicacaoagente.nivel, publicacaoagente.publicacao from bairro,rua,publicacaoagente  where bairro.id = publicacaoagente.id_bairro and rua.id = publicacaoagente.id_rua and bairro.nomeBairro like '%$pequisa%' order by publicacaoagente.id desc";
    $dados = mysqli_query($conn, $sql);
    ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light bg-light col-6">
                    <div class="container-fluid ">
                        <form class="d-flex" action="" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Bairro" aria-label="Search" name="busca">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                        <a href="login.php" class="btn btn-primary"> ENTRAR </a>
                    </div>
                </nav>
                <div class="dashbord">
                    <div class="dash-item">
                        <div class="dash-info">
                        <h3>Asssalto</h3>
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 1";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="dash-info">
                            <h3>Furto</h3>
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 2";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="dash-info">
                            <h3>Tentativa de Asssalto</h3>
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 3";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                        
                    </div>
                    <div class="dash-item">
                        <div class="dash-info">
                            <h3>Suspeitos</h3>
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 4";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="area-ocorrencia">
                    <div class="area1">
                        <div class="area1-area">
                            <div class="cabecacho-user">
                                <img src="img/im1.png" alt="">
                                <div class="user-name">Usuario logado</div>
                            </div>
                            <div class="user-opcoes">
                                <div class="opcoes-icon">
                                    <i class="fa-solid fa-house"></i>
                                    <div class="icon-titulo">
                                        <a href="">Home</a>
                                    </div>
                                </div>
                                <div class="opcoes-icon">
                                    <i class="fa-solid fa-plus"></i>
                                    <div class="icon-titulo">
                                        <a href="">Ocorrência</a>
                                    </div>
                                </div>
                                <div class="opcoes-icon">
                                    <i class="fa-brands fa-rocketchat"></i>
                                    <div class="icon-titulo">
                                        <a href="">Chat</a>
                                    </div>
                                </div>
                                <div class="opcoes-icon">
                                    <i class="fa-solid fa-rectangle-xmark"></i>
                                    <div class="icon-titulo">
                                        <a href="">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area2">
                        <?php

                        while ($pub = mysqli_fetch_assoc($dados)) {
                            /*$qtdLike = 0;
                            if (isset($_POST['like'])) {
                                $qtdLike++;
                            }
                            if( isset( $_POST['mes'] ) ) {
                                $mes = 0 + $_POST['mes'];
                             } else {
                                $mes = 0 + date('m');
                             }*/

                            $id = $pub['id'];
                            $bairro = $pub['nomeBairro'];
                            $rua = $pub['nome'];
                            $nivel = $pub['nivel'];
                            $publicacao = $pub['publicacao'];
                            $datahora = $pub['datahora'];

                            if ($nivel == 1) {
                                $nivel  = "<div class='nivel' style='background: green'> </div>";
                            } else if ($nivel == 2) {
                                $nivel  = "<div class='nivel' style='background: yellow'> </div>";
                            } else {
                                $nivel  = "<div class='nivel' style='background: red'> </div>";
                            }

                            echo "<div class='ocorrencia'>
                                            <div class='cab-oc'>
                                                <h3> $bairro, $rua <br> <font size='4px'>$datahora</font> </h3>
                                                   $nivel
                                                   
                                            </div>
                                            
                                            <div class='corpo-oc'>$publicacao</div>
                                            <div class='area-do-post'>
                                               
                                                <div class='op-post'>
                                                    <form method='POST'> 
                                                        <span class='n-like'></span>
                                                        <button name='like'><i class= 'fa-solid fa-thumbs-up'></i></button>
                                                    </form>
                                                    <span>Curti</span>
                                                </div>
                                                <div class='op-post'>
                                                <i class= 'fa-solid fa-message'></i>
                                                    <span>Comentar </span>
                                                </div>
                                                <div class='op-post'>
                                                <i class='fa-solid fa-file-import'></i>
                                                    <span>Compartilhar </span>
                                                </div>
                                              
                                            </div>
                                      </div>";
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>

        <button class="qualquer">Clica aqui</button>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/like.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>