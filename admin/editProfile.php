<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/navigation-menu.php'; ?>
<?php include_once 'templates/content.php'; ?>
<?php
    $row = $user->load();
    
    if(isset($_POST['save'])) {
        $username = $_POST['username'];
        $email  = $_POST['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $verifypassword = $_POST['verifypassword'];
        if(!empty($oldpassword && $newpassword && $verifypassword)){
            if($newpassword == $verifypassword) {
                $update = $user->update($username,$email,$oldpassword,$newpassword,$verifypassword);
                header("location: editProfile.php");
            } else {
                echo '<div class="error-message">Nově zadaná hesla nesouhlasí</div>';
            }
        } elseif(empty($oldpassword && $newpassword && $verifypassword)) {
            $update = $user->update($username,$email);
            header("location: editProfile.php");
            
        }
    }
?>
<form action="" method="POST">
    <table>
        <tr><td><h3>Kontaktní informace</h3></td></tr>   
        <tr><td>Uživatelské jméno</td><td><input type="text" name="username" placeholder="" value="<?php echo $row['username'];?>"></input></td></tr>
        <tr><td>E-mail</td><td><input type="email" name="email" placeholder="" value="<?php echo $row['email'];?>"></input></td></tr>

        <tr><td><h3>Změna hesla</h3></td></tr>   
        <tr><td>Staré heslo</td><td><input type="password" name="oldpassword" placeholder="" value=""></input></td></tr>
        <tr><td>Nové heslo</td><td><input type="password" name="newpassword" placeholder="" value=""></input></td></tr>
        <tr><td>Potvrzení hesla</td><td><input type="password" name="verifypassword" placeholder="" value=""></input></td></tr>
        <tr><td><button class="btn" type="submit" name="save">Uložit</button></td></tr> 
    </table>
</form>
<?php include_once 'templates/footer.php'; ?>