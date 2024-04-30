<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER 013</title>
</head>
<body>
    <h1>USER 013</h1>
    <h3>USER FORM</h3>
    <hr>
    <?php
    $username='';
    $password='';
    $usertype='';
    $fullname='';

    if(isset($user)) {
        $username=$user->username_013;
        $password=$user->password_013;
        $usertype=$user->usertype_013;
        $fullname=$user->fullname_013;
    }
    ?>
    <form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username_013" value="<?=$username?>" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password_013" value="<?=$password?>" required></td>
        </tr>
        <tr>
            <td>Usertype</td>
            <td>
            <input type="radio" name="usertype_013" value="Manager" <?=$usertype=='Manager'?'checked':''?> required>Manager
            <input type="radio" name="usertype_013" value="Cashier" <?=$usertype=='Cashier'?'checked':''?> required>Cashier
            </td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td><input type="text" name="fullname_013" value="<?=$fullname?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="SAVE" name="submit">
            <a href="<?=site_url('users013')?>"><input type="button" value="CANCEL"></a>
            </td>
        </tr>
    </table>  
    </form>  
</body>
</html>