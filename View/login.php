<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CONVENIO MARCO - Inicio de Sesión</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card border-0 text-white" style="border-radius: 1rem; background: rgba(22,97,97,1.0) ">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
                <form action="../Controller/Login-Controller.php" method="POST">
                  <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>
                  <div class="form-outline form-white mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Nombre de Usuario</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="contrasena" class="form-control form-control-lg" />
                    <label class="form-label" for="contrasena">Contraseña</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Olvidé mi contraseña.</a></p>

                  <button class="btn btn-outline-light btn-lg px-5" name="login-btn" type="submit">Ingresar</button>
                </form>
              </div>

              <div>
                <p class="mb-0">¿No cuenta con acceso? <a href="sing-up.php" class="text-white-50 fw-bold">Registrarse.</a>
                </p>
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