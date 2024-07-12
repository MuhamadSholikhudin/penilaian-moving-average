<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perbandingan Page</h1>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success !</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['message']);} ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/perbandingan_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Perbandingan
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>SUB KRITERIA</th>
                        <th>SUB KRITERIA</th>
                        <th>NILAI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (  QueryManyData('SELECT * FROM perbandingan ')  as $row ) { ?>
                        <tr>
                            <td>
                            <?php
                                $sub_kriteria1 = QueryOnedata('SELECT * FROM sub_kriteria WHERE id_sub_kriteria = '.$row['sub_kriteria1'] .' ')->fetch_assoc();
                                echo $sub_kriteria1['sub_kriteria'];
                            ?>
                            </td>  
                            <td>
                            <?php
                                $sub_kriteria2 = QueryOnedata('SELECT * FROM sub_kriteria WHERE id_sub_kriteria = '.$row['sub_kriteria2'] .' ')->fetch_assoc();
                                echo $sub_kriteria2['sub_kriteria'];
                            ?>
                            </td>                            
                            <td><?= $row['nilai'] ?></td>
                            <td><a href="<?= $url ?>/app/perbandingan_edit.php?id_perbandingan=<?= $row['id_perbandingan'] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row[
                                    'id_perbandingan'
                                ] ?>)" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/app/aksi/perbandingan.php?id_perbandingan="+id+"&action=delete";
            } 
        }
    </script>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>
