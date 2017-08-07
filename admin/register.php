<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/cms/vendor/autoload.php'; 
    session_start();
    
    use CMS\Database\Connection,
        CMS\User\User,
        CMS\Form\Validation;
    
    $database = new Connection;
    $user = new User($database);
    $valid = new Validation;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scal=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>| Anywhere.cz</title>
        <link rel="stylesheet" href="../admin/css/admin.css">
        <script src="../admin/js/tinymce/tinymce.js"></script>
        <script src="../admin/js/tinymce/init-tinymce.js"></script>
    </head>
    <body>
    <div id="main" class="layout-column-main">
        <div class="admin-bar clearfix">
            <a class="logo-wrapper" href="" title="Anywhere System"><span class="logo-system"></span></a>
                <ul class="admin-bar-ul">
                    <li class="admin-bar-list-li">
                        <a href="login.php" class="admin-bar-list-inside">Přihlášení</a>
                    </li>
                    <li class="admin-bar-list-li">
                        <a href="register.php" class="admin-bar-list-inside">Registrace</a>
                    </li>
                    <li class="admin-bar-list-li">
                        <a class="admin-bar-list-inside" href="../index.php">Hlávní stránka</a>
                    </li>
                </ul>
        </div>
        <div class="flex-column">
<?php include_once 'templates/content.php'; ?>
<?php 
    if(isset($_POST['register'])){  
        $username = $valid->checkInput($_POST['username']);
        $email = $valid->checkInput($_POST['email']);
        $password = $valid->checkInput($_POST['password']);
        $confirm_password = $valid->checkInput($_POST['confirm_password']);
        if ($user->checkPassword($password,$confirm_password)){
            $register = $user->create($username,$email,$password);
            if($register) {
                header("location: login.php?registered=true");
            }
        } else {
            echo '<div class="error-message">Hesla se neshodují</div>';
        }
    } 
?>
<form method="post" action="" class="form_align">
    <input class="input-login-reg" type="text" name="username" placeholder="&nbsp;&nbsp;Uživatelské jméno" required />
    <input class="input-login-reg" type="email" name="email" placeholder="&nbsp;&nbsp;Zadejte váš email" required />
    <input class="input-login-reg" type="password" name="password" placeholder="&nbsp;&nbsp;Zadejte vaše heslo" required />
    <input class="input-login-reg" type="password" name="confirm_password" placeholder="&nbsp;&nbsp;Potvrďte vaše heslo" required />
    <button class="btn-login-reg" type="submit" name="register">Zaregistrovat se</button>
</form>
<?php include_once 'templates/footer.php'; ?>

