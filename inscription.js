// Récupérer les champs de mot de passe
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");
var password_match = document.getElementById("password_match");

// Fonction pour vérifier si les mots de passe correspondent
function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
        password_match.innerHTML = "Les mots de passe ne correspondent pas";
    } else {
        confirm_password.setCustomValidity("");
        password_match.innerHTML = "";
    }
}

// Écouter les événements de saisie dans les champs de mot de passe
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
