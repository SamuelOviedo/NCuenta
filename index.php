<?php

$cuenta = $_POST['NCuenta'];
$v1 = $_POST['v1'];
$p1 = $_POST['p1'];
$v2 = $_POST['v2'];
$p2 = $_POST['p2'];
$v3 = $_POST['v3'];
$p3 = $_POST['p3'];
$validar = 0;
$copy = 0;

if ($cuenta == "") {
    $validar = 1;
}

if (isset($_POST['BtnNC'])) {
    $op = 1;
} elseif (isset($_POST['BtnNAlc'])) {
    $op = 2;
}

switch ($op) {

    case 1:
        $resultado = str_replace($v1, $p1, $cuenta);
        $NuevoResultado = str_replace($v2, $p2, $resultado);
        $NuevoResultado2 = str_replace($v3, $p3, $NuevoResultado);
        break;

    case 2:
        $alreves = strrev($cuenta);
        $resultado = str_replace($v1, $p1, $alreves);
        $NuevoResultado = str_replace($v2, $p2, $resultado);
        $NuevoResultado2 = str_replace($v3, $p3, $NuevoResultado);
        break;

    default:
        break;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">¡Cambia tu número de cuenta al instante!</a>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <form action="index.php" method="post">
            <div class="row">
                <div class="input-group mb-3 p-4">
                    <span class="input-group-text">#</span>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="NCuenta" id="NCuenta">
                        <label for="floatingInputGroup1">Número de cuenta</label>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor:</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="v1" id="v1">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Por:</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="p1" id="p1">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor:</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="v2" id="v2">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Por:</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="p2" id="p2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Valor:</span>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="v3" id="v3">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Por:</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="p3" id="p3">
                    </div>
                </div>
            </div>

            <div class="mt-5 mx-auto" style="width: 200px;">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-dark" name="BtnNC" id="BtnNC">Generar N. Cuenta</button>
                    <button type="submit" class="btn btn-primary" name="BtnNAlc" id="BtnNAlc">Al reves</button>
                </div>
                <?php
                if ($validar != 0) {
                    echo "
            <div class='mt-5 badge bg-danger text-wrap' style='width: 10rem;'>
                Ingrese un número de cuenta
            </div>
            ";
                }
                ?>
            </div>
        </form>

        <div class="row mt-4">
            <div class="col">
                <p id="res">
                    <?php echo $NuevoResultado2 ?>
                </p>
                <button type="button" class="btn btn-dark" onclick="copiarAlPortapapeles('res')">Copiar</button>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        function copiarAlPortapapeles(id_elemento) {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);

            <?php
            if ($NuevoResultado2 != "") {
                echo "
            swal('Copiado!', 'Número de cuenta copiado al portapapeles!', 'success');
            ";
            }
            ?>
        }
    </script>
</body>

</html>