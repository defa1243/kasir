
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link">
        <span class="brand-text text-primary text-bold">現金係Sero</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="row">
                <div class="image">
                    <img src="assets/dist/img/logo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="javascript:void(0)" class="d-block">Ninko</a>
                </div>
            </div>
            <div class="row">

                <div class="info" id="wallet">
                    
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php?page=transaction"
                        class="nav-link <?php if ($_GET['page']=='transaction'){echo "active";} ?>">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=absent"
                        class="nav-link <?php if ($_GET['page']=='absent'){echo "active";} ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Absent
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=menu" class="nav-link <?php if ($_GET['page']=='menu'){echo "active";} ?>">
                        <i class="nav-icon fas fa-beer"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=category"
                        class="nav-link <?php if ($_GET['page']=='category'){echo "active";} ?>">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=variation"
                        class="nav-link <?php if ($_GET['page']=='variation'){echo "active";} ?>">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Variation
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=employee"
                        class="nav-link <?php if ($_GET['page']=='employee'){echo "active";} ?>">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Employee
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=daily-report"
                        class="nav-link <?php if ($_GET['page']=='daily-report'){echo "active";} ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Daily Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=expense-report"
                        class="nav-link <?php if ($_GET['page']=='expense-report'){echo "active";} ?>">
                        <i class="nav-icon fas fa-file-export"></i>
                        <p>
                            Expense Report
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>