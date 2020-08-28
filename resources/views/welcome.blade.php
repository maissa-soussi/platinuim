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
                    <div class="overlay-left"> 
                        <img alt="Vue logo" src="assets/logo.png">
                        <button class="invert" onclick="switchLogin()">Se connecter</button>
                    </div>
                    <div class="overlay-right"> 
                        <img alt="Vue logo" src="assets/logo.png">
                        <button class="invert" onclick="switchLogin()">S'inscrire</button>
                    </div>
                </div>
            </div>
            <!-- formulaire de creation de compte -->
            <form class="sign-up" action="#" v-if="signUp">
                <h2> Creation de compte </h2>
                <div> Utilisez votre email pour registration</div>
                <input type="text"  placeholder="Pseudo" />
                <input type="email"  placeholder="Email" /> 
                <input type="password"  placeholder="Mot de passe" />
                <button>S'inscrire</button>
            </form>
             <!-- formulaire de connexion -->
            <form class="sign-up" action="#" v-else>
                <h2> Connexion </h2>
                <div> Entrez vos coordonnées </div>
                <input type="text" v-model="pseudo" placeholder="Pseudo" /> 
                <input type="password" v-model="password" placeholder="Mot de passe" />
                <a href="#"> Mot de passe oublié ?</a>
                <button>Se connecter</button>
            
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



