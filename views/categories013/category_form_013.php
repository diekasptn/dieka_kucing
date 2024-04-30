<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY 013</title>
</head>
<body>
    <h1>CATEGORY 013</h1>
    <h3>CATEGORY FORM</h3>
    <hr>
    <?php
    $name='';
    $description='';

    if(isset($category)) {
        $name=$category->category_name_013;
        $description=$category->description_013;
    }
    ?>
    <form action="" method="post">
    <table>
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="category_name_013" value="<?=$name?>" required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description_013" rows="7" cols="30" required><?=$description?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="SAVE" name="submit">
            <a href="<?=site_url('categories013')?>"><input type="button" value="CANCEL"></a>
            </td>
        </tr>
    </table>  
    </form>  
</body>
</html>