<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Platinuim - Agence de Location</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
<body>

<article>
        <div class="container" class="{'sign-up-active' : signUp}">
            <div class="overlay-container">
                <div class="overlay"> 
                    
                    <div class="overlay-right"> 
                        <img alt="Vue logo" src="assets/logo.png">
                       
                    </div>
                </div>
            </div>
            
             <!-- formulaire de connexion -->
            <form class="sign-up" action="/login" method="post">
                <h2> Connexion </h2>
                <div> Entrez vos coordonnées </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="login" placeholder="Pseudo" /> 
                <input type="password" name="mdp" placeholder="Mot de passe" />
                <button>Se connecter</button>
                @isset($error)
                <div class="alert alert-danger mt-3">
                    {{ $error }}  
                </div>
                {{request()->session()->forget('error')}}
                <?php 
                    // $request->session()->forget('error');
                ?>
                @endisset
        </div>
    </article>
</body>
</html>

    


<script>

    
          function switchLogin() {
                this.signUp = !this.signUp;
                this.pseudo = "";
                this.email = "";
                this.password = "";
            }
            
</script>



