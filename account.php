
<?php 


require 'inc/functions.php';

yaya_est_la();
if(!empty($_POST)){
    if(empty($_POST['password']) || $_POST['password'] !=$_POST['password_confirm']){
        $_SESSION['flash']['danger']="Les mots de passe ne correspondent pas";
    }else{
        $user_id=$_SESSION['auth']->id;
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET password=?')->execute([$password]);
        $_SESSION['flash']['success']="Votre mot de passe a bien été mis a jour";
     
    }
}




 require 'inc/header.php';?>

<h1>Bonjour <?=$_SESSION['auth']->username;?></h1>


<form action="" method="POST">

<div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe">
</div>
<div class="form-group">
<input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe">
</div>

<button class="btn btn-primary">CHANGER DE MOT DE PASSE</button>

</form>


<?php require 'inc/footer.php';?>