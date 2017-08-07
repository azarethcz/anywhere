<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/navigation-menu.php'; ?>
<?php include_once 'templates/content.php'; ?>
<?php 

    $row = $article->load();
    
    if(isset($_POST['save'])) {
        $title = $valid->checkInput($_POST['article_title']);
        $url  = $valid->deleteDiacritics($valid->validArticleEdit(' ','-',$valid->checkInput($_POST['article_url'])));
        $content = $valid->checkInput($_POST['article_content']);
        $edit = $article->edit($title,$url,$content);
        if($edit) {
            echo '<div class="succesful-message">Příspěvek byl úspěšně upraven.</div>';
        } else {
            echo '<div class="error-message">Došlo k problému s úpravou příspěvku.</div>';
        }
        header("location: editArticle.php?id={$row['id']}");
    }
?>
    <h3>Editovat příspěvek</h3>
    <table class="post-table">
        <form class="news-form" method="POST" action="">
            <tr><td><label>Název příspěvku</label></td></tr>
            <tr><td><input class="input-admin" type="text" name="article_title" value="<?php echo $row['title']; ?>"></td></tr>
            <tr><td><label>URL adresa</label></td></tr>
            <tr><td><input class="input-admin" type="text" name="article_url" value="<?php echo $row['url']; ?>"></td></tr>
            <tr><td><textarea class="mce-editor" name="article_content" placeholder="Obsah článku"><?php echo html_entity_decode($row['content']); ?></textarea></td></tr>
            <tr><td><button class="btn" type="submit" name="save">Uložit příspěvek</button></td></tr>
        </form>
        <?php // print_r($article->load()); ?>
    </table>

<?php include_once 'templates/footer.php'; ?>
