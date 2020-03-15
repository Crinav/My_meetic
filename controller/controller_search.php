<?php
session_start();
include ('../model/model_search.php');    
 
 if($_POST['search'] == 'result'){
    (empty($_POST['prenom'])?$prenom = null:$prenom =ucfirst(htmlspecialchars($_POST['prenom'])));
    (empty($_POST['ville'])?$ville = null:$ville =ucfirst(htmlspecialchars($_POST['ville'])));
    ($_POST['genre'] !== 1 || $_POST['genre'] !== 0 || $_POST['genre'] !== 2 ? $genre = null : $genre = $_POST['genre']);
    if(!empty($_POST['loisirs'])){
        $array_loisir = [];
        $loisir = $_POST['loisirs'];
        
       for($i = 0; $i < count($loisir) ;$i++){
           foreach($loisir as $value){
              
                $array_loisir[$value] = $value;
           }
       }
      print_r($array_loisir);
    }
    else{
        $array['loisirs'] = null;
    }
    if(!empty($_POST['age'])){
        $min_age = substr($_POST['age'], 0, 2);
        $max_age = substr($_POST['age'], 3,2);
        $date = date('Y-m-d');
        $date= substr($date, 0, 4); 
        if($_POST['age'] =="+45"){
            $min_age = $date - 45;
            $max_age = $date - 100;
            $min_age = $min_age."-12-31";
            $max_age = $max_age."-01-01";
            $array['min_age'] = $min_age;
            $array['max_age'] = $max_age;
        }
        else{
        $min_age = $date - $min_age;
        $max_age = $date - $max_age;
        $min_age = $min_age."-12-31";
        $max_age = $max_age."-01-01";
        $array['min_age'] = $min_age;
        $array['max_age'] = $max_age;
        } 
    }
    else{
        $array['min_age'] = null;
        $array['max_age'] = null;
    }
    $user = new Search;
    (empty($prenom))?:$resultat = $user->prenom($prenom, $array);
    (empty($ville))?:$resultat = $user->ville($ville, $array);
    (empty($genre))?:$resultat = $user->genre($genre, $array);
    (empty($array_loisir))?:$resultat = $user->loisir($array_loisir, $array);
    
    
    include ('../vue/resultat.php');
    
   
}
class caroussel{
    function affiche(){

    }
}
?>