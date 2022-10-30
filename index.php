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
    <title>Login</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center mt-100">
    <form action="logic/loguear.php" method="post">
        <center>
            <div class="" style="width: 300px; margin-top: 250px; border-style: solid; border-radius: 15px; border-width: 2px">
                <div class="container" style="padding: 15px">
                    <div class="mb-3" style="">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario"
                               aria-describedby="emailHelp">
                        <div id="usuario" class="form-text">No compartas este usuario con terceros</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="clave" class="form-control" id="usuario">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </center>
    </form>
</div>
</body>
</html>