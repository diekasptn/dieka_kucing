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
    <h3>CATEGORY LIST</h3>
    <a href="<?=base_url()?>"><h4>HOME</h4></a>
    <hr>
    <?=$this->session->flashdata('msg')?>
    <a href="<?=site_url('categories013/add')?>">Add new category</a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Description</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $i=1; foreach($categories013 as $category) { ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$category->category_name_013?></td>
            <td><?=$category->description_013?></td>
            <td><a href="<?=site_url('categories013/edit/'.$category->category_id_013)?>">Edit</a></td>
            <td><a href="<?=site_url('categories013/delete/'.$category->category_id_013)?>">Delete</a></td>
        </tr><?php } ?>
    </table>
</body>
</html>