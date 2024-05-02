<?php 
    require_once __DIR__.'/../includes/header.php' ;
    require_once __DIR__.'/../../classes/Product.php' ;
    require_once __DIR__.'/../../classes/Session.php' ;
    $products = Product::getAllProducts(); 
?>
<div class="col-12">
    <h1 class="text-center p-3 my-4 bg-info rounded">
        All Products
    </h1>
    
    <?php if (Session::checkSession('success')) : ?>
        <div class="alert alert-success text-center" role="alert">
            <?= Session::getSession('success') ?>
        </div>
    <?php endif ?>

    <?php if (Session::checkSession('errors')) : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= Session::getSession('errors') ?>
        </div>
    <?php endif ?>

    <?php if (empty($products)) : ?>
        <div class="alert alert-danger text-center" role="alert">
            No Products Found !
        </div>
    <?php else : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td><?= $product['price'] ?> $</td>
                        <td><?= $product['description'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="../controllers/products/deleteProductController.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php require_once __DIR__.'/../includes/footer.php' ; ?>