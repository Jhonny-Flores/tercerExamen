<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
            crossorigin="anonymous"></script>

    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <title>Ingresos</title>

    <style>
        body {

        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            font-weight: bold;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Tiendona</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="principal.php">Producto</a>
                <a class="nav-link" href="#">Ingresos</a>
            </div>
        </div>
    </div>
</nav>

<section class="container">
    <div class="row my-5">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="empleados.html" method="POST" class="form-empleado">
                <h3 class="display-4">Detalle de ingresos</h3>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Producto que desea ingresar</label>
                            <select name="txtProductos" id="txtProductos" class="form-select">
                                <option value="0">Seleccione:</option>
                                <?php
                                $usuario = 'root';
                                $password = '031919';
                                $db = new PDO('mysql:host=localhost;dbname=dwusl_db', $usuario, $password);

                                $query = $db->prepare("SELECT * FROM producto");
                                $query->execute();
                                $data = $query->fetchAll();

                                foreach ($data as $valores):
                                    echo '<option value="'.$valores["codigo"].'">'.$valores["nombre"].'</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Encargado del ingreso de este producto</label>
                            <select name="txtUsuario" id="txtUsuario" class="form-select">
                                <option value="0">Seleccione:</option>
                                <?php
                                $usuario = 'root';
                                $password = '031919';
                                $db = new PDO('mysql:host=localhost;dbname=dwusl_db', $usuario, $password);

                                $query = $db->prepare("SELECT * FROM usuario");
                                $query->execute();
                                $data = $query->fetchAll();

                                foreach ($data as $valores):
                                    echo '<option value="'.$valores["idusuario"].'">'.$valores["usuario"].'</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tipo de documento</label>
                            <select class="form-select" name="txtTipoDocumento" id="txtTipoDocumento">
                                <option selected value="0">Seleccione:</option>
                                <option value="Factura">Factura</option>
                                <option value="Remisión">Remisión</option>
                                <option value="Recibo de caja">Recibo de caja</option>
                                <option value="Comprobante de pago">Comprobante de pago</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>No. de documento</label>
                            <input class="form-control" type="text" placeholder="Ingrese el número de documento" name="txtNoDoc" id="txtNoDoc" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Número de comprobante</label>
                            <input class="form-control" type="text" placeholder="Ingrese el número de comprobante" name="txtComprobante" id="txtComprobante" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Ingrese la fecha de ingreso del producto</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Total</label>
                            <input class="form-control" type="number" placeholder="Ingrese el total del ingreso" name="txtTotal" id="txtTotal" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Ingrese la descripción del ingreso</label>
                            <input type="text-area" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto"> <br>
                    <button type="submit" class="btn btn-success">Guardar registro</button>
                </div>
            </form>
        </div>
</section>
<footer class="blockquote-footer text-center">
    <address>
        <small class="font-weight-bold text-uppercase">
            &copy; Todos los derechos reservados
        </small>
    </address>
</footer>
</body>
</html>
