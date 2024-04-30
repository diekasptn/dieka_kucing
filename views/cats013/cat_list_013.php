<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 013</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <style>
        .action-buttons a {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php $this->load->view('headers'); ?>
    <div class="container mt-5">
        <h3>CATS LIST</h3>
        <hr>
        <?=$this->session->flashdata('msg')?>
        <a href="<?=site_url('cats013/add')?>" class="btn btn-primary mb-3">Add new cat</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Gender</th>
                    <th>Age (month)</th>
                    <th>Price($)</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cats as $cat) { ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$cat->name_013?></td>
                    <td><?=$cat->type_013?></td>
                    <td><?=$cat->gender_013?></td>
                    <td><?=$cat->age_013?></td>
                    <td><?=$cat->price_013?></td>
                    <td class="action-buttons">
                        <a href="<?=site_url('cats013/edit/'.$cat->id_013)?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="<?=site_url('cats013/delete/'.$cat->id_013)?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        <?php if($cat->sold_013==1) echo '<span class="badge badge-secondary">SOLD</span>'; else { ?><a href="<?=site_url('cats013/sale/'.$cat->id_013)?>" class="btn btn-sm btn-success">SALE</a><?php } ?>
                    </td>
                </tr><?php } ?>
            </tbody>
        </table>
        <p><?=$this->pagination->create_links();?></p>
    </div>
</body>
</html>