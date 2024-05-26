<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
</head>
<body>

<h1>Résultats de recherche</h1>
<div id="result">
    <?php
    if (isset($_GET['result'])) {
        $result = urldecode($_GET['result']);
        echo nl2br($result); // nl2br to preserve line breaks in the result
    } else {
        echo 'Aucun résultat à afficher.';
    }
    ?>
</div>

</body>
</html>
