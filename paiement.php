<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    header("Location: connexion.html");
    exit();
}

$pseudo = $_SESSION["pseudo"];
$code_admin_correct = "45100928";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST["card_number"];
    $expiration_date = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];
    $code_admin = $_POST["code_admin"];

    if ($code_admin == $code_admin_correct) {
        // Mettre à jour l'état d'abonnement dans le fichier utilisateurs.txt
        $lines = file("utilisateurs.txt");
        $new_lines = [];

        foreach ($lines as $line) {
            $infos = explode(" | ", $line);
            if ($infos[0] == $pseudo) {
                $infos[8] = "1\n";
            }
            $new_lines[] = implode(" | ", $infos);
        }

        file_put_contents("utilisateurs.txt", implode("", $new_lines));

        echo "Abonnement réussi!";
    } else {
        echo "Paiement refusé. Veuillez vérifier vos informations bancaires.";
    }
}
?>
