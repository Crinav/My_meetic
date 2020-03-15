<?php
session_start();
include('../model/model_login.php');


if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $user = new User;
    $resultat = $user->verif_email($email);
        if (!empty($resultat)) {
        echo('Cet email existe déja, veuillez en choisir un autre');
    }
    else{echo "email disponible";}
}

if (!isset($_POST['login']) && isset($_POST['mdp'])) {echo "#####entré ds le if";
    $genre = $_POST['genre'];
    $nom = ucfirst(htmlspecialchars($_POST['nom']));
    $prenom = ucfirst(htmlspecialchars($_POST['prenom']));
    $date_naissance = $_POST['date_naissance'];
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $ville = ucfirst(htmlspecialchars($_POST['ville']));
    $loisir = $_POST['loisirs'];
    
    $password_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $user = new User;
    $resultat = $user_connexion->verif_email($email);
    $last_id = $user->insert($genre, $nom, $prenom, $date_naissance, $email, $password_hash, $ville);
    $user->insert_loisir($last_id, $loisir);
    setcookie($email, $last_id, time() + 3600 * 60 * 365);
    $_SESSION['prenom']=ucfirst($prenom);
    $_SESSION[$last_id]=$email;
    $_SESSION[$email]=$email;
    $_SESSION['genre'] = $genre;
    $_SESSION['id']=$last_id;
    $_SESSION['date_naissance'] = $resultat[0]['date_naissance'];
    $_SESSION['email'] = $resultat[0]['email'];
    $_SESSION['nom'] = ucfirst($resultat[0]['nom']);
    $_SESSION['ville'] = ucfirst($resultat[0]['ville']);
    $_SESSION['loisirs'] = $loisir;
}

if (isset($_POST['login']) && isset($_POST['password'])) {echo 'entré ds le log';
    $email = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $user_connexion = new User($email);
    $resultat = $user_connexion->verif_email($email);
    
    if(isset($resultat)){print_r($resultat);
        $password_hash = $resultat[0]['mdp'];
        if (password_verify($password, $password_hash)) {
            echo 'Le mot de passe est valide !';
            if($resultat[0]['email'] == $email){echo "le mail est bon";
                $_SESSION['id']= $resultat[0]['id_user'];
                $_SESSION[$resultat[0]['id_user']] = $resultat[0]['email'];
                $_SESSION['genre'] = $resultat[0]['genre'];
                $_SESSION[$email]=$email;
                $_SESSION['prenom'] = ucfirst($resultat[0]['prenom']);
                $date = date("Y-m-d");echo $date;
                $_SESSION['date_naissance'] = $resultat[0]['date_naissance'];
                $_SESSION['email'] = $resultat[0]['email'];
                $_SESSION['nom'] = ucfirst($resultat[0]['nom']);
                $_SESSION['ville'] = ucfirst($resultat[0]['ville']);
                $hobbies = $user_connexion->loisir($resultat[0]['id_user']);
                
                $_SESSION['loisirs'] = $hobbies;
                (isset($_COOKIE[$email])) ?: setcookie($email, $resultat[0]['id_user'], time() + 3600 * 60 * 365);
                header('location: ../vue/search.php');
                die();
            }
            else{
                $message = "Cet email ou ce mot de passe est erronné...";
                echo "<script>alert($message)</script>";
            }
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
    else{
        echo $message;
        
    }

    
}
