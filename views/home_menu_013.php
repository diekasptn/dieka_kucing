<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 013</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
</head>
<body>
    <?php $this->load->view('headers'); ?>
    <div class="container">
        <hr>
        <div class="alert alert-info" role="alert">
            <h4>Welcome <?=$this->session->userdata('fullname')?>, you are login as <?=$this->session->userdata('usertype')?></h4>
        </div>
        <ul class="list-unstyled">
            <li class="list-group-item"><img src="<?=base_url('uploads/users/'.$this->session->userdata('photo'))?>" width="128" height="128" /></li>
            <li class="list-group-item"><a href="<?=site_url('auth013/changephoto')?>">Change Photo</a></li>
            <li class="list-group-item"><a href="<?=site_url('auth013/changepass')?>">Change Password</a></li>
            <li class="list-group-item"><a href="<?=site_url('auth013/logout')?>">Logout</a></li>
        </ul>
    </div>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>