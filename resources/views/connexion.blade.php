 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de connexion</title>
 </head>
        <style>
            * {
                margin: 0;
                padding: 0;
                }

            input{
                    width: 100%;
                    height:40px;
                    border-radius:5px;
                    border: 2px solid #c1b7bc85;
                    box-sizing: border-box;
                }
            button{
                    background:#cc0066;
                    width: 100%;
                    height:35px;
                    font-size:20px;
                    color:white;
                    border-radius:5px;
                    cursor:pointer;
                    border:none;
                    text-decoration:none;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                }
            form{
            width: 90%;
            max-width: 700px;
            margin: auto;
            height: auto;
            padding: 20px;
            margin-top:100px;
            background-color:white;
            box-shadow:1px 2px 1px 1px #cc0066;
            border-radius:10px;
            
                }
                h1  {
                    color:#cc0066;

                }
                .signup-link {
                    text-align: center;
                    margin-bottom: 20px;
                    font-family: Arial, sans-serif;
                }
                .signup-link a {
                    color: #0011ccff;
                  
                    font-weight: bold;
                }
                .signup-link a:hover {
                    text-decoration: underline;
                    color: #cb1c70ff;
                }
          
            
        </style>
 <body>
                <form method="POST" action="{{ route('connexion.submit') }}">
                    @csrf

    <h1> Veillez vous connecter !</h1><br>
 <label for="email">Adresse e-mail :</label><br><br>
<input type="email" id="email" name="email" required placeholder="votre@email.com"><br><br>
<label for="password">Mot de passe :</label><br><br>
<input type="password" id="password" name="password" required placeholder="•••••••"><br><br>
<div class="signup-link">
    <p>Vous n'avez pas de compte ? <a href="{{ route('inscription.form') }}">Inscrivez-vous</a></p>
</div>
<button type="submit">Se connecter</button>
            </form>  
        
 </body>
 </html>