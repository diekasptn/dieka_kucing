<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <title>CATSHOP 013</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>CATSHOP 013</h1>
    <h3>LOGIN PAGE</h3>
    <hr>
    <?=$this->session->flashdata('msg')?>
    <div style="color: red;"><?=validation_errors()?></div>
    <form action="" method="post">
        <table>
            <tr>
                <td>USERNAME</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>
</html>

