<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    
    // Lire les données du fichier utilisateurs
    $lines = file("utilisateurs.txt");
    $authenticated = false;

    foreach ($lines as $line) {
        $infos = explode(" | ", $line);
        if ($infos[0] == $pseudo && trim($infos[1]) == $password) {
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["sexe"] = $infos[2];
            $_SESSION["dob"] = $infos[3];
            $_SESSION["profession"] = $infos[4];
            $_SESSION["pays"] = $infos[5];
            $_SESSION["region"] = $infos[6];
            $_SESSION["bio"] = trim($infos[7]);
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header("Location: profil.php");
        exit();
    } else {
        echo "Pseudo ou mot de passe incorrect";
    }
}
?>
