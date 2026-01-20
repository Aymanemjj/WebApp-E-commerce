<?php
    if(isset($_SESSION['logged_in'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>


<h1>Login</h1>


<form class="row g-3" action="" method="post">
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="col-12">
        <button type="submit" value="login" class="btn btn-primary">login</button>
    </div>
</form>