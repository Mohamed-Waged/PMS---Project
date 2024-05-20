<?php 
    require_once __DIR__.'/../includes/header.php'; 
    require_once __DIR__.'/../../classes/Category.php';
    require_once __DIR__.'/../../classes/Session.php';
?>
<div class="col-8 mx-auto">
    <h1 class="text-center p-3 my-4 ">
        Edit Category
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
            Session::destroySession();
        endif;
    ?>

    <?php 
    if(isset($_GET['id'])){
        $categories = Category::getOneCategory($_GET['id']);

        if(!$categories){
            Session::setSession('errors', "Category Not Found !");
            redirect('dashboard/categories/index.php');
            die;
        }
    }
?>
    <form action="../controllers/categories/editCategoryController.php?id=<?php echo $categories['id']; ?>" class="form border p-3" method="POST">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="<?= $categories['name']?>"  class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Edit" class="form-control text-white bg-warning">
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>