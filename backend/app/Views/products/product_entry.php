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
                    <h1>Product Entry System</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">New Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
    if (session()->has('errors')) {
        $errors = session()->errors;
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Entry Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?php echo site_url('products/create') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product name" name="product_name" value="<?php echo old('product_name') ?>">
                                    <span class="text-danger">
                                        <?php

                                        if (isset($errors['product_name'])) {
                                            echo $errors['product_name'];
                                        }
                                        ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Category</label>
                                    <select name="cat_name" class="form-control">
                                        <option value="">Select One</option>
                                        <?php foreach ($cats as $cat) : ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['cat_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger">
                                        <?php

                                        if (isset($errors['cat_name'])) {
                                            echo $errors['cat_name'];
                                        }
                                        ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Details</label>
                                    <textarea class="form-control" id="summernote" name="product_details"><?php echo old('product_details') ?></textarea>
                                    <span class="text-danger">
                                        <?php
                                        if (isset($errors['product_details'])) {
                                            echo $errors['product_details'];
                                        }
                                        ?></span>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Price</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" name="product_price" value="<?php echo old('product_price') ?>">
                                    <span class="text-danger">
                                        <?php
                                        if (isset($errors['product_price'])) {
                                            echo $errors['product_price'];
                                        }
                                        ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" name="product_image">
                                    <span class="text-danger">
                                        <?php
                                        if (isset($errors['product_image'])) {
                                            echo $errors['product_image'];
                                        }
                                        ?></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class=" card-footer">
                                <input type="submit" class="btn btn-primary" value="SUBMIT" />
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