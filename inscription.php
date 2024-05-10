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

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['dob'];
    $profession = $_POST['profession'];
    $lieu_residence = $_POST['pays'] . ", " . $_POST['region'] . ", " . $_POST['departement'];
    $situation_amoureuse = $_POST['situation_amoureuse'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $bio = $_POST['bio'];
    $centres_interets = $_POST['centres_interets'];

    // Requête d'insertion des données dans la base de données
    $sql = "INSERT INTO utilisateurs (pseudo, mot_de_passe, sexe, date_naissance, profession, lieu_residence, situation_amoureuse, taille, poids, bio, centres_interets)
    VALUES ('$pseudo', '$mot_de_passe', '$sexe', '$date_naissance', '$profession', '$lieu_residence', '$situation_amoureuse', '$taille', '$poids', '$bio', '$centres_interets')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>

