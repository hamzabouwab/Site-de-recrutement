<?php
session_start();
define('My site',true);
?>
<!doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark py-4">
         <div class="container d-flex align-items-center">
         <a class="navbar-brand fw-bolder " href="index.php"><i class="fa-sharp fa-solid fa-briefcase fa-2xl"></i></a>
          <button class="navbar-toggler d-lg-none " type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
             aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-custom-icon" style="--i:-1"></span>
             <span class="navbar-toggler-custom-icon" style="--i:0"></span>
             <span class="navbar-toggler-custom-icon" style="--i:1"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
             <ul class="navbar-nav mt-lg-0 me-auto text-center  ps-md-5">
                <span class="stick-animation d-none d-md-block"></span>
                <hr class="border-light">
                <li class="nav-item">
                   <a class="nav-link active" href="index.php" >Accueil</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="index.php#offres">Concours</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="index.php#a_propos">A propos</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="index.php#contact">Contact</a>
                  </li>
             </ul>
             <?php
            if(!isset($_SESSION["name"])){

                  echo '
                  <hr class="border-light">

                        <div class=" ms-auto d-none d-lg-flex">
                           <a href="connection.php" class="btn btn-outline-light rounded-1 py-1 border border-2">Se connecter</a>
                        </div>';
            }else{
               echo '
               <div class="d-none d-lg-flex ms-auto">
                  <form action="send/destruct.php" method="post" class="d-flex gap-3">
                     <p class="text-light h-100 d-flex align-items-center" >user : '.$_SESSION["name"].'</p>
                     <button type="submit" name="destruct" id="destruct" class="position-relative btn btn-outline-light rounded-circle border border-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="text-dark fw-bold bg-light p-2 rounded-3" id="deconnection">Déconnexion</span>
                     </button>
                  </form>
               </div>';
            }
            ?>
            <?php
            if(!isset($_SESSION["name"])){

                  echo '
                   
                  <div class="d-flex d-lg-none ">
                     <a href="connection.php" class="btn btn-outline-light rounded-2 border border-2 mx-auto">Se connecter</a>
                  </div>';
            }else{
                  echo '
                  <hr class="border-light">
                  <div class="d-flex d-lg-none ">
                     <form action="send/destruct.php" method="post" class="d-flex gap-3 mx-auto">
                        <p class="text-light h-100 d-flex align-items-center" >user : '.$_SESSION["name"].'</p>
                        <button type="submit" name="destruct" class="btn btn-outline-light rounded-circle border border-2 border-light">
                           <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                     </form>
                  </div>';
            }
            ?>
            </div>
      </div>
    </nav>
  </header>
  <main>
  <section>
         <form action="send/postuler_send.php" method="post" class="fw-bolder" enctype="multipart/form-data">
            <div class="container d-flex justify-content-center align-items-center flex-column py-5" style="min-height: calc(100vh - 90px);">
               <div class="col-12 col-sm-8 col-md-6  mx-auto p-5 bg-white shadow-lg rounded-3">
               <div class="mb-5">
                     <label for="ref"  class="form-label">Réference du concours</label>
                     <input type="text" class="custom-input shadow border-secondary fw-bold text-uppercase " id="ref" name="ref" value="<?php echo $_SESSION['reference']; ?>" readonly>
                  </div>
                  <hr class="col-10 mx-auto">
                  <div class="mb-3">
                     <label for="nom_complet" class="form-label">Nom complet</label>
                     <input type="text" class="custom-input" id="nom_complet"  name="nom_complet" required>
                  </div>
                  <hr class="col-3 mx-auto">
                  <div class="mb-3">
                     <label for="cin" class="form-label">Carte d'identite nationale</label>
                     <input type="text" class="custom-input" id="cin" name="cin"  minlength="8" maxlength="8" required>
                  </div>
                  <hr class="col-3 mx-auto">
                  <div class="mb-3">
                     <label for="date_naiss"  class="form-label">Date de naissance</label>
                     <input type="date" class="custom-input" id="date_naiss"  name="date_naiss" required>
                  </div>
                  
                  <hr class="col-10 mx-auto">
                  <button type="submit" class="btn btn-dark rounded-pill px-5 w-100 py-2" id="Postuler">Postuler</button>
               </div>
            </div>
         </form>
         <div id="warning" class="mt-3"></div> <!-- Container to show warning messages -->
      </section>
  </main>
  <footer>
    <!-- place footer here -->

  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script type="module" src="./script/script.js"></script>
</body>


</html>