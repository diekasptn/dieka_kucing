<!-- views/header.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CATSHOP 013</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('cats013')?>">Manage Cats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('categories013')?>">Manage Categories</a>
            </li>
            <?php if ($this->session->userdata('usertype')=='Manager') { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('users013')?>">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('cats013/sales')?>">Sales Report</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
