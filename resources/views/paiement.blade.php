<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Paiement Sécurisé</title>
    <link rel="stylesheet" href="payment-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo-ensf.jpg') }}">
</head>
<style>
    /* Styles de base pour tout le corps de la page */
body {
    font-family: 'Arial', sans-serif; /* Police de caractères moderne */
    margin: 0;
    background-color: #f4f7fa; /* Un arrière-plan très clair */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* S'assure que la page prend toute la hauteur */
    padding: 20px;
    box-sizing: border-box;
}

/* Conteneur principal de la page de paiement */
.payment-container {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 12px; /* Coins plus arrondis pour un look doux */
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); /* Ombre plus prononcée */
    width: 100%;
    max-width: 500px; /* Limite la largeur pour une meilleure lisibilité */
}

/* Titre principal de la page */
.payment-title {
    color: #333;
    font-size: 28px;
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
}

/* Section du résumé de la commande */
.summary-section {
    background-color: #f0f0f5; /* Fond légèrement gris pour le résumé */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.summary-section h3 {
    color: #555;
    font-size: 18px;
    margin-top: 0;
    margin-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 16px;
    color: #666;
}

.summary-item.total {
    font-weight: bold;
    color: #333;
    font-size: 18px;
    padding-top: 10px;
    border-top: 1px dashed #e0e0e0;
}

/* Formulaire de paiement */
.payment-form .form-group {
    margin-bottom: 25px;
    position: relative; /* Pour positionner les icônes de carte */
}

.payment-form label {
    display: block; /* Chaque label sur sa propre ligne */
    font-weight: bold;
    margin-bottom: 10px;
    color: #444;
    font-size: 15px;
}

.payment-form input[type="text"],
.payment-form input[type="date"],
.payment-form input[type="email"] {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid #dcdcdc; /* Bordure claire */
    border-radius: 8px; /* Coins plus arrondis */
    font-size: 17px;
    color: #333;
    box-sizing: border-box;
    background-color: #fdfdfd; /* Fond presque blanc */
}

.payment-form input:focus {
    border-color: #b03a95; /* Couleur de focus violette */
    outline: none;
    box-shadow: 0 0 0 3px rgba(176, 58, 149, 0.15); /* Ombre de focus douce */
}

/* Icônes des cartes de crédit */
.card-icons {
    position: absolute;
    right: 15px;
    top: 50%; /* Centre verticalement par rapport au champ */
    transform: translateY(-50%); /* Ajustement précis */
    display: flex;
    gap: 8px;
    pointer-events: none; /* Ne bloque pas les clics sur l'input */
}

.card-icons i {
    color: #b03a95; /* Couleur des icônes de carte */
    font-size: 20px;
}

/* Rangée pour les champs Date d'expiration et CVV */
.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.form-row .form-group {
    flex: 1; /* Chaque champ prend la moitié de la largeur */
    margin-bottom: 0; /* Pas de marge supplémentaire entre les groupes */
}

/* Checkbox pour enregistrer la carte */
.checkbox-group {
    display: flex;
    align-items: center;
    margin-top: -10px; /* Remonte un peu */
    margin-bottom: 30px;
    font-size: 15px;
    color: #666;
}

.checkbox-group input[type="checkbox"] {
    margin-right: 10px;
    width: 18px;
    height: 18px;
    accent-color: #b03a95; /* Couleur d'accent pour la checkbox */
}

/* Bouton de paiement */
.btn-pay {
    width: 100%;
    padding: 15px 20px;
    background-color: #b80e41ff; /* La couleur violette de votre maquette */
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    letter-spacing: 0.5px;
}

.btn-pay:hover {
    background-color: #f41962ff; /* Teinte plus foncée au survol */
    transform: translateY(-2px); /* Léger effet de soulèvement */
}

.btn-pay:active {
    transform: translateY(0); /* Retour à la position normale au clic */
}

/* Note de sécurité */
.security-note {
    text-align: center;
    color: #777;
    font-size: 14px;
    margin-top: 30px;
}

.security-note i {
    color: #5cb85c; /* Couleur verte pour l'icône de verrouillage */
    margin-right: 8px;
}

/* Responsive pour les petits écrans */
@media (max-width: 600px) {
    .payment-container {
        padding: 25px;
        margin: 10px; /* Marge autour du conteneur */
    }

    .payment-title {
        font-size: 24px;
        margin-bottom: 25px;
    }

    .form-row {
        flex-direction: column; /* Empile les champs verticalement */
        gap: 0;
    }

    .form-row .form-group {
        margin-bottom: 20px; /* Espace entre les champs empilés */
    }

    .form-row .form-group:last-child {
        margin-bottom: 0; /* Pas de marge après le dernier champ empilé */
    }

    .card-icons {
        position: static; /* Place les icônes sous le champ */
        transform: none;
        margin-top: 10px;
        justify-content: flex-end; /* Aligner à droite */
    }
}
    .progress-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        position: relative;
    }
    .progress-step {
        width: 35px;
        height: 35px;
        background-color: #e0e0e0;
        color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }
    .progress-step.active {
        background-color: #b80e41; /* Matching the button color */
        box-shadow: 0 0 0 4px rgba(184, 14, 65, 0.2);
    }
    .progress-step.completed {
        background-color: #b80e41;
    }
    .progress-line {
        flex: 1;
        height: 3px;
        background-color: #e0e0e0;
        margin: 0 10px;
        position: relative;
    }
    .progress-line.filled {
        background-color: #b80e41;
    }
    .progress-label {
        position: absolute;
        top: 40px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 13px;
        color: #666;
        white-space: nowrap;
        font-weight: normal;
    }
    .progress-step.active .progress-label {
        color: #b80e41;
        font-weight: bold;
    }
    @media (max-width: 600px) {
        .progress-label {
            display: none;
        }
    }
</style>
<body>

    <div class="payment-container">
        <div class="progress-container">
            <div class="progress-step completed">
                1
                <span class="progress-label">Informations</span>
            </div>
            <div class="progress-line filled"></div>
            <div class="progress-step completed">
                2
                <span class="progress-label">Dossier</span>
            </div>
            <div class="progress-line filled"></div>
            <div class="progress-step active">
                3
                <span class="progress-label">Paiement</span>
            </div>
        </div>

        <h2 class="payment-title">Confirmer votre paiement</h2>

        <div class="summary-section">
            <h3>Résumé de la commande</h3>
            <div class="summary-item">
                <span>Frais d'inscription</span>
                <span>5000 FCFA</span>
            </div>
            <div class="summary-item total">
                <span>Total à payer</span>
                <span>5100 FCFA</span>
            </div>
        </div>

        <form class="payment-form" method="POST" action="{{ route('paiement.store') }}">
            @csrf
            <div class="form-group">
                <label for="card-number">Numéro de carte</label>
                <input type="text" id="card-number" placeholder="XXXX XXXX XXXX XXXX" required>
                <div class="card-icons">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="expiry-date">Date d'expiration</label>
                    <input type="date" id="expiry-date" placeholder="MM/AA/JJ" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="XXX" required>
                </div>
            </div>

            <div class="form-group">
                <label for="card-name">Nom sur la carte</label>
                <input type="text" id="card-name" placeholder="Nom Prénom" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="save-card">
                <label for="save-card">Enregistrer cette carte pour de futurs paiements</label>
            </div>
            <button type="submit" class="btn-pay">Payer maintenant</button>
        </form>

        <p class="security-note">
            <i class="fas fa-lock"></i> Votre paiement est sécurisé par un cryptage SSL.
        </p>
    </div>

</body>
</html>