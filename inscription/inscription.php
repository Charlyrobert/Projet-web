<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $fname = htmlspecialchars($_POST['fname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $bio = htmlspecialchars($_POST['bio']);

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Générer un numéro aléatoire de 6 chiffres
    $user_id = rand(100000, 999999);

    // Formater les données pour l'écriture dans le fichier
    $user_data = "$user_id|$username|$fname|$name|$email|$password|$gender|$bio\n";

    // Ouvrir le fichier user.txt en mode append
    $file = 'user.txt';
    $handle = fopen($file, 'a');
    if ($handle) {
        if (fwrite($handle, $user_data)) {
            fclose($handle);
            // Redirection vers une autre page avec le nom d'utilisateur comme paramètre dans l'URL
            header("Location: confirmation.php?username=$username");
            exit();
        } else {
            echo "Une erreur s'est produite lors de l'écriture dans le fichier. Veuillez réessayer.";
        }
    } else {
        echo "Impossible d'ouvrir le fichier. Veuillez vérifier les permissions.";
    }
}
?>
