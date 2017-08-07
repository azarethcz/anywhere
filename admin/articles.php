<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/navigation-menu.php'; ?>
<?php include_once 'templates/content.php'; ?>
<table class="standard-table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Titulek</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($article->show() as $articles) { ?>
        <tr><td><?php echo $articles['id']?></td><td><?php echo $articles['title']?></td><td><a href="editArticle.php?id=<?php echo $articles['id'];?>" class="btn-table">EDITOVAT</a></td><td><a href="viewArticles.php" class="btn-table">ZOBRAZIT</a></td></tr>
    </tbody>
<?php } ?>
</table>

<?php include_once 'templates/footer.php'; ?>




