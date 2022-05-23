<?php
$mensaje = '';

include("conexion.php");

if (isset($_POST['registrar'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $comentario = $_POST['comentario'];
    $insertar = "INSERT INTO clientes(nombres, apellidos, correo, celular, comentario) VALUES ('$nombres', '$apellidos', '$correo', '$celular', '$comentario')";
    $resultado = mysqli_query($conex, $insertar);
    if ($resultado) {
      $mensaje = 'correcto';
    } else {
      $mensaje = 'incorrecto';
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>

    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-naira-sign"></i>
        </div>
        <nav>
            <div class="hamb">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-list">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="#">Sobre mi</a></li>
                <li><a href="cursos.html">Cursos</a></li>
                <li><a href="ubicacion.html">Ubicación</a></li>
                <li class="btn"><a href="registrar.php">Registrarme</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="content">
        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Registrarme</h3>
                <form method="POST">
                    <p>
                        <label>Nombre(s)</label>
                        <input type="text" name="nombres" id="nombres" required>
                    </p>
                    <p>
                        <label>Apellido(s)</label>
                        <input type="text" name="apellidos" id="apellidos" required>
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" name="correo" id="correo" required>
                    </p>
                    <p>
                        <label>Celular</label>
                        <input type="text" name="celular" id="celular" required>
                    </p>
                    <p class="block">
                       <label>Comentarios respecto al sitio web</label> 
                        <textarea name="comentario" id="comentario" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <button id='registrar' name='registrar' value='registrar' type='submit'>
                            Registrarme
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>Más información</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Universidad Tecnologica de Durango</li>
                    <li><i class="fas fa-phone"></i> (618) 261 99 14</li>
                    <li><i class="fa-regular fa-envelope"></i> neftalirc14@gmail.com</li>
                </ul>
                <p>Al completar tu registro nos pondremos en contacto contigo dentro de las proximas 24 horas.</p>
                <p>¡Bienvenido!</p>
            </div>
        </div>
        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcKeTMfAAAAAAh_h9wi0ppjaoAPqVQ1jFr9JDKh"></script>
        <script>
        grecaptcha.enterprise.ready(function() {
            grecaptcha.enterprise.execute('6LcKeTMfAAAAAAh_h9wi0ppjaoAPqVQ1jFr9JDKh', {action: 'login'}).then(function(token) {
               ...
            });
        });
        </script>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

</body>

<?php
if ($mensaje == 'correcto') { ?>
  <script>
    function alerta() {
      swal({
        title: "Registrado existosamente",
        text: "Continuar",
        icon: "success",
      }).then(function() {
        window.location = "ubicacion.html";
      });
    }
    alerta();
  </script>
<?php } else if ($mensaje == 'incorrecto') { ?>
  <script>
    function alerta() {
      swal({
        title: "Ocurrio un error",
        text: "Intente de nuevo, por favor",
        icon: "error",
        button: "Ok",
      }).then(function() {
        window.location = "#";
      });
    }
    alerta();
  </script>
<?php
}
?>

</html>