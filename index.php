<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />


    <title>Inicio de Sesión</title>

</head>

<body>
    <div class="container">
        <!-- Content here -->
        <br>
        
        <br>
        <form id="formlogin" class="form" action="modules/login/loginController.php" method="post">
            <h1>Inicio de Sesión</h1>
            <div class="mb-3">
                <label for="user" class="form-label" >Usuario</label>
                <input type="text" class="form-control" id="user" name="user" aria-describedby="userAyuda">
                <div id="userAyuda" class="form-text">Ingrese su nombre de usuario</div>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Password</label>
                <input type="password" class="form-control" id="clave" name="clave" aria-describedby="claveAyuda">
                <div id="claveAyuda" class="form-text">Ingrese su clave</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Ingresar al Sistema</button>

            <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                </div>
        </form>
    </div>
    <!-- JS DE BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>