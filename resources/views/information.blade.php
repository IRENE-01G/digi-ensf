
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription Simple</title>
    
</head>

<style>
    /* Styles de base pour tout le corps de la page */
body {
    font-family: Arial, sans-serif; /* Police de caractères simple */
    margin: 0; /* Supprime les marges par défaut du navigateur */
    background-color: #ffffffff; /* Arrière-plan gris foncé */
    display: flex; /* Permet de centrer le formulaire */
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    min-height: 100vh; /* La page occupe au moins toute la hauteur de l'écran */
    padding: 20px; /* Un peu d'espace autour du formulaire sur les petits écrans */
    box-sizing: border-box; /* S'assure que le padding n'ajoute pas de largeur */
}

/* Conteneur principal du formulaire */
.form-container {
    background-color: #ffffffff; /* Fond blanc pour le formulaire */
    padding: 30px 40px; /* Espacement intérieur */
    border-radius: 8px; /* Coins légèrement arrondis */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Ombre légère pour donner de la profondeur */
    width: 100%; /* Occupe toute la largeur disponible */
    max-width: 800px; /* Limite la largeur maximale pour ne pas être trop étiré */
}

/* Titres de section (Informations personnelles, etc.) */
h2 {
    color: #333; /* Couleur de texte foncée */
    font-size: 24px; /* Taille de police */
    margin-top: 0; /* Supprime la marge supérieure par défaut */
    margin-bottom: 25px; /* Marge en bas pour séparer du contenu */
    border-bottom: 1px solid #eee; /* Ligne fine de séparation */
    padding-bottom: 10px; /* Espace entre le titre et la ligne */
}

/* Ligne de formulaire pour regrouper deux champs côte à côte */
.form-row {
    display: flex; /* Met les éléments côte à côte */
    gap: 20px; /* Espacement entre les éléments */
    margin-bottom: 20px; /* Marge en bas pour séparer des autres lignes */
}

/* Chaque groupe champ + label */
.form-group {
    flex: 1; /* Prend l'espace disponible de manière égale */
    display: flex; /* Organise le label et l'input */
    flex-direction: column; /* Place le label au-dessus de l'input */
}

/* Pour les champs qui occupent toute la largeur */
.form-group.full-width {
    width: 100%;
    margin-bottom: 20px; /* Marge en bas */
}


/* Style des labels (Prénom, Nom, etc.) */
label {
    font-weight: bold; /* Texte en gras */
    margin-bottom: 8px; /* Espace entre le label et l'input */
    color: #555; /* Couleur de texte gris foncé */
    font-size: 14px; /* Taille de police */
}

/* Style des champs de saisie (input) */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"]
 {
    width: 100%; /* Occupe toute la largeur disponible dans son conteneur */
    padding: 12px 15px; /* Espacement intérieur */
    border: 1px solid #ccc; /* Bordure grise */
    border-radius: 5px; /* Coins légèrement arrondis */
    font-size: 16px; /* Taille de police */
    color: #333; /* Couleur de texte */
    box-sizing: border-box; /* Assure que le padding n'ajoute pas de largeur */
    background-color: #f9f9f9; /* Fond légèrement gris pour les champs */
}

/* Quand l'utilisateur clique dans un champ */
input:focus {
    border-color: #c1114fff; /* Bordure violette */
    outline: none; /* Supprime la bordure de focus par défaut du navigateur */
    box-shadow: 0 0 0 3px rgba(154, 43, 154, 0.2); /* Ombre légère autour du champ */
}

/* Styles pour les sections du formulaire (pour les espacements) */
.section {
    margin-bottom: 40px; /* Marge après chaque section */
}

/* Section des boutons */
.button-section {
    display: flex; /* Met les boutons côte à côte */
    justify-content: space-between; /* Espace les boutons aux extrémités */
    margin-top: 30px; /* Marge au-dessus des boutons */
}

/* Styles des boutons */
.btn {
    padding: 12px 25px; /* Espacement intérieur */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    font-size: 16px; /* Taille de police */
    font-weight: bold; /* Texte en gras */
    cursor: pointer; /* Indique que le bouton est cliquable */
    transition: background-color 0.3s ease; /* Animation douce au survol */
    width: 150px; /* Largeur fixe pour les boutons */
}

/* Bouton Retour */
.btn-retour {
    background-color: #b30047; /* Couleur violette */
    color: white; /* Texte blanc */
}



/* Bouton Suivant */
.btn-suivant {
    background-color: #b30047; /* Couleur violette */
    color: white; /* Texte blanc */
}


/* Rendre le formulaire responsive pour les petits écrans */
@media (max-width: 768px) {
    .form-row {
        flex-direction: column; /* Empile les champs verticalement sur les petits écrans */
        gap: 0; /* Supprime l'espacement entre les champs empilés */
    }

    .form-group {
        margin-bottom: 20px; /* Ajoute de l'espace entre les champs empilés */
    }

    .form-container {
        padding: 20px; /* Réduit le padding sur les petits écrans */
    }

    .btn {
        width: 100%; /* Les boutons occupent toute la largeur */
        margin-bottom: 10px; /* Espace entre les boutons empilés */
    }

    .button-section {
        flex-direction: column; /* Empile les boutons verticalement */
       
    }
}
</style>
<body>
    <form method ="POST" action ="{{ route('informations.store') }}">
        @csrf

    <div class="form-container">

        <div class="section">
            <h2>Informations personnelles</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Irène">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="GBEGRNAN">
                </div>
            </div><br>
        
            <div class="form-row">
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" placeholder="01/04/2006">
                </div>
                <div class="form-group">
                    <label for="lieu_naissance">Lieux de naissance</label>
                    <input type="text" id="lieu_naissance" name="lieu_naissance" placeholder="Lomé">
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group">
                    <label for="nationalite">Nationalité</label>
                    <input type="text" id="nationalite" name="nationalite" placeholder="togolaise">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="igbegnan@gmail.com">
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone" placeholder="+22871183058">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="adresse" placeholder="lomé">
                </div>
            </div>
        </div><br><br>

        <div class="section">
            <h2>Informations des parents / Tuteurs</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="nom_parent">Nom</label>
                    <input type="text" id="nom_parent" name="nom_parent" placeholder="GBEGNRAN">
                </div>
                <div class="form-group">
                    <label for="prenom_parent">Prénom</label>
                    <input type="text" id="prenom_parent" name="prenom_parent">
                </div>
            </div>

            <div class="form-group full-width">
                <label for="profession_parent">Profession</label>
                <input type="text" id="profession_parent" name="profession_parent">
            </div>

            <div class="form-group full-width">
                <label for="adresse_parent">Ville</label>
                <input type="text" id="adresse_parent" name="adresse_parent">
            </div>

            <div class="form-group full-width">
                <label for="telephone_parent">Téléphone</label>
                <input type="tel" id="telephone_parent" name="telephone_parent">
            </div>
        </div>

        <div class="button-section">
            <a>
            <button class="btn btn-retour">Retour</button>
           </a>
            <button type="submit" class="btn btn-retour">Suivant</button>

        </div>

    </div>
</form>
</body>
</html>
 </body>
 </html>