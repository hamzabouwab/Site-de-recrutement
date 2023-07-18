<?php
session_start();
if(isset($_SESSION["name"])){
   if(!defined('My site')){
      header("location:index.php");
      die();
   }
}
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
          <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
             aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
             <ul class="navbar-nav me-auto mt-lg-0 mx-auto text-center">
                <span class="stick-animation d-none d-md-block"></span>
                <hr class="border-light">
                <li class="nav-item">
                   <a class="nav-link active" href="index.php" >Accueil</a>
                  </li>
                  <hr class="border-light">
                  <li class="nav-item">
                     <a class="nav-link px-3" href="index.php#offres">Offres</a>
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
            </div>
      </div>
    </nav>
  </header>
  <main>
      <section>
         <form action="send/login.php" method="post" class="fw-bolder" >
            <div class="container d-flex justify-content-center align-items-center flex-column py-5" style="min-height: calc(100vh - 90px);">
               <div class="col-12 col-sm-8 col-md-6  mx-auto p-5 bg-white shadow-lg rounded-3">

                  <div class="mb-3">
                     <label for="" class="form-label">Email</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com" required>


                  </div>
                  <div class="mb-3">
                     <label for="" class="form-label">Password</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder="*******" required minlength="8" maxlength="20">
                  </div>
                  <button type="submit" class="btn btn-dark rounded-pill" id="submit">Se connecter</button>
               </div>
            </div>
         </form>
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
  <script src="script/script.js"></script>
  <script src="script/connection.js"></script>
</body>

</html>