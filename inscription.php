<?php

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['dob'];
    $profession = $_POST['profession'];
    $lieu_residence = $_POST['pays'] . ", " . $_POST['region'] . ", " . $_POST['departement'];
    $situation = $_POST['situation_amoureuse'];
    $taille = $_POST['taille'];
    $bio = $_POST['bio'];

    // Formation de la chaîne de données utilisateur avec le format spécifié
    $userdata = "$pseudo|$mot_de_passe|$sexe|$date_naissance|$profession|$lieu_residence|$situation|$taille|$bio\n";

    // Chemin vers le fichier base de données
    $database = "user_info.txt";

    // Écriture des données utilisateur dans le fichier avec FILE_APPEND pour ajouter sans écraser
    file_put_contents($database, $userdata, FILE_APPEND);

    // Redirection vers une page de confirmation ou une autre action après l'enregistrement des données
    header("Location: confirmation.html");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>
