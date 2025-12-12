<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
  
body {
    margin: 0;
    padding: 0;
    font-family: 'Georgia', serif; 
    color: #333;
    background-color: #fff;
}


p, li {
    font-family: Arial, sans-serif;
}


.container {
    max-width: 700px; 
    margin: 0 auto;   
    padding: 40px 20px;
    min-height: 80vh; 
}


.header-succes {
    text-align: center;
    margin-bottom: 60px;
}

.icone-check {
    width: 60px;
    height: 60px;
    color: #00C851; 
    margin-bottom: 20px;
}

h1 {
    font-size: 24px;
    font-weight: normal;
    margin-bottom: 10px;
}

.sous-titre {
    font-size: 16px;
    color: #555;
    line-height: 1.5;
}


h2 {
    font-size: 20px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
    margin-bottom: 30px;
}

.etape {
    display: flex; 
    margin-bottom: 30px;
    align-items: flex-start; 
}

.point-rose {
    min-width: 25px;
    height: 25px;
    background-color: #b01c78; 
    border-radius: 50%; 
    margin-right: 20px;
    margin-top: 5px; 
}

.info-etape h3 {
    margin: 0 0 5px 0;
    font-size: 18px;
    color: #111;
    font-family: 'Georgia', serif;
}

.info-etape p {
    margin: 0;
    font-size: 14px;
    color: #444;
}


footer {
    background-color: #b01c78;
    color: white;
    padding: 30px 20px;
    width: 1225px;
}

.contenu-footer {
    max-width: 700px;
    margin: 0 auto;
}

.contenu-footer h3 {
    font-size: 14px;
    font-family: Arial, sans-serif;
    margin-bottom: 10px;
}

.contenu-footer ul {
    list-style-type: disc;
    padding-left: 20px;
    margin: 0;
}

.contenu-footer li {
    font-size: 13px;
    margin-bottom: 5px;
    line-height: 1.4;
}
</style>
<body>

    <div class="container">
        
        <div class="header-succes">
            <svg class="icone-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            
            <h1>Candidature soumise avec succès</h1>
            <p class="sous-titre">Votre dossier de candidature a été reçu et enregistré. Vous recevrez prochainement un email de confirmation.</p>
        </div>
        

        <div class="section-etapes">
            <h2>Prochaines étapes</h2>

            <div class="etape">
                <div class="point-rose"></div>
                <div class="info-etape">
                    <h3>Confirmation par email</h3>
                    <p>Vous recevrez un email de confirmation dans les prochaines minutes avec votre numéro de dossier</p>
                </div>
            </div>

            <div class="etape">
                <div class="point-rose"></div>
                <div class="info-etape">
                    <h3>Examen de dossier</h3>
                    <p>Notre équipe d'admission verra votre dossier dans un délai de 2 jours</p>
                </div>
            </div>

            <div class="etape">
                <div class="point-rose"></div>
                <div class="info-etape">
                    <h3>Notification de décision</h3>
                    <p>Vous serez informé de la décision par email</p>
                </div>
            </div>
        </div>

    </div> <footer>
        <div class="contenu-footer">
            <h3>Informations importantes</h3>
            <ul>
                <li>Conservez précieusement votre numéro de dossier : ENSF-2025-MZPW1C</li>
                <li>Vérifiez régulièrement vos emails (y compris les spams)</li>
                <li>En cas de question, contactez-nous à digi-ensf@gmail.com</li>
            </ul>
        </div>
    </footer>

</body>
</html>