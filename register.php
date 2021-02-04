


<?php
require_once 'inc/functions.php';
session_status();
if(!empty($_POST)){

    $errors = array();
    require_once 'inc/db.php';
    
    if(empty($_POST['username'])|| !preg_match('/^[a-zA-z0-9_]+$/' , $_POST['username'])){

        $errors['username']= "Votre pseudo n'est pas Valide (alphanumérique) ";

    }else{
        
        $req=$pdo->prepare('SELECT id FROM users WHERE username=?');
        $req->execute([$_POST['username']]);
        $user=$req->fetch();
       
       if($user){
       $errors['username']='Ce pseudo est dejà pris';
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email']="Votre adresse email n'est pas valide";


    }else{
        
        $req=$pdo->prepare('SELECT id FROM users WHERE email=?');
        $req->execute([$_POST['email']]);
        $user=$req->fetch();
       
       if($user){
       $errors['email']='Cet email est dejà  utiliser pour un autre compte';
        }
    }

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password']= "Vous devez rentrer un mot de passe valide";
    }

    if(empty($errors)){
       

        $req=$pdo->prepare ("INSERT INTO users SET username = ?, password =?,email =?,confirmation_token=?");
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token=str_random(60);
        
        $req->execute([$_POST['username'],  $password, $_POST['email'], $token]);
        $user_id=$pdo->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/form/confirm.php?id=$user_id&token=$token");
        $_SESSION['flash']['success']='Un email de confirmation vous a été envoyé pour valider votre compte';
        header('location:login.php');
        exit();

    }


    
    
    

    
}
    




/*if(!empty($_POST)){

    //$errors = array();

    require_once 'inc/db.php';

    if(empty($_POST['username']) || !preg_match('/^[a-zA-z0-9_]+$/' , $_POST['username'])){

        $errors['username']= "Votre pseudo n'est pas Valide (alphanumérique) ";


    }else{

        $req=$pdo->prepare('SELECT id FROM users WHERE username=?');
        $req->execute([$_POST['username']]);
        $user=$req->fetch();
        //debug($user);
        //die();
        if($user){
            $errors['username']='Ce pseudo est dejà pris';
        }
    }


    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email']="Votre adresse email n'est pas valide";
    }else{

        $req=$pdo->prepare('SELECT id FROM users WHERE email=?');
        $req->execute([$_POST['email']]);
        $user=$req->fetch();
        //debug($user);
        //die();
        if($user){
            $errors['email']='Cet email est dejà utilisé pour un autre compte';
        }
    }


    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password']= "Vous devez rentrer un mot de passe valide";
    }

    if(empty($errors)){


   

   
   $token= str_random(60);
   debug($token);
   die();
   $req -> execute ([$_POST['username'], $password, $_POST['email'], $token]);
   $user_id=$pdo->lastInsertId();
   mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votrev compte merci de cliquer sur ce lien\n\nhttp://localhost/form/register.php?id=$user_id&token=$token");
   header('Location:login.php');
   exit();
  
   
}
debug($errors);

}

*/

?>

<?php require 'inc/header.php';?>


<h1>S'inscrire</h1>

<?php if(!empty($errors)):?>

<div class="alert alert-danger">
<p>Vous n'avez pas remplir le formulaire correctement</p>

<ul>

<?php foreach($errors as $error):?>

<li><?= $error; ?></li>

<?php endforeach;?>

</ul>
</div>

<?php endif;?>

<form method="POST" action="">

<div class="form-group">

   <label for="">Pseudo</label>
   <input type="text" name="username" class="form-control" >

</div>

<div class="form-group">

   <label for="">Email</label>
   <input type="email" name="email" class="form-control" >
   
</div>

<div class="form-group">

   <label for="">Mot de passe</label>
   <input type="password" name="password" class="form-control" >
   
</div>

<div class="form-group">

   <label for="">Confirmez votre mot de passe</label>
   <input type="password" name="password_confirm" class="form-control" >
   
</div>

<button type="submit" class="btn btn-primary">M'inscrire</button>

</form>

<?php require 'inc/footer.php';?>