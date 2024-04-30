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
    <h3>USER LIST</h3>
    <a href="<?=base_url()?>"><h4>HOME</h4></a>
    <hr>
    <?=$this->session->flashdata('msg')?>
    <a href="<?=site_url('users013/add')?>">Add new user</a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Usertype</th>
            <th>Fullname</th>
            <th colspan="3">Action</th>
        </tr>
        <?php $i=1; foreach($users as $user) { ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$user->username_013?></td>
            <td><?=$user->usertype_013?></td>
            <td><?=$user->fullname_013?></td>
            <td><a href="<?=site_url('users013/edit/'.$user->userid_013)?>">Edit</a></td>
            <td><a href="<?=site_url('users013/delete/'.$user->userid_013)?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            <td><a href="<?=site_url('users013/reset/'.$user->userid_013)?>" onclick="return confirm('Are you sure?')">Reset Password</a></td>
        </tr><?php } ?>
    </table>
</body>
</html>