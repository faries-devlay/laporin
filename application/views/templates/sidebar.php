<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <div class="pull-left image">
        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span>
    </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
        <a href="<?= base_url() ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="<?= base_url() ?>penjualan">
        <i class="fa fa-balance-scale"></i> <span>Penjualan</span>
        </a>
    </li>
    <li>
        <a href="<?= base_url() ?>supplier">
        <i class="fa fa-files-o"></i>
        <span>Supplier</span>
        </a>
    </li>
    <li>
        <a href="<?= base_url() ?>pembelian">
        <i class="fa fa-undo"></i> <span>Pembelian</span>
        </a>
    </li>
    <li>
        <a href="<?= base_url() ?>barang">
            <i class="fa fa-briefcase"></i><span>&nbsp;Barang</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-cubes"></i> <span>Master Barang</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?= base_url() ?>kategori"><i class="fa fa-tags"></i>&nbsp;Kategori</a>
            </li>
            <li>
                <a href="<?= base_url() ?>satuan"><i class="fa fa-file-archive-o"></i>&nbsp;Satuan</a>
            </li>
        </ul>
    </li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>