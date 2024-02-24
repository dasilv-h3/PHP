<div class="container mt-7 d-flex flex-column justify-content-center align-items-center">
    <div class="mx-auto d-flex flex-column align-items-center">
        <h2>Modifier Profile</h2>
        <div class="container d-flex justify-content-center flex-wrap">
            <form class="gap-3" action="/modify_profile" method="post">
                <div class="input-group mb-3">
                    <label for="username" class="input-group-text">Username:</label>
                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $user["username"] ?>">
                </div>
                <div class="input-group mb-3">
                    <label for="email" class="input-group-text">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $user["email"] ?>">
                </div>
                <div class="mt-3 d-flex align-items-center gap-3">
                    <label for="">Supprimer le compte:</label>
                    <a type="button" class="btn btn-danger" href="/delete_profile">Supprimer</a>
                </div>
                <div class="register_form_item mt-3 btn_submit d-flex justify-content-evenly align-items-center">
                    <a href="/profile">Retour</a>
                    <button type="submit" name="submit" value="modify_profile" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="message" class="alert alert-success message" role="alert">
            <?php echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
            ?>
            </div>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div id="message" class="alert alert-danger message" role="alert">
            <?php echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            ?>
            </div>
        <?php endif ?>
    </div>
</div>
