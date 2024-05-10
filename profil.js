// Profil.js

// Fonction pour récupérer les informations de l'utilisateur depuis le stockage local
function afficherProfilUtilisateur() {
    // Récupérer les données de l'utilisateur depuis le stockage local
    const profilUtilisateur = JSON.parse(localStorage.getItem("utilisateur"));

    // Vérifier si des données sont disponibles
    if (profilUtilisateur) {
        // Afficher les informations dans la page
        pseudoElement.textContent = profilUtilisateur.pseudo;
        sexeElement.textContent = profilUtilisateur.sexe;
        nomElement.textContent = profilUtilisateur.nom;
        adresseElement.textContent = profilUtilisateur.adresse;
        passwordElement.textContent = profilUtilisateur.password;

        // Afficher les fichiers téléchargés
        profilUtilisateur.fichiers.forEach(fichier => {
            const lienFichier = document.createElement("a");
            lienFichier.href = fichier;
            lienFichier.textContent = fichier;
            fichiersElement.appendChild(lienFichier);
            fichiersElement.appendChild(document.createElement("br"));
        });
    } else {
        console.log("Aucun profil utilisateur trouvé !");
    }
}

// Appeler la fonction pour afficher le profil de l'utilisateur
afficherProfilUtilisateur();
