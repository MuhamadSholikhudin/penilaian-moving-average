        <?php 
            // Data sub menu pada menu 
            $access = ["user"];
            $data_master = [ "siswa", "mapel", "guru","periode", "kelas", "ekstra","kehadiran_siswa" ];
            $result = [ "jadwal_siswa", "ekstra_siswa", "nilai_mapel","nilai_ekstra","nilai_semester","moving_average", "rapot", ];

            // Hak Akses memiliku sub menu
            $level = [
                'wakasiswa' => ["user", "siswa", "mapel", "guru","periode", "kelas", "ekstra", "jadwal_siswa", "ekstra_siswa", "nilai_mapel", "nilai_ekstra", "nilai_semester","moving_average", "rapot", "kehadiran_siswa"],
                'guru' => ["siswa", "mapel", "nilai_mapel", "nilai_ekstra", "nilai_semester","moving_average", "rapot", "kehadiran_siswa"],
                
            ];
        ?> 
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $url ?>/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SI Penilaian Siswa </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= Sub_menu_active("dashboard") ?>">
                <a class="nav-link" href="<?= $url ?>/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface 
            </div>
        <?php if($_SESSION['level'] == 'wakasiswa'){ ?>
            <li class="nav-item <?php if(Menu_active($access) == "show") { echo "active"; } ?> ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-user-lock"></i>
                    <span>Akses</span>
                </a>
                <div id="collapseOne" class="collapse <?= Menu_active($access) ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Akses:</h6> -->
                        <?php for($sub = 0; $sub < count($access); $sub++){       
                            $check_role = array_search($access[$sub], $level[$_SESSION['level']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($access[$sub]) ?>" href="<?= $url ?>/app/<?= $access[$sub] ?>/<?= $access[$sub] ?>.php"><?= ucfirst(str_replace("_"," ", $access[$sub])); ?></a>
                        <?php  }
                        }   ?>
                    </div>
                </div>
            </li>
            <?php } ?>

            <li class="nav-item <?php if(Menu_active($data_master) == "show") { echo "active"; } ?> ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse <?= Menu_active($data_master) ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Data Master:</h6> -->
                        <?php for($sub = 0; $sub < count($data_master); $sub++){       
                            $check_role = array_search($data_master[$sub], $level[$_SESSION['level']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($data_master[$sub]) ?>" href="<?= $url ?>/app/<?= $data_master[$sub] ?>/<?= $data_master[$sub] ?>.php"><?= ucfirst(str_replace("_"," ", $data_master[$sub])); ?></a>
                        <?php  }
                        }   ?>
                    </div>
                </div>
            </li>

            <li class="nav-item <?php if(Menu_active($result) == "show") { echo "active"; } ?> ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Hasil</span>
                </a>
                <div id="collapseThree" class="collapse <?= Menu_active($result) ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Hasil:</h6> -->
                        <?php for($sub = 0; $sub < count($result); $sub++){       
                            $check_role = array_search($result[$sub], $level[$_SESSION['level']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($result[$sub]) ?>" href="<?= $url ?>/app/<?= $result[$sub] ?>/<?= $result[$sub] ?>.php"><?= ucfirst(str_replace("_"," ", $result[$sub])) ; ?></a>
                        <?php  }
                        }   ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->