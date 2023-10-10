<?php
include 'ado.php';
// Get form data
$grade=str_replace("é","É",strtoupper($_POST['grade']));
$grade=str_replace("è","È",strtoupper($_POST['grade']));
$recruteur=str_replace("é","É",strtoupper($_POST['recruteur']));
$recruteur=str_replace("è","È",strtoupper($_POST['recruteur']));
$specialite=str_replace("é","É",strtoupper($_POST['specialite']));
$specialite=str_replace("è","È",strtoupper($_POST['specialite']));
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$nombre_poste = $_POST['nbr_poste']; // Corrected the name to 'nbr_poste'

    // Construct the SQL query
    $sql = "INSERT INTO offres (recruteur, date_debut, date_fin, nombre_poste, grade, specialite) VALUES ( ? , ? , ? , ? , ? , ?)";
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    // Bind parameters to the statement
    $stmt->bind_param("sssiss", $recruteur, $date_debut, $date_fin, $nombre_poste, $grade, $specialite);
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
          Offre ajoutée avec succés !
         </div>
          <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>';
        header("refresh:5;url=../offres.php");
    } else {
        header("refresh:5;url=../offres.php");
        echo '<h3>Erreur d\'ajout d\'une nouvelle offre </h3>';
    }
    // Close the statement
    $stmt->close();
$conn->close();
?>
