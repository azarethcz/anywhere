<?php 
    if($user->isLoggedIn()) { ?>
        <div class="column-flex-left">
                <ul class="navigation-menu list-reset">
                    <li>
                        <a class="icon-page-news" href="">
                            <span>Novinky</span>
                        </a>
                        <span></span>
                    </li>
                    <li>
                        <a class="icon-page-account" href="profile.php">
                            <span>Účet</span>
                        </a>
                        <span></span>
                        <ul class="navigation-submenu">
                            <li><a href="editProfile.php">Upravit účet</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="icon-page-account" href="articles.php">
                            <span>Obsah</span>
                        </a>
                        <span></span>
                        <ul class="navigation-submenu">
                            <li><a href="viewArticles.php">Zobrazení článků</a></li>
                            <li><a href="createArticle.php">Přidat Článek</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="icon-page-moduls" href="">
                            <span>Moduly</span>
                        </a>
                        <span></span>
                    </li>
                    <li>
                        <a href="" class="icon-page-contacts">
                            <span>Kontakt</span>
                        </a>
                        <span></span>
                    </li>
                </ul>       
            </div>
 <?php 
    } else {
        return header('Location: login.php');
    }
 ?>
            
