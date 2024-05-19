document.addEventListener("DOMContentLoaded", function () {
    // Vérifier si les informations de l'utilisateur sont stockées dans le localStorage
    const user = JSON.parse(localStorage.getItem("user"));

    if (user) {
        const profileDiv = document.getElementById("user-profile");

        // Afficher les informations de l'utilisateur
        profileDiv.innerHTML = `
            <p><strong>Pseudo:</strong> ${user.pseudo}</p>
            <p><strong>Sexe:</strong> ${user.sexe}</p>
            <p><strong>Date de naissance:</strong> ${user.dob}</p>
            <p><strong>Profession:</strong> ${user.profession}</p>
            <p><strong>Lieu de résidence:</strong> ${user.pays}, ${user.region}, ${user.departement}</p>
            <p><strong>Situation amoureuse:</strong> ${user.situation_amoureuse}</p>
            <p><strong>Taille:</strong> ${user.taille}</p>
            <p><strong>Poids:</strong> ${user.poids}</p>
            <p><strong>Biographie:</strong> ${user.bio}</p>
            <p><strong>Centres d'intérêts:</strong> ${user.centres_interets}</p>
        `;
    } else {
        // Si aucune information n'est trouvée, rediriger l'utilisateur vers la page d'inscription
        window.location.href = "inscription.html";
    }
});
