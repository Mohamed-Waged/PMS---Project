<?php 
    require_once __DIR__. '/../includes/header.php'; 
    require_once __DIR__. '/../../classes/Session.php'; 
?>

<div class="col-8 mx-auto">
    <h1 class="text-center p-3 my-2 bg-dark text-light rounded">
        Add Category
    </h1>
    <?php if (Session::checkSession('success')) : ?>
        <div class="alert alert-success text-center" role="alert">
            <?= Session::getSession('success') ?>
        </div>
    <?php endif ?>

    <?php
        if (Session::checkSession('errors')) : 
            $errors = Session::getSession('errors');
            foreach ($errors as $key => $value) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $value ?>
                </div>
            <?php endforeach;
        endif;
    ?>


    <form action="<?= route('dashboard/controllers/categories/createCategoryController.php') ?>" class="form border p-3" method="POST">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Add" class="form-control text-white bg-success">
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>