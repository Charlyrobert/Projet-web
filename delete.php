<?php
if (isset($_POST['line'])) {
    $lineToDelete = $_POST['line'];
    $file = 'utilisateurs.txt';

    if (file_exists($file)) {
        $lines = file($file);
        $newLines = [];

        foreach ($lines as $line) {
            if (trim($line) !== trim($lineToDelete)) {
                $newLines[] = $line;
            }
        }

        file_put_contents($file, implode("", $newLines));
        echo 'Ligne supprimée avec succès.';
    } else {
        echo 'Fichier introuvable.';
    }
} else {
    echo 'Aucune ligne spécifiée pour la suppression.';
}
?>
