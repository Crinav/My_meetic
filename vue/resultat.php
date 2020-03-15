<?php
session_start();

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>My Meetic</title>
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
                            <a href="#">Mon compte</a></div>
                        <div class="cache compte">
                            <ul>
                                <li><a href="../vue/compte.php">Mon profil</a></li>
                                <li><a href="../vue/search.php">Recherche</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 login">
                        <?php (!isset($_SESSION['prenom'])) ?: $prenom = $_SESSION['prenom'];
                        echo 'Bienvenue ' . $prenom; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="container">
            <div class="row">
                <h1 id="search_titre">Ma recherche</h1><br>
                <div class="col-md-12 slide">
                    <form action="../controller/controller_search.php" method="POST" id="recherche" class="form">

                        <fieldset class="search_field">
                            <label>Par genre : </label>
                            <select name="genre">
                                <option value=""></option>
                                <option value="1">Homme</option>
                                <option value="0">Femme</option>
                                <option value="2">Autre</option>
                            </select>
                            <label>Par Prénom : </label>
                            <input id="prenom" name="prenom" type="text">
                            <label>Par Ville : </label>
                            <input id="ville" name="ville" type="text">
                            <label>Par tranche d'age : </label>
                            <select name="age">
                                <option value="18-25">18-25</option>
                                <option value="25-35">25-35</option>
                                <option value="35-45">35-45</option>
                                <option value="+45">+45</option>
                            </select>
                        </fieldset>
                        <div class="loisirs">
                            <label for="loisir">Par loisirs : </label>
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
                        </div><br><br>
                        <button type="submit" id="search" name='search' class="button" value="result">Trouver</button>
                    </form>
                </div>

            </div>
        </div>
        
    </main>
    <footer>
    <div class="container">
            <div class="row">
            <div class="col-md-4 slide"></div>
                <h1 id="result_titre">Résultats</h1><br>
                <div class="col-md-4 slide">
                    <div class="resultat">

                        <?php
                        if ($resultat) {
                        ?><div>Genre : &nbsp;<?php
                        switch ($resultat[0]['genre']) {
                            case 0:
                                echo 'Femme';
                                break;
                            case 1:
                                echo 'Homme';
                                break;
                            case 2:
                                echo '3ième sexe';
                                break;
                        } 
                        ?><br>Prénom : &nbsp;<?php
                         print_r($resultat[0]['prenom']);?><br>Age : &nbsp;<?php
                         $T = explode('-', $resultat[0]['date_naissance']);
                                                        $age = date('Y') - $T[0];
                                                        if (date('md') < $T[1] . $T[2]) $age--;
                                                        echo $age." ans";
                         ?><br>Ville : &nbsp;<?php
                         print_r($resultat[0]['ville']);?><br>Loisirs : &nbsp;<br><?php
                         foreach($resultat as $key => $value){
                             
                                 echo $value['loisir'];?><br><?php
                             }
                         
                         print_r($resultat[0]['loisir']);
                        ?></div><?php
                                                                        }
                                                                            
                           
                                 ?>
                    </div>
                </div>
                <div class="col-md-4 slide"></div>
            </div>
        </div>
    </footer>
    <script src="../public/scripts/script.js"></script>
</body>

</html>