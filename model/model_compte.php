<?php
//include ('../controller/controller_compte.php');
class Member{


    function update_compte_user($id, $col, $value ){
        try{
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            $requete = "UPDATE compte_user SET $col = :valeur WHERE id_user = :id";
            $prepare = $dbconnect->prepare("".$requete."");
            $prepare->bindParam(':valeur', $value, PDO::PARAM_STR);
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $last_id = $dbconnect->lastInsertId();
            return $last_id;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }    
    function update_hobbies($id, $value){
        try{print_r($value);print_r($id);
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = "INSERT INTO hobbies VALUES (:id, :loisir)";
            $prepare = $dbconnect->prepare("".$requete."");
            $prepare->bindParam(':loisir', $value, PDO::PARAM_STR);
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $last_id = $dbconnect->lastInsertId();
            $dbconnect =null;
            return $last_id;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }  
    function delete_loisir($id){
        try{
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            $requete = "DELETE FROM hobbies WHERE id_user = $id";
            $prepare = $dbconnect->prepare("".$requete."");
            $prepare->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    }  
    function delete_user($id){
        try{
            $server = 'localhost';
            $db = 'meetic';
            $user = 'root';
            $pass = 'noel167';
            $dbconnect = new PDO("mysql:host=$server;dbname=$db;charset=UTF8", $user, $pass);
            $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            $requete = "UPDATE compte_user SET actif = 0 WHERE id_user = $id";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    }
}
