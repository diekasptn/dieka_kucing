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
    <h3>SALE LIST</h3>
    <a href="<?=base_url()?>"><h4>HOME</h4></a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Sale ID</th>
            <th>Sale Date</th>
            <th>Cat ID</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Phone</th>
        </tr>
        <?php $i=1; foreach($sales as $sale) { ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$sale->sale_id_013?></td>
            <td><?=$sale->sale_date_013?></td>
            <td><?=$sale->cat_id_013?></td>
            <td><?=$sale->customer_name_013?></td>
            <td><?=$sale->customer_address_013?></td>
            <td><?=$sale->customer_phone_013?></td>
        </tr><?php } ?>
    </table>
</body>
</html>