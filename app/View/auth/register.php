<div class="container mt-7 p-5 d-flex flex-column justify-content-center align-items-center">
    <form action="/register" method="POST">
        <h4 class="text-center">Register</h4>
        <div class="mb-3 mt-5">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 btn_submit d-flex justify-content-evenly align-items-center">
            <a href="/">Retour</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger message" role="alert">
                <?php echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);?>
            </div>
        <?php endif ?>
    </form>
</div>