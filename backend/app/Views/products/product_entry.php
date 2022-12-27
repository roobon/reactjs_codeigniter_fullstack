<?php echo view('layouts/header.php') ?>

<!-- Navbar -->
<?php echo view('layouts/top_nav.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php echo view('layouts/main_sidebar.php') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Entry Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-2">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Entry Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url('products/create') ?>">
                            <div class="card-body">
                                <?php
                                if (isset($validation)) {
                                    $errors = $validation->getErrors();
                                    if (count($errors) > 0) {
                                        echo "<ul>";
                                        foreach ($errors as $err) {
                                            echo "<li>$err</li>";
                                        }
                                        echo "</ul>";
                                    }
                                }
                                ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product name" name="product_name" value="<?php echo set_value('product_name') ?>">
                                    <span class="text-danger"><?php

                                                                if (isset($validation)) {
                                                                    $error = $validation->getError('product_name');
                                                                    echo $error;
                                                                }
                                                                ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Details</label>
                                    <textarea class="form-control" id="summernote" name="product_details"><?php echo set_value('product_details') ?></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Price</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" name="product_price" value="<?php echo set_value('product_price') ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class=" card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->






                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php echo view('layouts/footer.php') ?>