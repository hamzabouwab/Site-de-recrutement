<?php
session_start();
$_SESSION["validation"]="needs-validation";
$_SESSION["email_feedback"]="";
$_SESSION["password_feedback"]="";

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
         <div class="container d-flex align-items-center">
          <a class="navbar-brand fw-bolder " href="index.php"><i class="fa-sharp fa-solid fa-briefcase fa-2xl"></i></a>
          <button class="navbar-toggler d-lg-none " type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
             aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-custom-icon" style="--i:-1"></span>
             <span class="navbar-toggler-custom-icon" style="--i:0"></span>
             <span class="navbar-toggler-custom-icon" style="--i:1"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
             <ul class="navbar-nav mt-lg-0 me-auto text-center ps-lg-5">
                <span class="stick-animation d-none d-lg-block"></span>
                <hr class="border-light">
                <li class="nav-item">
                   <a class="nav-link active" href="index.php" >Accueil</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="#offres">Offres</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="#a_propos">A propos</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="#contact">Contact</a>
                  </li>
                  <?php
                  if(isset($_SESSION["name"])){
                     
                     echo '<hr class="border-light"><li class="nav-item">
                     <a class="nav-link px-3" href="offres.php">Ajouter une offre</a>
                  </li>';
                  }
                  ?>
             </ul>
            <?php
            if(!isset($_SESSION["name"])){

                  echo '
                  <hr class="border-light">

                        <div class=" ms-auto d-none d-lg-flex">
                           <a href="connection.php" class="btn btn-outline-light rounded-pill border border-2">Se connecter</a>
                        </div>';
            }else{
               echo '<div class="d-none d-lg-flex ms-auto">
               <form action="send/destruct.php" method="post" class="d-flex gap-3">
                           <p class="text-light h-100 d-flex align-items-center" >user : '.$_SESSION["name"].'</p>
                           <button type="submit" name="destruct" id="destruct" class="position-relative btn btn-outline-light rounded-circle border border-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom" ><i class="fa-solid fa-right-from-bracket"></i><span class="text-dark fw-bold bg-light p-2 rounded-3" id="deconnection">Deconnection</span></button>
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
                              <button type="submit" name="destruct" class="btn btn-outline-light rounded-circle border border-2"><i class="fa-solid fa-right-from-bracket"></i></button>
                              </form>
                              </div>';
            }
            ?>
            </div>
      </div>
    </nav>
  </header>
  <main>
      <section class="hero bg-light">
         <div class="container d-flex justify-content-center align-items-center flex-column" style="min-height:70vh;">
            <h1 class="fade-in-left">
