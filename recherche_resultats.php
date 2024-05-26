<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de Recherche - Rencontres.com</title>
    <link rel="stylesheet" href="css/recherche.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Rencontres.com</h1>
            <nav>
                <ul>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="recherche.php">Recherche</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="results">
            <div class="container">
                <h2>Résultats de Recherche</h2>
                <div id="profiles-list">
                    <?php
                    $pseudo = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';
                    $sexe = isset($_GET['sexe']) ? $_GET['sexe'] : '';
                    $age = isset($_GET['age']) ? $_GET['age'] : '';
                    $region = isset($_GET['region']) ? $_GET['region'] : '';
                    $profession = isset($_GET['profession']) ? $_GET['profession'] : '';

                    $lines = file("utilisateurs.txt");
                    $results = [];

                    foreach ($lines as $line) {
                        $infos = explode(" | ", $line);
                        $user_age = date_diff(date_create($infos[3]), date_create('today'))->y;

                        if (
                            ($pseudo === '' || stripos($infos[0], $pseudo) !== false) &&
                            ($sexe === '' || stripos($infos[2], $sexe) !== false) &&
                            ($age === '' || $user_age == $age) &&
                            ($region === '' || stripos($infos[6], $region) !== false) &&
                            ($profession === '' || stripos($infos[4], $profession) !== false)
                        ) {
                            $results[] = $infos;
                        }
                    }

                    if (count($results) > 0) {
                        foreach ($results as $infos) {
                            echo "<div class='profile'>";
                            echo "<p><strong>Pseudo:</strong> <a href='profil_utilisateur.php?pseudo={$infos[0]}'>{$infos[0]}</a></p>";
                            echo "<p><strong>Sexe:</strong> {$infos[2]}</p>";
                            echo "<p><strong>Date de naissance:</strong> {$infos[3]}</p>";
                            echo "<p><strong>Profession:</strong> {$infos[4]}</p>";
                            echo "<p><strong>Lieu de résidence:</strong> {$infos[5]}, {$infos[6]}</p>";
                            echo "<p><strong>Biographie:</strong> {$infos[7]}</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Aucun profil trouvé correspondant aux critères.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Rencontres.com. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
