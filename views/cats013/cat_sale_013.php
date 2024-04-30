<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 013</title>
</head>
<body>
    <h1>CATSHOP 013</h1>
    <h3>CAT SALE FORM</h3>
    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>Cat Id</td>
                <td>: <?=$cat->id_013?></td>
            </tr>
            <tr>
                <td>Cat Name</td>
                <td>: <?=$cat->name_013?></td>
            </tr>
            <tr>
                <td>Cat Type</td>
                <td>: <?=$cat->type_013?></td>
            </tr>
            <tr>
                <td>Cat Price</td>
                <td>: $<?=$cat->price_013?></td>
            </tr>
            <tr>
                <td>Customer Name</td>
                <td><input type="text" name="customer_name_013" /></td>
            </tr>
            <tr>
                <td>Customer Address</td>
                <td><input type="textarea" name="customer_address_013"></textarea></td>
            </tr>
            <tr>
                <td>Customer Phone</td>
                <td><input type="text" name="customer_phone_013" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" name="submit" value="SALE">
                <a href="<?=site_url('cats013')?>"><input type="button" value="CANCEL"></a></td>
            </tr>
        </table>
    </form>