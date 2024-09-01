<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Moving Average Page</h1>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success !</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>

    <?php
        // $string = str_replace("/penilaian-moving-average/app/", "", $_SERVER['REQUEST_URI']); 
        // echo $string;
        // echo "</br>";
        // $estr = explode(".php", $string);
        // echo $estr[0];
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">                
                Data Kelas  semester
            </h6>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Periode</th>
                        <th>Lihat</th>
                        <!-- <th>AKSI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*
                    foreach (QueryManyData("SELECT * FROM mapel ") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["nm_mapel"] ?></td>
                            <td>
                                <?php
                                $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $row['id_periode'] . " ")->fetch_assoc();
                                ?>
                                <?= $periode["nm_periode"] ?>
                            </td>
                            <td>
                            <a href="<?= $url ?>/app/nilai_semester_show.php?id_mapel=<?= $row["id_mapel"] ?>" class="btn btn-info btn-sm ">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </td>
                            <td>
                                <!--
                                <a href="<?= $url ?>/app/mapel_edit.php?id_mapel=<?= $row["id_mapel"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                -->
                                <button onclick="ConfirmDelete(<?= $row['id_mapel'] ?>)" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    */
                    ?>
                    <?php
                    foreach (QueryManyData("SELECT * FROM kelas ") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["kelas"] ?></td>
                            <td>                                
                                <?= $row["nm_kelas"] ?>
                            </td>
                            <td>
                                <a href="<?= $url ?>/app/nilai_semester_kelas.php?kelas=<?= $row["kelas"] ?>" class="btn btn-info btn-sm ">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </td>
                            <!--
                            <td>
                                <a href="<?= $url ?>/app/mapel_edit.php?id_mapel=<?= $row["kelas"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a> 
                            </td>
                            -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/app/aksi/mapel.php?id_mapel=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>