<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Details</th>
            <th>Product Price</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['product_details'] ?></td>
                <td><?= $product['product_price'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="pagination justify-content-end">
        <?php if ($pager) : ?>
            <?php $pagi_path = 'index.php/test/list'; ?>
            <?php $pager->setPath($pagi_path); ?>
            <?php $pages = explode(' ', $pager->links());
            print_r($pages);
            ?>
        <?php endif ?>
    </div>

</body>

</html>