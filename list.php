<?php

     session_start();

     require_once "Config/Autoload.php";

     use Model\Desk as Desk;
     use Repository\DeskRepository as DeskRepository;

     use Model\Citizen as Citizen;
     use Repository\CitizenRepository;

     use Model\Establishment as Establishment;     
     use Repository\EstablishmentRepository as EstablishmentRepository;

     $repoDesk = new DeskRepository();
     $listDesk = $repoDesk->getAll();
     $repoCitizen = new CitizenRepository();
     $listCitizen = $repoCitizen->getAll();
     $repoEstablishment = new EstablishmentRepository();
     $listEstablishment = $repoEstablishment->getAll();

     if(!isset($_SESSION["user"])){

          header("location:index.php");
     }

     require_once('header.php');
     require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de mesas de votación</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>ID</th>
                         <th>Número</th>
                         <th>Presidente</th>
                         <th>Establecimiento</th>
                    </thead>
                    <tbody>
                         <?php foreach($listDesk as $desk){ ?>
                                   <tr>
                                        <th><?php echo $desk->getDeskId(); ?></th>
                                        <th><?php echo $desk->getDeskNumber(); ?></th>
                                        <th><?php echo $repoCitizen->searchNameById($desk->getPresidentId()); ?></th>
                                        <th><?php echo $repoEstablishment->searchNameById($desk->getDeskId()); ?></th>
                                   </tr>   
                              <?php } ?>                       
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php require_once('footer.php'); ?>
