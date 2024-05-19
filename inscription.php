<?php
echo "Debut inscription \n";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $sexe = $_POST["sexe"];
    $dob = $_POST["dob"];
    $profession = $_POST["profession"];
    $pays = $_POST["pays"];
    $region = $_POST["region"];
    $bio = $_POST["bio"];
    
/*
    $departement = $_POST["departement"];
    $situation_amoureuse = $_POST["situation_amoureuse"];
    $taille = $_POST["taille"];
    $poids = $_POST["poids"];
    $centres_interets = $_POST["centres_interets"];
*/

    // Stocker les données dans un fichier texte
    $file = fopen("utilisateurs.txt", "a");
    fwrite($file, "$pseudo | $password | $sexe | $dob | $profession | $pays | $region | $bio \n");    
//    fwrite($file, "Post $pseudo | $password | $sexe | $dob | $profession | $pays | $region | $departement | $situation_amoureuse | $taille | $poids | $bio | $centres_interets\n");
    fclose($file);

    // Rediriger l'utilisateur vers la page de profil après l'inscription
    header("Location: profil.php?pseudo=$pseudo");
    exit();
} else {
    echo "Pas de POST\n";
} 
?>
