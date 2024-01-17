<?php
if (isset($_POST['login'])) {
    session_start();
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $sql="SELECT * FROM utilisateur WHERE email= ?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($pwd,$user['password'])){
        //Authentification réussie
        
    session_start();
        $_SESSION['email'] =$user['email'];
        $_SESSION['nom'] =$user['nom'];
        $_SESSION['id'] =$user['id'];
        header('Location:index.php');
        exit;
    }else{
        //Authentification échouée
        $error = "nom d'utilisateur ou mot de passe incorrect.";
    }


}
?>

