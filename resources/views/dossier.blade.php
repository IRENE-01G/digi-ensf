<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier de Candidature</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo-ensf.jpg') }}">
    <style>
    .upload-card {
background: #ffffffff;
padding: 30px;
width: 95%;
max-width: 900px;
margin: 40px auto;
box-shadow:7px 7px 7px 4px #d996b7ff;
border-radius: 10px;
box-sizing: border-box;
}

.upload-card h2 {
margin-bottom: 25px;
font-size: 35px;
height: 60px;
color: #ffff;
background:#cc2366;
border-radius: 2px 2px 2px 2px ;
text-align:center;
border-radius:20px;

}

.upload-grid {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 40px;



}

.upload-block label {
display: block;
font-size: 14px;
margin-bottom: 12px;
}

.upload-box {
border: 2px solid #b6b6b6ff;
height: 110px;
position: relative;
border-radius: 6px;
text-align: center;
padding-top: 25px;
cursor: pointer;
}

.upload-box input[type="file"] {
position: absolute;
inset: 0;
opacity: 0;
cursor: pointer;
}

.upload-box span {
font-size: 42px;
display: block;
margin-bottom: 8px;
}

.upload-box p {
font-size: 10px;
color: #777;
}
textarea{
    
    height: 250px;
    width: 100%;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    font-size: 15px;
    padding: 10px;
    border:none;
    
}
h2{
   
   
    border-radius:5px;  
}

@media (max-width: 768px) {
    .upload-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .upload-card {
        padding: 20px;
        margin: 20px auto;
    }
    .button-section {
        flex-direction: column;
        align-items: center;
        gap: 20px !important;
    }
    .btn {
        width: 100%;
        text-align: center;
    }
    textarea {
        width: 100%;
    }
    .upload-card h2 {
        font-size: 24px;
        height: auto;
        padding: 10px;
    }
}
</style>
</head>
<body>


<div class="upload-card">

    <h2>Documents requis</h2><br><br>
<form method="POST" action="{{ route('dossier.store') }}" enctype="multipart/form-data">
    @csrf
<div class="upload-grid">

    
    <div class="upload-block">
        <label>copie certifiée de l'acte de naissance*</label>
        <div class="upload-box">
            <input type="file" name="acte_naissance" required>
            <span><img src="{{ asset('assets/p.png') }}"></span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>

    
    <div class="upload-block">
        <label>Duplicata de nationalité*</label>
        <div class="upload-box">
            <input type="file" name="nationalite" required>
            <span><img src="{{ asset('assets/p.png') }}"></</span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>

     <div class="upload-block">
        <label>Une copie certifié de BAC 2*</label>
        <div class="upload-box">
            <input type="file" name="bac" required>
            <span><img src="{{ asset('assets/p.png') }}"></span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>

     <div class="upload-block">
        <label>Extrait de casier judiciaire (datant moins de 3 mois)*</label>
        <div class="upload-box">
            <input type="file" name="casier" required>
            <span><img src="{{ asset('assets/p.png') }}"></</span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>

    <div class="upload-block">
        <label>Certificat medical (datant moins de 3 mois)*</label>
        <div class="upload-box">
            <input type="file" name="medical" required>
            <span><img src="{{ asset('assets/p.png') }}"></</span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>

    <div class="upload-block">
        <label>une copie de note de service delivree par le ministre de la santé*</label>
        <div class="upload-box">
            <input type="file" name="note_service" required>
            <span><img src="{{ asset('assets/p.png') }}"></</span>
            <p>Cliquez pour télécharger PDF, JPG, PNG<br>(max 5MB)</p>
        </div>
    </div>
    <label for="text">Lettre de motivation*</label><br>
    <textarea id="text" name="lettre_motivation" style=" border-radius:5px; border: 2px solid #c1b7bc85;  " placeholder="Votre lettre de motivation ici..."></textarea><br><br>

    <div class="button-section" style="display:flex; gap:70px; margin-top:20px;">
        <a href="{{ route('accueil') }}" class="btn" style="background:#777; text-decoration:none; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">Annuler</a>

        <!-- <a href="{{ route('paiement.index') }}" class="btn" style="background:#cc0066; text-decoration:none; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">Soumettre et payer</a> -->
         <button type="submit" class="btn btn-primary">Soumettre et payer</button>





</div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('.upload-box input[type="file"]');
        
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const box = this.closest('.upload-box');
                const p = box.querySelector('p');
                
                if (this.files && this.files[0]) {
                    // Update visual style
                    box.style.borderColor = '#cc2366';
                    box.style.backgroundColor = 'rgba(204, 35, 102, 0.05)';
                    
                    // Update text with filename
                    p.innerHTML = '<strong>' + this.files[0].name + '</strong><br>Fichier chargé';
                    p.style.color = '#cc2366';
                }
            });
        });
    });
    
</script>
</body>
</html>
