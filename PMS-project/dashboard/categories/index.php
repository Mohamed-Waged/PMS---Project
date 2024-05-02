<?php
    require_once __DIR__.'/../includes/header.php' ;
    require_once __DIR__.'/../../classes/Category.php' ;
    require_once __DIR__.'/../../classes/Session.php' ;
    $categories = Category::getAllCategories();
?>
<div class="col-12">
    <h1 class="text-center p-3 my-4 bg-info rounded">
        All Categories
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
    <?php if (empty($categories)) : ?>
        <div class="alert alert-danger text-center" role="alert">
            No Categories Found!
        </div>
    <?php else : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $category['id'] ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="../controllers/categories/deleteCategoryController.php?id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php  require_once __DIR__.'/../includes/footer.php'; ?>