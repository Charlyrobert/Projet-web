<?php
$file = 'utilisateurs.txt';

if (file_exists($file)) {
    $lines = file($file);
    $result = '';

    foreach ($lines as $line) {
        list($firstField) = explode('|', $line);
        $result .= htmlspecialchars(trim($firstField)) . '<br>';
    }

    echo $result ? $result : 'Aucun utilisateur trouvé.';
} else {
    echo 'Fichier introuvable.';
}
?>
