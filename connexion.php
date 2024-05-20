<?php
session_start();
$file = fopen("debug.txt", "a");
fwrite($file, "Debut\n");    


echo "Debut\n";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    fwrite($file, "Post\n");    
    // Lire les données du fichier utilisateurs
    $lines = file("utilisateurs.txt");
    $authenticated = false;
    
    foreach ($lines as $line) {
        // Supprimer les espaces blancs autour de la ligne lue
        fwrite($file, "Lecture\n");    
        $line = trim($line);
        // Diviser la ligne en tableau en utilisant le séparateur |
        $infos = explode(" | ", $line);
        // Comparer le pseudonyme et le mot de passe avec ceux fournis par l'utilisateur
        if ($infos[0] == $pseudo && $infos[1] == $password) {
            // Si les identifiants correspondent, définir les variables de session
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["sexe"] = $infos[2];
            $_SESSION["dob"] = $infos[3];
            $_SESSION["profession"] = $infos[4];
            $_SESSION["pays"] = $infos[5];
            $_SESSION["region"] = $infos[6];
            $_SESSION["bio"] = $infos[7];
            $authenticated = true;
            break;
        }
    }
    
    if ($authenticated) {
        // Rediriger vers la page de profil si l'authentification réussit
        header("Location: profil.php?pseudo=$pseudo");
        exit();
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur si l'authentification échoue
        header("Location: connexion.html?error=1");
        exit();
        fclose($file);    
    }
} else {
    // Rediriger vers la page de connexion si les données POST ne sont pas envoyées
    header("Location: connexion.html");
    exit();
    fclose($file);
}
?>
