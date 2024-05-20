<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $sexe = $_POST["sexe"];
    $dob = $_POST["dob"];
    $profession = $_POST["profession"];
    $pays = $_POST["pays"];
    $region = $_POST["region"];
    $bio = $_POST["bio"];

    // Lire le fichier des utilisateurs et mettre à jour les informations
    $lines = file("utilisateurs.txt");
    $updated = false;
    $file = fopen("utilisateurs.txt", "w");

    foreach ($lines as $line) {
        $infos = explode(" | ", $line);
        if ($infos[0] == $pseudo) {
            $updated_line = "$pseudo | $password | $sexe | $dob | $profession | $pays | $region | $bio\n";
            fwrite($file, $updated_line);
            $updated = true;
        } else {
            fwrite($file, $line);
        }
    }
    
    if (!$updated) {
        $new_line = "$pseudo | $password | $sexe | $dob | $profession | $pays | $region | $bio\n";
        fwrite($file, $new_line);
    }

    fclose($file);

    // Mettre à jour les informations dans le localStorage (si utilisé côté client)
    echo "<script>
        alert('Profil mis à jour avec succès');
        localStorage.setItem('userData', JSON.stringify({
            pseudo: '$pseudo',
            password: '$password',
            sexe: '$sexe',
            dob: '$dob',
            profession: '$profession',
            pays: '$pays',
            region: '$region',
            bio: '$bio'
        }));
        window.location.href = 'profil.php?pseudo=$pseudo';
    </script>";
} else {
    echo "Méthode de requête non prise en charge.";
}
