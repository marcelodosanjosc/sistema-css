<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./meuCss/myStyle.css" />

    <title>Login</title>
</head>

<body>
    <section class="container">
        <div class="container-area">
            <div class="item">
                <div class="bg-item">

                </div>
            </div>
            <div class="item">
                <form method="POST" action="login_vai.php">
                    <div class="form-icon">
                        <div class="form-icon-area">
                            <img src="img/im1.png" alt="icon" />
                        </div>
                    </div>
                    <div class="area-input">
                        <div class="icon-input">
                            <img src="img/user.png" alt="usuario img" />
                        </div>
                        <input type="text" name="login" placeholder="Digite seu usuário" class="usuario">
                    </div>
                    <div class="area-input">
                        <div class="icon-input">
                            <img src="img/pass.png" alt="usuario senha" />
                        </div>
                        <input type="password" name="senha" placeholder="Digite sua senha." class="senha">
                    </div>
                    <div class="area-input">
                        <a href="#">Esqueceu sua senha?</a>

                    </div>
                    <div class="botao">
                        <button>Acessar</button>
                        <button><a href="index.php"> HOME </a></button>
                    </div>
                    <div class="nova-conta">
                        <a href="">Cria nova conta</a>
                    </div>
                </form>
            </div> <!-- FIM ITEM DIREITA-->
        </div>
    </section>
</body>

</html>