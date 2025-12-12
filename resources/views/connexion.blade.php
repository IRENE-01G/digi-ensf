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
                    width: 700px;
                    height:40px;
                    border-radius:5px;
                    border: 2px solid #c1b7bc85;
                   
                }
            button{
                    background:#cc0066;
                    width: 700px;
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
            width: 700px;
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
          
            
        </style>
 <body>
                <form method="POST" action="{{ route('connexion.submit') }}">
                    @csrf

    <h1> Veillez vous connecter !</h1><br>
 <label for="email">Adresse e-mail :</label><br><br>
<input type="email" id="email" name="email" required placeholder="votre@email.com"><br><br>
<label for="password">Mot de passe :</label><br><br>
<input type="password" id="password" name="password" required placeholder="•••••••"><br><br>
<label><input type="checkbox" name="remember"> Se souvenir de moi</label><br><br>

<button type="submit">Se connecter</button>
            </form>  
        
 </body>
 </html>