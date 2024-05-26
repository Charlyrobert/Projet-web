<?php
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $file = 'utilisateurs.txt';

    if (file_exists($file)) {
        $lines = file($file);
        $result = '';

        foreach ($lines as $line) {
            list($firstField) = explode('|', $line);
            if (trim($firstField) === $query) {
                $result .= htmlspecialchars($line) . '<br>';
            }
        }

        echo $result ? $result : 'Aucun résultat trouvé.';
    } else {
        echo 'Fichier introuvable.';
    }
}
?>
