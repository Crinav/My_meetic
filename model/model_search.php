<?php
class Test
{
    public function search($genre, $prenom, $array_age, $ville, $array_loisir)
    {
        try {
            $requete = "SELECT * FROM compte_user INNER JOIN hobbies USING(id_user) WHERE ";
            $premier_critere  = true;
            if ($array_age['max_age'] !== null) {
                $max_age = $array_age['max_age'];
                $requete .= "date_naissance BETWEEN " . " ' " . $max_age . " ' ";
            }
            if ($array_age['min_age'] !== null) {
                $min_age = $array_age['min_age'];
                $requete .= " AND " . " ' " . $min_age . " ' ";
            }
            if ($genre !== null) {
                if (!$premier_critere) {
                    $requete .= " AND ";
                    $premier_critere = false;
                }
                $requete .= " genre = " . $genre;
            }
            if ($prenom !== null) {
                if (!$premier_critere) {
                    $requete .= " AND ";
                    $premier_critere = false;
                }
                $requete .= " prenom = " . " ' " . $prenom . " ' ";
            }
            if ($ville !== null) {
                if (!$premier_critere) {
                    $requete .= " AND ";
                    $premier_critere = false;
                }
                $requete .= " ville = " . " ' " . $ville . " ' ";
            }
            if (!empty($array_loisir)) {
                $req_suite = " AND hobbies.id_user IN (id_user) ";
                $premier_critere = true;
                foreach ($array_loisir as $value) {
                    if (!$premier_critere) {
                        $req_suite .= " OR ";
                    }
                    $req_suite .= "loisir = " . " ' " . $value . " ' ";
                    $premier_critere = false;
                }
            }
            $requete .= $req_suite;
            echo $requete;

            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $prepare = $dbconnect->prepare("" . $requete . "");
            return $requete;
            //$prepare->execute();
            //$resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            //return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function multisearch($array, $array_loisir)
    {
        $requete = "SELECT * FROM compte_user INNER JOIN hobbies USING(id_user) WHERE ";
        $premier_critere  = true;
        if ($array['prenom'] !== null) {
            $prenom = $array['prenom'];
            if (!$premier_critere) {
                $requete .= " AND ";
                $premier_critere = false;
            }
            $requete .= " prenom = " . " ' " . $prenom . " ' ";
        }
        if ($array['ville'] !== null) {
            $ville = $array['ville'];
            if (!$premier_critere) {
                $requete .= " AND ";
                $premier_critere = false;
            }
            $requete .= " ville = " . " ' " . $ville . " ' ";
        }
        if ($array['genre'] !== null) {
            $genre = $array['genre'];
            if (!$premier_critere) {
                $requete .= " AND ";
                $premier_critere = false;
            }
            $requete .= " genre = " . $genre;
        }
        if ($array['max_age'] !== null) {
            $max_age = $array['max_age'];
            if (!$premier_critere) {
                $requete .= " AND ";
                $premier_critere = false;
            }
            $requete .= " AND date_naissance BETWEEN " . " ' " . $max_age . " ' ";
        }
        if ($array['min_age'] !== null) {
            $min_age = $array['min_age'];
            $requete .= " AND " . " ' " . $min_age . " ' ";
        }
        if (!empty($array_loisir)) {
            $req_suite = "  ";
            $premier_critere = true;
            foreach ($array_loisir as $value) {
                if (!$premier_critere) {
                    $req_suite .= " AND ";
                }
                $req_suite .= "loisir = " . " ' " . $value . " ' ";
                $premier_critere = false;
            }
        }

        $requete .= $req_suite;

        $server = 'localhost';
        $db = 'meetic';
        $user = 'root';
        $pass = 'noel167';
        $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $prepare = $dbconnect->prepare("" . $requete . "");
        $prepare->execute();
        $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
}
class Search
{
    public function prenom($prenom, $array)
    {
        try {
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';

            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "SELECT genre,prenom, date_naissance, ville, loisir FROM compte_user INNER JOIN hobbies USING(id_user) WHERE prenom = :valeur AND hobbies.id_user IN (id_user) AND date_naissance BETWEEN :min_age AND :max_age";
            $prepare = $dbconnect->prepare("" . $requete . "");
            $prepare->bindParam(':min_age', $array['max_age'], PDO::PARAM_STR);
            $prepare->bindParam(':max_age', $array['min_age'], PDO::PARAM_STR);
            $prepare->bindParam(':valeur', $prenom, PDO::PARAM_STR);
            $prepare->execute();
            $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function genre($genre, $array)
    {
        try {
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';

            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "SELECT genre,prenom, date_naissance, ville, loisir FROM compte_user INNER JOIN hobbies USING(id_user) WHERE genre = :valeur AND hobbies.id_user IN (id_user) AND date_naissance BETWEEN :min_age AND :max_age";
            $prepare = $dbconnect->prepare("" . $requete . "");
            $prepare->bindParam(':min_age', $array['max_age'], PDO::PARAM_STR);
            $prepare->bindParam(':max_age', $array['min_age'], PDO::PARAM_STR);
            $prepare->bindParam(':valeur', $genre, PDO::PARAM_INT);
            $prepare->execute();
            $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function ville($ville, $array)
    {
        try {
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';

            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "SELECT genre,prenom, date_naissance, ville, loisir FROM compte_user INNER JOIN hobbies USING(id_user) WHERE ville = :valeur AND hobbies.id_user IN (id_user) AND date_naissance BETWEEN :min_age AND :max_age";
            $prepare = $dbconnect->prepare("" . $requete . "");
            $prepare->bindParam(':min_age', $array['max_age'], PDO::PARAM_STR);
            $prepare->bindParam(':max_age', $array['min_age'], PDO::PARAM_STR);
            $prepare->bindParam(':valeur', $ville, PDO::PARAM_STR);
            $prepare->execute();
            $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function loisir($array_loisir, $array)
    {
        $requete = "SELECT genre,prenom, date_naissance, ville, loisir FROM compte_user INNER JOIN hobbies USING(id_user) WHERE ";
        if (!empty($array_loisir)) {
            
            $premier_critere = true;
            foreach ($array_loisir as $value) {
                if (!$premier_critere) {
                    $requete.= " OR ";
                }
                $requete .= "loisir = " . " '" . $value . "' ";
                $premier_critere = false;
            }
        }
        $requete .= " AND date_naissance BETWEEN :min_age AND :max_age group by id_user";
        
        
        try {
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';

            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $prepare = $dbconnect->prepare("" . $requete . "");
            $prepare->bindParam(':min_age', $array['max_age'], PDO::PARAM_STR);
            $prepare->bindParam(':max_age', $array['min_age'], PDO::PARAM_STR);
            
            $prepare->execute();
            $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
