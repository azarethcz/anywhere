<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/cms/vendor/autoload.php';
    session_start();
    
    use CMS\Database\Connection,
        CMS\User\User,
        CMS\User\Profile,
        CMS\Article\Article,
        CMS\Form\Validation,
        CMS\Bootstrap;
    
    $database = new Connection();
    $user = new User($database);
    $article = new Article($database);
    $valid = new Validation();
    $profile = new Profile($database);
    
    if(isset($_GET['logout'])) {
        $user->logout();
    } 
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
        <link rel="stylesheet" href="<?php Bootstrap::ADMIN_URL ?>css/admin.css">
        <script src="<?php Bootstrap::ADMIN_URL ?>plugins/tinymce/tinymce.js"></script>
        <script src="<?php Bootstrap::ADMIN_URL ?>plugins/tinymce/init-tinymce.js"></script>
    </head>
    <body>
    <div id="main" class="layout-column-main">
        <div class="admin-bar clearfix">
            <a class="logo-wrapper" href="" title="Anywhere System"><span class="logo-system"></span></a>
                <ul class="admin-bar-ul">
                    <li class="admin-bar-list-li">
                        <div class="admin-bar-list-inside">
                            <span class="login-link">Přihlášen: <?php echo $_SESSION['username']; ?></span>
                            <span class="person-icon"></span>
                        </div>
                    </li>
                    <li class="admin-bar-list-li">
                        <a href="?logout" class="admin-bar-list-inside">Odhlásit se</a>
                    </li>
                    <li class="admin-bar-list-li">
                        <a class="admin-bar-list-inside" href="#">Hlávní stránka</a>
                    </li>
                </ul>
        </div>
        <div class="flex-column">
