<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/styles/styles.css')}}">
    <title>digi-ensf</title>
</head>
                                 
                                        
<header>
    <nav>
        <div class="logo">
        <img src="{{ asset('assets/logo-ensf.jpg')}}" alt="Image" width="80" height="80" >
        </div>                       

<div class="menu">
    @auth
        <div class=" connecter">
            <a href="{{ route('deconnexion') }}">Se déconnecter</a> 
        </div>
    @else
         
          <div class=" connecter">
            <a href="{{ route('connexion.submit') }}">Se connecter</a>
         </div>

         <div class="inscrire">
            <a class="inscrire" href="{{ route('inscription.form') }}"> S'inscrire</a>
        </div>
    @endauth
</div>
    </nav>  
</header><br><br>
<body>

<div style="background-image: url('{{ asset('assets/imp.png')}}'); background-size: cover; height: 80vh; display: flex; justify-content: center; align-items: center;">
    
    <div style="text-align: center; padding-top: 20%;">
        <h1 style="color: white; font-size: 48px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);margin-top: -150px;">Candidature en ligne ENSF</h1><br><br>
        <p style="color: white; font-size: 18px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);">Déposez vos dossier de candidature en ligne de manière simple et 
        <br>sécurisée.Suivez l'evolution de votre candidature en temps réel</p><br><br>
        @auth
               <a href="{{ route('informations.index') }}" style="background-color: #d81bb3ff; color: white; font-size: 18px; border: none; border-radius: 10px; cursor: pointer;width:260px; display: inline-block; text-align: center; padding: 10px 0;">Commencer ma candidature</a>
        @else
             <a href="{{ route('connexion.submit') }}" style="background-color: #d81bb3ff; color: white; font-size: 18px; border: none; border-radius: 10px; cursor: pointer;width:260px; display: inline-block; text-align: center; padding: 10px 0;">Commencer ma candidature</a>
        @endauth
    </div>
</div><br><br>

          <div class='en'>
<h1> Proccessus de candidatures simplifié</h1><br>
<p style="font-size:20px;"> Notre plateforme vous accompagne à chaque étape de votre candidature</p >
            </div><br><br>


            
<div class="container">
    <div class="step-box box1">
        <div class="icon">★</div>
        <h3>1. Créer un compte</h3>
        <p>Inscrivez-vous rapidement avec vos informations personnelles</p>
    </div>

    <div class="step-box box2">
        <div class="icon">★</div>
        <h3>2. Déposer le dossier</h3>
        <p>Remplissez le formulaire et joignez vos documents</p>
    </div>

    <div class="step-box box3">
        <div class="icon">★</div>
        <h3>3. Suivis en temps réel</h3>
        <p>Recevez des notifications sur l’évolution de votre dossier</p>
    </div>
</div><br>

<div class="section-container">
    <div class="text-box">
        <h2>Documents requis</h2>
        <ul>
            <li>✅  Pièces d’identité</li>
            <li>✅  Diplôme</li>
            <li>✅  Lettre de motivation</li>
            <li>✅  Casier judiciaire</li>
        </ul>
    </div>

    <div class="image-box">
        <img src="{{ asset('assets/ed.jpg')}}" alt="Image" width="" height="350" >
    </div>
</div>

<div class="st">
    <h1>Prêt à commencer votre canditature ?</h1><br>
    <p>Rejoignez les milliers d'étudiant qui nous ont fait confiance</p><br><br>

</div><br><br>

<footer>
    <div class="a">
<img src="{{ asset('assets/logo-ensf.jpg') }}" style="width:80px;height:80px;"><br><br>
<h5>ENSF =Ecole Nationale des Sages femmes</h5>
</div>
<div class="footer">
<h2>Candidature</h2><br>
<p>Proccessus</p><br>
<p>Document requis</p><br>
<p>Calendrier</p><br>
    <div>
<div class="tr">

<h2>Contact</h2><br>
<p>Email: ensf@gmail.com</p><br>
<p>Tel: +228 71 18 30 58</p><br>
<p>TOGO-LOME</p>
</div>
</footer><br><br><br>
<hr><hr><br>
<h6>2025 ENSF .tout droit réservés |digi-ensf |ce site est réalisé par GBEGNRAN Irène</h6><br><br>

</body>
</html>