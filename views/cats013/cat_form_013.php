<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 013</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
</head>
<body>
    <h1>CATSHOP 013</h1>
    <h3>CAT FORM</h3>
    <hr>
    <?php
    $name='';
    $type='';
    $gender='';
    $age='';
    $price='';

    if(isset($cat)) {
        $name=$cat->name_013;
        $type=$cat->type_013;
        $gender=$cat->gender_013;
        $age=$cat->age_013;
        $price=$cat->price_013;
    }
    ?>
    <form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name_013" value="<?=$name?>" required></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><select name="type_013" required>
                <option value="">Choose type</option>
                <?php foreach($category as $cate) { ?>
                <option value="<?=$cate->category_name_013?>" <?=set_select('type_013',$cate->category_name_013,$type==$cate->category_name_013?TRUE:
                FALSE)?>><?=$cate->category_name_013?></option>
                <?php } ?><!--
                <option value="Domestic" <?=$type=='Domestic'?'selected':''?>>Domestic</option>
                <option value="Angora" <?=$type=='Angora'?'selected':''?>>Angora</option>
                <option value="Persia" <?=$type=='Persia'?'selected':''?>>Persia</option>-->
                </select>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
            <input type="radio" name="gender_013" value="Male" <?=$gender=='Male'?'checked':''?> required>Male
            <input type="radio" name="gender_013" value="Female" <?=$gender=='Female'?'checked':''?> required>Female
            </td>
        </tr>
        <tr>
            <td>Age (month)</td>
            <td><input type="number" name="age_013" value="<?=$age?>" required></td>
        </tr>
        <tr>
            <td>Price ($)</td>
            <td><input type="number" name="price_013" value="<?=$price?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="SAVE" name="submit">
            <a href="<?=site_url('cats013')?>"><input type="button" value="CANCEL"></a>
            </td>
        </tr>
    </table>  
    </form>  
</body>
</html>