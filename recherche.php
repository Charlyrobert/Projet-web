<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Rencontres.com</title>
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
        <section id="search">
            <div class="container">
                <h2>Recherche de Profils</h2>
                <form action="recherche_resultats.php" method="get">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" id="pseudo" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe:</label>
                        <select id="sexe" name="sexe">
                            <option value="">Tous</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Âge:</label>
                        <input type="number" id="age" name="age" min="18" max="100">
                    </div>
                    <div class="form-group">
                        <label for="region">Région:</label>
                        <input type="text" id="region" name="region">
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession:</label>
                        <input type="text" id="profession" name="profession">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Rechercher" class="btn">
                    </div>
                </form>
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
