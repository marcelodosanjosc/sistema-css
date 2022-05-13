<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Vigilante</title>
</head>
<?php
include "conexao.php";

$sqlBairro = "SELECT * FROM bairro";
$sqlRua = "SELECT * FROM rua ";
$sqlTipo = "SELECT * FROM situacao";

$dados = mysqli_query($conn, $sqlBairro);
$dados2 = mysqli_query($conn, $sqlRua);
$dados3 = mysqli_query($conn, $sqlTipo);
?>

<body>

    <div class="container">
        <div class="row-9">
            <div class="col-9">
                <h1>Ocorrência</h1>
                <form action="cadastro_ocorrencia.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="">Bairros</label><br>
                        <select class="custom-select form-select" id="sl_bairros" name='cmbairros'>
                            <option selected disabled>Selecione..</option>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $idBairro = $linha['id'];
                                $nome = $linha['nomeBairro'];
                                echo "<option value='$idBairro'> $nome </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Ruas</label><br>
                        <select class="custom-select form-select" id="sl_ruas" name='cmrua'>
                            <option selected disabled>Selecione..</option>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados2)) {
                                $nome = $linha['nome'];
                                echo "<option  value='" . $linha['id_bairro'] . "' data-bairro='" . $linha['id_bairro'] . "'> $nome </option>";
                            }
                            ?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tipo de Ocorrencia</label><br>
                        <select class="custom-select form-select" id="sl_ocorrencias" name='cmocorrencia'>
                            <option selected disabled>Selecione..</option>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['tipo'];
                                echo "<option  value='" . $linha['id'] . "'> $nome </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="ball">
                        <div data-key="1" name="verde" class="item"></div>
                        <div data-key="2" name="amarelo" class="item"></div>
                        <div data-key="3" name="vermelho" class="item"></div>
                        <select class="form-select form-select-sm " aria-label=".form-select-sm example" name="nivel" require>
                            <option selected disabled>Nível de Ocorrência</option>
                            <option value="1">Verde (Seguro)</option>
                            <option value="2">Amarelo (Alerta)</option>
                            <option value="3">Vermelho (Perigo)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Publicacão</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="publicacao" require></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-success" type="submit">Salvar</button>
                        <a href="index.php" class="btn btn-primary"> Ocorrencias </a>

                    </div>
                </form>
                <form action="sair.php">
                    <button class="btn btn-primary"> SAIR </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sl_ruas option").hide();
            $("#sl_bairros").change(function() {
                var id_bairro = $(this).val();
                $("#sl_ruas option").hide();
                $("#sl_ruas option[data-bairro='" + id_bairro + "']").show();
            })
        })
    </script>
</body>

</html>