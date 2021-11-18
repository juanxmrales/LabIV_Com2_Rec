<?   
     session_start();

     require_once "Config/Autoload.php";

     use Model\Desk as Desk;
     use Repository\DeskRepository as DeskRepository;

     use Model\Establishment as Establishment;
     use Repository\EstablishmentRepository as EstablishmentRepository;

     include('header.php');

     if(isset($_SESSION['user'])){

          header("location:add-form.php");
     }

     if(isset($_GET['error'])){

          $message = $_GET['error'] == 'wrongUser' ? "Usuario Invalido" : "Contraseña Invalida";
          $message;
     }else
     {
          $message= "Inicie Sesion por favor :)";
     }
?>

<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Recuperatorio 2021</h2>
               <span style="color: red"><?php echo $message; ?></span>
          </header>

          <form action="login-controller.php" method="post" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Ingresar usuario">
               </div>
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
          </form>
     </div>
</main>

<?php require_once('footer.php'); ?>
