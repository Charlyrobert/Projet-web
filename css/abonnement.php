<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST["card_number"];
    $expiration_date = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];
    $code_admin = $_POST["code_admin"];

    // Vérifiez le code admin
    if ($code_admin == "45100928") {
        // Simuler la réussite du paiement
        $_SESSION["abonnement"] = "1"; // Mettre à jour la session pour indiquer que l'utilisateur est abonné
        header("Location: abonnement_reussi.php");
        exit();
    } else {
        echo "Échec de l'abonnement. Vérifiez vos informations.";
    }
}
?>
