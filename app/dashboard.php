<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
        $string = str_replace("/penilaian-moving-average/app/", "", $_SERVER['REQUEST_URI']);
        echo $string."<br>";
        $expl = explode("/", $string);
        echo $expl[0]."<br>";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Page</h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?= $url ?>/app/user.php">Data User</a>
                                </div>
                            <?php
                            $user = QueryOnedata("SELECT COUNT(*) as jumlah FROM user ")->fetch_assoc();
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user['jumlah'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>

</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>