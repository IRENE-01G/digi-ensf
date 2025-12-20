<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo-ensf.jpg') }}">
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
                    height:40px;
                    font-size:20px;
                    color:white;
                    border-radius:5px;
                    cursor:pointer;
                    border:none;
                }
            .error{
                    color: red;
                    font-size: 14px;
                    margin-top: 5px;
                }
            form{
            width: 95%;
            max-width: 900px;
            margin: auto;
            height: auto;
            padding: 20px;
            margin-top:10px;
            background: color #a2a2a2;
            box-shadow:2px 2px 5px 1px #cc0066;
            border-radius:10px;
            box-sizing: border-box;
                }
                h1  {
                    color:#cc0066;

                }
                @media (max-width: 600px) {
    form{
        padding: 5px;
        margin: 0px; 
    }}
          
    </style>


    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen ">

    <div class="w-full max-w-2xl mx-auto p-8">

        <h1 class="text-center text-2xl font-serif mb-10">Créer un compte</h1>

        <form action="{{ route('inscription.post') }}" method="POST" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">

                <div>
                    <label class="block text-lg font-serif mb-2">Prénoms</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}"
                           class="w-full border border-gray-300 rounded-md p-3 focus:ring-0 focus:border-gray-400"
                           placeholder="irène">
                </div>

                <div>
                    <label class="block text-lg font-serif mb-2">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}"
                           class="w-full border border-gray-300 rounded-md p-3 focus:ring-0 focus:border-gray-400"
                           placeholder="GBEGNRAN">
                </div>

            </div>

         
            <div>
                <label class="block text-lg font-serif mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-md p-3 focus:ring-0 focus:border-gray-400"
                       placeholder="igbegrnan@gmail.com">
            </div>

            
            <div>
                <label class="block text-lg font-serif mb-2">Mots de passe</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-md p-3 focus:ring-0 focus:border-gray-400"
                       placeholder="*******">
            </div>

           
            <button type="submit"
                    class="w-full bg-pink-700 hover:bg-pink-800 text-white py-3 rounded-md text-lg font-medium">
                Créer mon compte
            </button>

           
            <p class="text-center text-lg mt-4">
                Déjà un compte ?
                <a href="{{ route('login') }}" class="text-indigo-600 font-medium">Se connecter</a>
            </p>

        </form>
    </div>

</body>
</html>
