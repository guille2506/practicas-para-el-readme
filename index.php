<?php
session_start();
include('./backend/config/conexion.php');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    $stmt = $conn->prepare("SELECT id, contrasena, estado FROM admin WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $contrasena_db, $estado);
        $stmt->fetch();

        if ($estado == 0) {
            $error = "Tu cuenta está deshabilitada. Contacta al administrador.";
        } elseif ($contrasena === $contrasena_db) {

            $_SESSION['admin'] = $id;
            header("Location: panel.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en" class="h-100">
<!-- Mirrored from techzaa.in/venton/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jun 2025 20:43:18 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>gimnasio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="assets/js/config.js"></script>
</head>

<body class="h-100 bg-auth">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100 justify-content-center">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-6 py-lg-5">
                                   <div class="card mb-0 p-4 d-flex flex-column justify-content-center">
                                        <div class="auth-logo mb-4">
                                             <a href="" class="logo-dark">
                                                  <img src="assets/images/logo-dark.png" height="24" alt="logo dark">
                                             </a>

                                             <a href="" class="logo-light">
                                                  <img src="assets/images/logo-light.png" height="24" alt="logo light">
                                             </a>
                                        </div>

                                        <h2 class="fw-bold fs-24">Hola! Admin</h2>

                                        <p class="text-muted mt-1 mb-4">ingrese su usuario y contraseña para acceder</p>

                                        <div class="mb-3">
                                             <form action="index.php" class="authentication-form" method="POST">
                                                  <div class="mb-3">
                                                       <label class="form-label visually-hidden"
                                                            for="example-password">Password</label>
                                                       <input type="text" name="usuario" class="form-control"
                                                            placeholder="ingrese usuario" required>
                                                  </div>
                                                  <div class="mb-3">
                                                       <label class="form-label visually-hidden"
                                                            for="example-password">Password</label>
                                                       <input type="password" name="contrasena" class="form-control"
                                                            placeholder="ingrese contraseña" required>
                                                  </div>
                                                  <div class="mb-1 text-center d-grid">
                                                       <button class="btn btn-primary" type="submit">Ingresar</button>
                                                  </div>
                                                  <p style="color:red;"><?= $error ?></p>
                                             </form>
                                        </div>

                                        <p class="text-muted text-center mb-0">
                                             <!-- Not you? return -->
                                             <!-- <a href="auth-signup.html" class="text-dark fw-bold ms-1">Sign Up</a> -->
                                        </p>

                                   </div>
                              </div>
                         </div>

                    </div>
               </div>
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from techzaa.in/venton/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Jun 2025 20:43:18 GMT -->

</html>