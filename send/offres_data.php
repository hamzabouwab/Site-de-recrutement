<?php
include 'sql.php';
// Get form data
$recruteur = $_POST['recruteur'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$nombre_poste = $_POST['nbr_poste']; // Corrected the name to 'nbr_poste'
$grade = $_POST['grade'];
$specialite = $_POST['specialite'];
    // Construct the SQL query
    $sql = "INSERT INTO offres (recruteur, date_debut, date_fin, nombre_poste, grade, specialite) VALUES ( ? , ? , ? , ? , ? , ?)";
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    // Bind parameters to the statement
    $stmt->bind_param("sssiss", $recruteur, $date_debut, $date_fin, $nombre_poste, $grade, $specialite);
    // Execute the statement
    if ($stmt->execute()) {
        echo '<h3>Offre Ajoutée avec succés</h3>';
        header("refresh:5;url=../offres.php");
    } else {
        header("refresh:5;url=../offres.php");
        echo '<h3>Erreur d\'ajout d\'une nouvelle offre </h3>';
    }
    // Close the statement
    $stmt->close();
$conn->close();
?>
