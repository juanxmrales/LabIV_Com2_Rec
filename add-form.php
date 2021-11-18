<?php

     session_start();

     require_once "Config/Autoload.php";

     use Model\Desk as Desk;
     use Repository\DeskRepository as DeskRepository;

     use Model\Establishment as Establishment;
     use Repository\EstablishmentRepository as EstablishmentRepository;

     if(!isset($_SESSION['user']))
     {
          header("location:index.php");
     }

     require_once('header.php');
     require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="add-form-controller.php" method="GET">
               <div class="container">
                    <h3 class="mb-3">Agregar ciudadanos</h3>
                    
                    <div class="mb-3">
                         <label for="">ID</label>
                         <input type="number" name="citizenId" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">Nombre</label>
                         <input type="text" name="firstName" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">Apellido</label>
                         <input type="text" name="lastName" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">Email</label>
                         <input type="email" name="email" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">DNI</label>
                         <input type="number" name="dni" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">Fecha de nacimiento</label>
                         <input type="date" name="birthdate" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3">
                         <label for="">Dirección</label>
                         <input type="text" name="address" class="form-control form-control-ml" required>
                    </div>

                    <div class="mb-3" >
                         <label for="">Mesa de votación</label>

                         <div class="form-group">
                              <select name="deskId" class="custom-select" required>
                              <?php
                                        $repoDesk = new DeskRepository();
                                        $desk = $repoDesk->GetAll();

                                        $repoEstablishment = new EstablishmentRepository();
                                        $establishment = $repoEstablishment->GetAll();

                                        foreach($desk as $de)
                                        {  
                                             foreach($establishment as $es)
                                             {                                         
                                                  if($de->getActive())
                                                  {
                                                       ?>
                                                            <option value= <?php  echo $de->getDeskNumber(); ?> > <?php  echo $es->searchNameById($de->getId()) ; ?> </option>

                                                       <?php
                                                  }
                                             } 
                                        }

                                   ?>
                              </select>
                         </div>
                    </div>

                    <div class="mb-3">
                         <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                    </div>
               </div>
          </form>
     </section>
</main>

<?php require_once('footer.php'); ?>
