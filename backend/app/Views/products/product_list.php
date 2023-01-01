    <?php echo view('layouts/header1.php') ?>

    <!-- Navbar -->
    <?php echo view('layouts/top_nav.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php echo view('layouts/main_sidebar.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                        <?php
                        if (session()->has('msg')) : ?>
                            <div class="alert alert-success"><?= session()->msg; ?></div>


                        <?php endif; ?>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Photo</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Product Price</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td><?= $product['id']; ?></td>
                                                <td class="text-center"><img src="<?= site_url() . $product['product_image']; ?>" width="150" height="100" alt="">
                                                <td><?= $product['product_name']; ?>
                                                </td>
                                                <td class="text-right"><?= $product['product_price']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url("products/edit/" . $product['id']) ?>" class="btn btn-info">Edit</a>
                                                    <a href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                    <a href="" class="btn btn-primary">Show</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Photo</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php echo view('layouts/footer1.php') ?>