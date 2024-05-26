<?php
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $file = 'utilisateurs.txt';

    if (file_exists($file)) {
        $lines = file($file);
        $result = '';

        foreach ($lines as $line) {
            list($firstField) = explode('|', $line);
            if (stripos(trim($firstField), $query) !== false) {
                $result .= htmlspecialchars($line) . '<br>';
            }
        }

        if ($result) {
            // Encode the result to make it safe for URL usage
            $encodedResult = urlencode($result);
            header("Location: displayresults.php?result=$encodedResult");
            exit();
        } else {
            echo 'Aucun résultat trouvé.';
        }
    } else {
        echo 'Fichier introuvable.';
    }
} else {
    echo 'Paramètre de recherche manquant.';
}
?>
