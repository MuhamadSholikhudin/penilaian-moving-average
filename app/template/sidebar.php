        <?php 
            function Sub_menu_active($sub_menu){
                $string = $_SERVER['REQUEST_URI'];
                if (strpos($string, $sub_menu) !== false) {
                    return "active";
                } else {
                    return "";
                }
            }

            function Menu_active($menus){ //$menus array
                $string = $_SERVER['REQUEST_URI'];
                $result = "";
                for($x = 0 ; $x < count($menus); $x ++){
                    if (strpos($string, $menus[$x]) !== false) {
                        $result = "show";
                    }
                }
                return $result;
            }

            // Data sub menu pada menu 
            $access = ["pengguna"];
            $data_master = [ "siswa", "mapel", "guru"];
            $result = [ "presensi", "penilaian", "raport", "skbm"];

            // Hak Akses memiliku sub menu
            $hakakses = [
                1 => ["pengguna", "siswa", "mapel", "guru","presensi", "penilaian","raport", "skbm"],
                2 => ["siswa"],
                3 => ["mapel"]
            ];
        ?> 
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $url ?>/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-truck-pickup"></i>
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

            <li class="nav-item <?php if(Menu_active($access) == "show") { echo "active"; } ?> ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Akses</span>
                </a>
                <div id="collapseOne" class="collapse <?= Menu_active($access) ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Akses:</h6>
                        <?php for($sub = 0; $sub < count($access); $sub++){       
                            $check_role = array_search($access[$sub], $hakakses[$_SESSION['hakakses']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($access[$sub]) ?>" href="<?= $url ?>/app/<?= $access[$sub] ?>.php"><?= str_replace("_"," ", $access[$sub]); ?></a>
                        <?php  }
                        }   ?>
                    </div>
                </div>
            </li>

            <li class="nav-item <?php if(Menu_active($data_master) == "show") { echo "active"; } ?> ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-truck-monster"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse <?= Menu_active($data_master) ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data Master:</h6>
                        <?php for($sub = 0; $sub < count($data_master); $sub++){       
                            $check_role = array_search($data_master[$sub], $hakakses[$_SESSION['hakakses']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($data_master[$sub]) ?>" href="<?= $url ?>/app/<?= $data_master[$sub] ?>.php"><?= str_replace("_"," ", $data_master[$sub]); ?></a>
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
                        <h6 class="collapse-header">Custom Hasil:</h6>
                        <?php for($sub = 0; $sub < count($result); $sub++){       
                            $check_role = array_search($result[$sub], $hakakses[$_SESSION['hakakses']]); 
                            if ($check_role !== false) {                                          
                            ?>
                            <a class="collapse-item <?= Sub_menu_active($result[$sub]) ?>" href="<?= $url ?>/app/<?= $result[$sub] ?>.php"><?= str_replace("_"," ", $result[$sub]); ?></a>
                        <?php  }
                        }   ?>
                    </div>
                </div>
            </li>

            <?php 

            /* ?>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Buttons</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Colors</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Borders</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Animations</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Login</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Register</a>
                        <a class="collapse-item" href="<?= $url ?>/index.php">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="<?= $url ?>/index.php">404 Page</a>
                        <a class="collapse-item active" href="<?= $url ?>/index.php">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $url ?>/index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <?php */ ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->