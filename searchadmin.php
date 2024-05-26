<?php
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $file = 'utilisateurs.txt';

    if (file_exists($file)) {
        $lines = file($file);
        $result = '';
        $matchedLine = '';

        foreach ($lines as $line) {
            list($firstField) = explode('|', $line);
            if (stripos(trim($firstField), $query) !== false) {
                $matchedLine = $line;
                $result .= htmlspecialchars($line) . '<br>';
            }
        }

        if ($result) {
            $encodedResult = urlencode($result);
            $encodedLine = urlencode($matchedLine);
            header("Location: displayresults.php?result=$encodedResult&line=$encodedLine");
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

