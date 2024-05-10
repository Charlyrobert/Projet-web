<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "rencontre_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données de l'utilisateur à partir de la base de données
$sql = "SELECT * FROM utilisateurs WHERE id = ?"; // Remplacer ? par l'ID de l'utilisateur connecté
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$user_id = /* ID de l'utilisateur connecté */;
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Afficher les données du profil
if ($row) {
    echo "Pseudo: " . $row['pseudo'] . "<br>";
    echo "Sexe: " . $row['sexe'] . "<br>";
    // Afficher d'autres informations du profil
} else {
    echo "Profil non trouvé.";
}

// Fermer la connexion
$conn->close();
?>




