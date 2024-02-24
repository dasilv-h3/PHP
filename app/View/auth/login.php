<div class="container mt-7 p-5 d-flex flex-column justify-content-center align-items-center">
    <form action="/login" method="POST" class="mx-auto">
        <h4 class="text-center">Login</h4>
        <div class="mb-3 mt-5">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="register_form_item mb-3 btn_submit d-flex justify-content-evenly align-items-center">
            <a href="/">Retour</a>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="message" class="alert alert-success message" role="alert">
            <?php echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
            ?>
            </div>
        <?php elseif (isset($_SESSION['warning_message'])): ?>
            <div id="message" class="alert alert-warning message" role="alert">
            <?php echo $_SESSION['warning_message'];
                unset($_SESSION['warning_message']);
            ?>
            </div>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div id="message" class="alert alert-danger message" role="alert">
            <?php echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            ?>
            </div>
        <?php endif ?>
        <!-- <?php var_dump($_SESSION) ?> -->
    </form>
</div>
