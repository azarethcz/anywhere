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
                        <a class="admin-bar-list-inside" href="">Hlávní stránka</a>
                    </li>
                </ul>
        </div>
        <div class="flex-column">
<?php include_once 'templates/content.php'; ?>
<?php 
    
    if(isset($_POST['login'])) {
        $username = $valid->checkInput($_POST['username']);
        $password = $valid->checkInput($_POST['password']);
        $login = $user->login($username, $password);
            if($login) {
                header('location: index.php');
            } else {
                echo '<div class="error-message">Uživatelské jméno nebo heslo neodpovídá.</div>';
            }
    }
?>
<form class="form_align" method="post" action="">
    <input class="input-login-reg" type="text" name="username" placeholder="&nbsp;&nbsp;Uživatelské jméno" required />
    <input class="input-login-reg" type="password" name="password" placeholder="&nbsp;&nbsp;Zadejte vaše heslo" required />
    <button class="btn-login-reg" type="submit" name="login">Přihlásit se</button>
</form>
<?php include_once 'templates/footer.php'; ?>
