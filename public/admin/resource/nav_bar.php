<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SB Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php
                $query = query("SELECT admin_name FROM admin WHERE admin_id = {$_SESSION['admin_id']};");
                confirm($query);
                $data = fetch_array($query);
                echo $data['admin_name'];
                ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li <?php if ($_SESSION['active_nav'] == 1) : ?> class="active" <?php endif; ?> >
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li<?php if ($_SESSION['active_nav'] == 2) : ?> class="active" <?php endif; ?> >
                <a href="products.php"><i class="fa fa-fw fa-bar-chart-o"></i> Voir Produits</a>
            </li>
            <li <?php if ($_SESSION['active_nav'] == 3) : ?> class="active" <?php endif; ?> >
                <a href="add_product.php"><i class="fa fa-fw fa-table"></i> Ajouter Produit</a>
            </li>
            <li <?php if ($_SESSION['active_nav'] == 4) : ?> class="active" <?php endif; ?> >
                <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> Categories</a>
            </li>
            <li <?php if ($_SESSION['active_nav'] == 5) : ?> class="active" <?php endif; ?> >
                <a href="users.php"><i class="fa fa-fw fa-wrench"></i>Users</a>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>