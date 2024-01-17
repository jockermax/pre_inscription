<?php
if (isset($_POST['submit'])) {
   
    $name=$_POST['nom'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $phone=$_POST['phone'];
    $date = date("Y-m-d");
    $sql="INSERT INTO utilisateur(nom,password,email,date_ins,num_telephone) VALUES (:nom,:pwd,:email,:date,:phone) ";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(["nom"=> $name,"email"=>$email,"pwd"=>password_hash($pwd, PASSWORD_DEFAULT),"date"=>$date,"phone"=>$phone]);
    echo"inscription reussie";   
}
?>
