<?php
session_start();

include('../controller/controller_login.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>My Meetic</title>
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/base.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 log_in">
                        <form action="controller/controller_login.php" method="POST" id="log" class="formlog">
                            <div>Login<input type="text" name="login" id="login" class="log_in"></div>
                            <div>Mot de passe<input type="password" name="password" id="password" class="password"></div>
                            <button type="submit" id="log_button" name="log" class="button" value="log">Entrez</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="reponse"></div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-5">
                <h1 id='titre'>Inscription</h1>
                <form action="controller/controller_login.php" method="POST" id="inscription" class="form">
                    <fieldset class="etat-civil">
                        <input type="radio" name="genre" value="0"><label for="Mme"> Mme</label><br>
                        <input type="radio" name="genre" value="1"><label for="Mr"> Mr</label><br>
                        <input type="radio" name="genre" value="2"><label for="Autre"> Autre</label><br><br>
                        <label for="nom">Nom</label>
                        <input id="nom" name="nom" type="text" required><br />
                        <label for="prenom">Prénom ou Pseudo</label>
                        <input id="prenom" name="prenom" type="text" required><br />
                        <label for="date_naissance">Date de naissance</label>
                        <input id="date_naissance" name="date_naissance" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"  required/>
                    </fieldset>


                    <label>Email</label>
                    <input id="email" name="email" type="email" required><br />

                    
                    <label>Ville</label>
                    <input id="ville" name="ville" type="text" required><br>

                    <hr>
                    <label>Mot de passe</label>
                    <input id="mdp" name="mdp" type="text" required><br />
                    
                    <hr>
                    <label for="loisir">Loisirs</label>
                    Qu'est-ce que vous aimez ?<br />
                    <div class="loisir">
                        <input type="checkbox" name="loisirs[]" value="shopping" />
                        Faire du shopping<br />
                        <input type="checkbox" name="loisirs[]" value="sport" />
                        Faire du sport<br />
                        <input type="checkbox" name="loisirs[]" value="theatre" />
                        Aller au théatre<br />
                        <input type="checkbox" name="loisirs[]" value="cinema" />
                        Aller au cinéma<br />
                    </div>
                    <div class="loisir">

                        <input type="checkbox" name="loisirs[]" value="Jeux vidéo" />
                        Jouer aux jeux vidéo<br />
                        <input type="checkbox" name="loisirs[]" value="Chant" />
                        Chant<br />
                        <input type="checkbox" name="loisirs[]" value="Cuisine" />
                        Cuisiner<br />
                        <input type="checkbox" name="loisirs[]" value="Musée" />
                        Aller au musée<br />
                    </div>
                    <div class="loisir">

                        <input type="checkbox" name="loisirs[]" value="Jardinage" />
                        Faire du jardinage<br />
                        <input type="checkbox" name="loisirs[]" value="Bricolage" />
                        Bricoler<br />
                        <input type="checkbox" name="loisirs[]" value="Randonnées" />
                        Faire des randonnées<br />
                        <input type="checkbox" name="loisirs[]" value="Camping" />
                        Camping<br />
                    </div>
                    <div class="loisir">

                        <input type="checkbox" name="loisirs[]" value="Cocooning" />
                        Cocooning<br />
                        <input type="checkbox" name="loisirs[]" value="Voyage" />
                        Faire des voyages<br />
                        <input type="checkbox" name="loisirs[]" value="Yoga" />
                        Pratiquer le yoga<br />
                        <input type="checkbox" name="loisirs[]" value="Lecture" />
                        Lecture<br />
                    </div>

                    <button type="submit" id="inscript" name="add_user" class="button" value="new_user">Valider</button>
                    <input type="checkbox" id="majeur" name="majeur" value="majeur" />
                    Je certifie avoir plus de 18 ans<br />
                </form>

                <div class="col-md-7 aside">
                    
                </div>

            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script type="text/javascript" src="public/scripts/script.js"></script>
</body>

</html>