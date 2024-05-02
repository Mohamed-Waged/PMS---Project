<?php include('../includes/header.php'); ?>
<div class="col-8 mx-auto">
    <h1 class="text-center p-3 my-2">
        Login
    </h1>
    <form action="" class="form border p-3" method="POST">
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password"  class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Login" class="form-control text-white bg-primary">
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>