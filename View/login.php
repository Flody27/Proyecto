<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CONVENIO MARCO - Inicio de Sesión</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <section class="h-100" style="background:#155db1;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card border-0 text-black" style="border-radius: 1rem; background: #f3c332">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
                
                <form action="../Controller/Login-Controller.php" method="POST">
                <img src="../logo.png" alt="logo" style="height: 100px; margin-bottom: 20px;">
                <h1 class="fw-bold mb-2 text-uppercase" style="padding-bottom: 15px;">Convenio Marco</h1>
                  <h3 class="fw-bold mb-2 text-uppercase" style="padding-bottom: 15px;">Inicio de Sesión</h3>
                  <div class="form-outline form-black mb-4">
                    <input type="text" autocomplete="off" id="username" name="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Nombre de Usuario</label>
                  </div>

                  <div class="form-outline form-black mb-4">
                    <input type="password" name="password" id="contrasena" class="form-control form-control-lg" />
                    <label class="form-label" for="contrasena">Contraseña</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="password-change.php">Olvidé mi contraseña.</a></p>

                  <button class="btn btn-outline-dark btn-md px-5" name="login-btn" type="submit">Ingresar</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../js/simple-sidebar.js"></script>

</body>

</html>