<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/navigation-menu.php'; ?>
<?php include_once 'templates/content.php'; ?>
    <?php 
        if(isset($_POST['save'])) {
            $title = $valid->checkInput($_POST['article_title']);
            $url  = $valid->deleteDiacritics($valid->validArticleEdit(' ','-',$valid->checkInput($_POST['article_url'])));
            $content = $valid->checkInput($_POST['article_content']);
            $create = $article->create($title,$url,$content);
            if($create) {
                echo '<div class="succesful-message">Příspěvek byl úspěšně vytvořen.</div>';
            } else {
                echo '<div class="error-message">Došlo k problému s vytvořením příspěvku.</div>';
            }
        }
    ?>
    <h3>Vytvořit příspěvek</h3>
    <table class="post-table">
        <form class="news-form" method="POST" action="">
            <tr><td><label>Název příspěvku</label></td></tr>
            <tr><td><input class="input-admin" type="text" name="article_title" value="" required ></td></tr>
            <tr><td><label>URL adresa</label></td></tr>
            <tr><td><input class="input-admin" type="text" name="article_url" value="" required></td></tr>
            <tr><td><textarea class="mce-editor" name="article_content" placeholder="Obsah článku"></textarea></td></tr>
            <tr><td><button class="btn" type="submit" name="save">Uložit příspěvek</button></td></tr>
        </form>
    </table>
<?php include_once 'templates/footer.php'; ?>




