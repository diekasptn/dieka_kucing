<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 013</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }
        h1, h3 {
            font-weight: bold;
            color: #333;
            padding: 10px;
        }
        h4 {
            font-size: 18px;
            color: #fff;
            background-color: #337ab7;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        h4:hover {
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #337ab7;
            color: #fff;
        }
        td a {
            color: #337ab7;
            text-decoration: none;
            margin-right: 10px;
        }
        td a:hover {
            text-decoration: underline;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            color: #337ab7;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
        }
        .pagination a:hover {
            background-color: #337ab7;
            color: #fff;
        }
        .pagination .active a {
            background-color: #337ab7;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <center>
                <h1>CATSHOP 013</h1>
                <h3>CATS LIST</h3>
                <?=$this->session->flashdata('msg')?>
    </center>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
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
                            <td><img src="<?=base_url('uploads/cats/'.$cat->photo_cats_013)?>" style="border-radius:50%;" width="60" height="60"/>
                            <a class="nav-link" href="<?=site_url('Cats013/changephoto/'.$cat->id_013)?>">Change Photo</a></td>
                            <td><?=$cat->name_013?></td>
                            <td><?=$cat->type_013?></td>
                            <td><?=$cat->gender_013?></td>
                            <td><?=$cat->age_013?></td>
                            <td><?=$cat->price_013?></td>
                            <td><a href="<?=site_url('cats013/edit/'.$cat->id_013)?>" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="<?=site_url('cats013/delete/'.$cat->id_013)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a></td>
                            <td><?php if($cat->sold_013==1) echo 'SOLD'; else { ?><a href="<?=site_url('cats013/sale/'.$cat->id_013)?>" class="btn btn-success btn-sm">SALE</a><?php } ?></td>
                        </tr><?php } ?>
                    </tbody>
                </table>
                <center>
                <a href="<?=site_url('cats013/add')?>" class="btn btn-success mb-3">Add new cat</a>
                <a href="<?=base_url()?>" class="btn btn-primary mb-3">HOME</a></center>
                <p class="text-center"><?=$this->pagination->create_links();?></p>
            </div>
        </div>
    </div>
</body>
</html>
