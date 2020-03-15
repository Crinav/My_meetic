<?php

class User {
    private $dbconnect;
    
    function verif_email($email){
        try{
        $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            $requete = "SELECT  * FROM compte_user WHERE email = :email ";
            $prepare = $dbconnect->prepare("".$requete."");
            $prepare->bindParam(':email', $email, PDO::PARAM_STR);
            $prepare->execute();
            $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    function insert($genre, $nom, $prenom, $date_naissance,$email, $password_hash, $ville){echo 'inscription';
       try{
        $server = 'localhost';
        $db = 'meetic';
        $user = 'root';
        $pass = 'noel167';
        $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        $requete = "INSERT INTO compte_user (genre, nom, prenom, date_naissance, email, mdp, ville) VALUES (:genre, :nom, :prenom, :date_naissance,:email, :password_hash, :ville)";
        $prepare = $dbconnect->prepare("".$requete."");
        $prepare->bindParam(':nom', $nom, PDO::PARAM_STR);
        $prepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $prepare->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
        $prepare->bindParam(':email', $email, PDO::PARAM_STR);
        $prepare->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $prepare->bindParam(':ville', $ville, PDO::PARAM_STR);
        $prepare->bindParam(':genre', $genre, PDO::PARAM_INT);
        $prepare->execute();
        $last_id = $dbconnect->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    }
    function insert_loisir($last_id, $loisir){
        try{echo 'insertloisir';
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        foreach($loisir as &$value){
        $requete = "INSERT INTO hobbies (id_user, loisir) VALUES(:last_id, :valeur)";
        $prepare = $dbconnect->prepare("".$requete."");
        $prepare->bindParam(':last_id', $last_id, PDO::PARAM_INT);
        $prepare->bindParam(':valeur', $value, PDO::PARAM_STR);
        $prepare->execute();
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    }
    function loisir($id){
        try{
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            $requete = "SELECT loisir FROM hobbies WHERE id_user = :id";
            $prepare = $dbconnect->prepare("".$requete."");
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $array=[];//$resultat = $prepare->fetch();
            while($row = $prepare->fetch()){
                array_push($array, $row['loisir']);}
                return $array;
        } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        } 
    }
   
}
?>