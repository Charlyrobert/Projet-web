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
    

    // Stocker les données dans un fichier texte
    $file = fopen("utilisateurs.txt", "a");

    $lines = file("utilisateurs.txt");
    foreach ($lines as $line) {
        $infos = explode(" | ", $line);
        if ($infos[0] == $pseudo) {
            $existe = true;
        } else {
            $existe = false;
        }
    }

    if ($existe == false){
        fwrite($file, "$pseudo | $password | $sexe | $dob | $profession | $pays | $region | $bio \n");    
    }


    fclose($file);

    // Rediriger l'utilisateur vers la page de profil après l'inscription
    header("Location: profil.php?pseudo=$pseudo");
    exit();
} else {
    echo "Pas de POST\n";
} 
?>
