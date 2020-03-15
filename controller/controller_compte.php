<?php
session_start();
include ('../model/model_compte.php');

if (!empty($_POST)){
    $array =[];
    print_r($_SESSION);
    $id = $_SESSION['id'];
    (empty($_POST['genre'])) ?  : $array['genre'] = $_POST['genre'];   
    (empty($_POST['nom'])) ? : $array['nom'] =htmlspecialchars($_POST['nom']);
    (empty($_POST['prenom'])) ? :  $array['prenom']  =htmlspecialchars($_POST['prenom']);  
    (empty($_POST['date_naissance'])) ? : $array['date_naissance'] = $_POST['date_naissance'];  
    (empty($_POST['email'])) ? : $array['email']  =htmlspecialchars($_POST['email']);  
    (empty($_POST['mdp'])) ? :  $array['mdp'] =password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
    (empty($_POST['ville'])) ? : $array['ville']  =htmlspecialchars($_POST['ville']);
       
    $member = new Member;
    foreach($array as $key => $value){
        if(!empty($value)){echo $id; echo $key; echo $value;
            $member->update_compte_user($id, $key, $value);
        }
    }
    if(!empty($_POST['loisirs'])){
          $member ->delete_loisir($id);
          foreach($_POST['loisirs'] as $key => $value){
            $member->update_hobbies($id, $value);
              
          }
    }
}
if($_POST['user'] == 'delete'){
    $member->delete_user($id);
}
