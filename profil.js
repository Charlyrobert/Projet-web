// Récupérer les données utilisateur depuis le localStorage
var userData = JSON.parse(localStorage.getItem("userData"));

// Vérifier si des données utilisateur existent dans le localStorage
if (userData) {
    // Afficher les données utilisateur dans les éléments correspondants de la page de profil
    document.getElementById("pseudo").innerText = userData.pseudo;
    document.getElementById("sexe").innerText = userData.sexe;
    // AJOUTER LES AUTRES
} else {
    // Si aucune donnée utilisateur n'est trouvée dans le localStorage, rediriger l'utilisateur vers la page d'inscription
    window.location.href = "inscription.html";
}
