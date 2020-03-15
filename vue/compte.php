<?php
session_start();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>My Meetic</title>
    <link rel="stylesheet" href="../public/css/compte.css">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">

    <script src="../public/scripts/jquery-3.4.1.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="compte">
                            Mon compte</div>
                        <div class="cache compte">
                            <ul>
                                <li><a href="compte.php">Mon profil</a></li>
                                <li><a href="search.php">Recherche</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 login">
                        <?php (!isset($_SESSION['prenom'])) ?: $prenom = $_SESSION['prenom'];
                        echo 'Bienvenue ' . $prenom; ?>
                    </div>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="container">
            <div class="row">
                <h1 id='titre_compte'>Mes informations</h1>
                <div class="sous-titre">
                    <h4>Veuillez remplir les champs que vous souhaitez mettre à jour</h4>
                </div>
                <div class="col-md-3">
                    <div class='hobbies'>
                        Je suis <?php switch ($_SESSION['genre']) {
                                    case 0:
                                        echo 'une Femme';
                                        break;
                                    case 1:
                                        echo 'un Homme';
                                        break;
                                    case 2:
                                        echo 'du 3ième sexe';
                                        break;
                                } ?><br>
                        <b> Mon Nom : </b>&nbsp&nbsp&nbsp<?php echo $_SESSION['nom']; ?><br>
                        <b> Mon Prénom :</b>&nbsp&nbsp&nbsp&nbsp <?php echo $_SESSION['prenom']; ?><br>
                        <b> Ma date de naissance : </b><?php $T = explode('-', $_SESSION['date_naissance']);
                                                        $age = date('Y') - $T[0];
                                                        if (date('md') < $T[1] . $T[2]) $age--;
                                                        echo $age; ?><br>
                        <b> Mon Email : </b>&nbsp&nbsp&nbsp<?php echo $_SESSION['email']; ?><br>
                        <b>J'habite : </b>&nbsp&nbsp<?php echo $_SESSION['ville']; ?><br>
                        <b> Loisirs : </b><br><?php foreach ($_SESSION['loisirs'] as $value) {
                                                    echo $value; ?><br><?php } ?>

                    </div>
                </div>
                <div class="col-md-9">

                    <form action="../controller/controller_compte.php" method="POST" id="change_info" class="form">
                        <fieldset class="etat-civil">
                            <input type="radio" name="genre" value="0"><label for="Mme">&nbsp; Mme</label><br>
                            <input type="radio" name="genre" value="1"><label for="Mr">&nbsp; Mr</label><br>
                            <input type="radio" name="genre" value="2"><label for="Autre">&nbsp; Autre</label><br>
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" type="text"><br />
                            <label for="prenom">Prénom ou Pseudo</label>
                            <input id="prenom" name="prenom" type="text"><br />
                            <label for="date_naissance">Date de naissance</label>
                            <input id="date_naissance" name="date_naissance" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                        </fieldset>

                        <label>Email</label>
                        <input id="email" name="email" type="email"><br />

                        
                        <label>Ville</label>
                        <input id="ville" name="ville" type="text"><br>
                        <hr>
                        <form>
                            <label>Mot de passe</label>
                            <input id="mdp" name="mdp" type="text"><br />
                            
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
                            <button type="submit" id="change" name="change" class="change" value="change">Changer</button>
                        </form>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <div>

        </div>
    </footer>
    <script src="../public/scripts/script.js"></script>
</body>

</html>