TRAVAIL TEMPORAIRE ET RECRUTEMENT</h1>
            <p class="mb-4 fade-in-right" style="font-size:18px;font-weight: 600;">Vous êtes à la recherche d'un emploi ? Vous êtes au bon endroit.</p>
            <a class="rounded" href="#offres">Nos offres !</a>
         </div>
      </section>
      <section class="offres bg-white py-5 bg- text-center" id="offres">
            <div class="container py-5">
               <div class="mb-5">
                  <h1 class="fw-bolder text-dark">LES OFFRES DISPONIBLES</h1>

               </div>

                  <div class="cards position-relative text-dark" style="min-height:50vh">
                     <?php
                        include 'send/ado.php';
                        $conn=mysqli_connect($server,$username,$password,$database);
                        if($conn->connect_error){
                           die("connection failed".$conn->connect_error);
                        }else{
                           $sql="select id,recruteur,date_debut,date_fin,nombre_poste,grade,specialite from offres";
                           $result=$conn->query($sql);
                           if($result->num_rows==0){
                              echo '<h2 class="text-center w-100" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">Pas d\'offres pour le moment !</h2>';
                           }else{
                              
                              while($row=$result->fetch_assoc()){
                                 $btn='';
                                 if(!isset($_SESSION["name"])){

                                 $btn='<div class="mt-auto ">
                                 <button type="submit" class="btn btn-dark rounded-pill fw-bold col-12">Postuler</button>
                                 </div>';
                              }
                                    echo '
                                    
                                    <div class=" px-3 px-md-4 py-4 bg-light shadow shadow  text-start " >
                                    <form method="post" action="send/redirect_postuler.php" class="h-100 d-flex flex-column"  >
                                    
                                    
                                    <div class="mb-3">
                                       <p  class="form-label text-decoration-underline">Réference :</p>
                                       <p  class="lead fw-bold">'.$row['id'].'</p>
                                       <input type="hidden" name="id" id="id" value="'.$row['id'].'">
                                       </div>

                                       <div class="mb-3">
                                       <p class="form-label text-decoration-underline">Nom d\'établissement :</p>
                                       <p  class="lead fw-bold" id="recruteur" name="recruteur">'.$row['recruteur'].'</p>
                                       <input type="hidden" name="recruteur" id="recruteur" value="'.$row['recruteur'].'">
                                       </div>

                                       <div class="mb-3">
                                       <p class="form-label text-decoration-underline">Date de début de depôt de dossiers :</p>
                                       <p  class="lead fw-bold " id="date_debut" name="date_debut">'.$row['date_debut'].'</p>
                                       <input type="hidden" name="date_debut" id="date_debut" value="'.$row['date_debut'].'">
                                       </div>

                                       <div class="mb-3">
                                       <p class="form-label text-decoration-underline">Date de fin de depôt de dossiers :</p>
                                       <p  class="lead fw-bold " id="date_fin" name="date_fin">'.$row['date_fin'].'</p>
                                       <input type="hidden" name="date_fin" id="date_fin" value="'.$row['date_fin'].'">
                                       </div>

                                       <div class="mb-3">
                                       <p  class="form-label text-decoration-underline">Nombre de postes :</p>
                                       <p  class="lead fw-bold " id="nombre_poste" name="nombre_poste">'.$row['nombre_poste'].' poste(s)</p>
                                       <input type="hidden" name="nombre_poste" id="nombre_poste" value="'.$row['nombre_poste'].'">
                                       </div>

                                       <div class="mb-3">
                                       <p  class="form-label text-decoration-underline">Grade :</p>
                                       <p  class="lead fw-bold " id="grade" name="grade">'.$row['grade'].'</p>
                                       <input type="hidden" name="grade" id="grade" value="'.$row['grade'].'">
                                       </div>
                                       
                                       <div class="mb-3">
                                       <p  class="form-label  text-decoration-underline">Spécialité :</p>                                       
                                       <p  class="lead fw-bold"  name="specialite" id="specialite" >'.$row['specialite'].'</p>
                                       <input type="hidden" name="grade" id="grade" value="'.$row['specialite'].'">
                                    </div>
                                    '.$btn.
                                    '
                                    </form>
                                    </div>
                                    ';
                                 }
                              }
                           }
                     ?>
                     </div>
                  </div>
      </section>
      <section id="a_propos" class="bg-dark text-light">
         <div class="container p-5">
         <h2>À propos de nous :</h1>
            <ul>
               <li>Transparence : Nous croyons en l'honnêteté et la clarté dans toutes nos interactions. Chaque candidat mérite d'avoir une compréhension claire des offres d'emploi disponibles et des critères de sélection requis.</li>
               <li>Excellence : Nous nous efforçons continuellement d'offrir une expérience exceptionnelle à nos utilisateurs. Cela se reflète dans notre interface utilisateur conviviale, notre service client réactif et notre recherche constante de nouvelles opportunités d'emploi.</li>
               <li>Diversité et inclusion : Nous sommes fiers de promouvoir un environnement inclusif où les talents de tous horizons sont valorisés et célébrés. Nous encourageons la diversité des compétences, des expériences et des origines pour enrichir le monde professionnel.</li>
            </ul>
            <h2>Nos services :</h1>
            <ul >
               <li>Recherche d'emploi : Notre puissant moteur de recherche vous permet de trouver rapidement des offres d'emploi pertinentes en fonction de vos critères de recherche spécifiques. Nous vous proposons des filtres personnalisés pour vous aider à cibler les opportunités qui correspondent le mieux à vos ambitions professionnelles.</li>
               <li>Recrutement d'employeurs : Nous offrons aux employeurs la possibilité de publier leurs offres d'emploi, de parcourir des profils de candidats pertinents et de gérer leur processus de recrutement de manière efficace et centralisée.</li>
               <li>Conseils en carrière : Notre blog est une mine d'informations utiles sur la recherche d'emploi, les entretiens, le développement professionnel et bien plus encore. Nous sommes là pour vous accompagner à chaque étape de votre parcours professionnel.</li>
               <li>Confidentialité et sécurité : Nous attachons une grande importance à la confidentialité de vos données personnelles et nous nous engageons à les protéger conformément aux normes les plus strictes.</li>
            </ul>

            <p class="text-primary text-decoration-underline">Que vous soyez un candidat à la recherche de votre prochaine opportunité de carrière ou une entreprise à la recherche de talents exceptionnels, notre site de recrutement est là pour vous aider à atteindre vos objectifs. Rejoignez-nous dès aujourd'hui et ouvrez-vous à un monde d'opportunités professionnelles passionnantes !</p>
         </div>
      </section>
  </main>
  <footer class="text-center bg-dark text-light py-4" id="contact" style='--bs-bg-opacity:.9'>
    <!-- place footer here -->
    <div class="col-3 mx-auto">
      <ul class="social-media mb-0 d-flex justify-content-center p-0">
         <li><a target="_blank" href="https://web.facebook.com/redkay.hamza"><i class="fa fa-brands fa-facebook "></i></a></li>
         <li><a href="#" id="whatsapp"><i class="fa fa-brands fa-whatsapp"></i></a></li>
         <li><a target="_blank" href="https://www.instagram.com/hamzabouwab/"><i class="fa fa-brands fa-instagram"></i></a></li>
      </ul>
    </div>

  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script type="module" src="./script/index.js"></script>
  <script type="module" src="./script/script.js"></script>
  <script src="data.js"></script>
</body>

</html>