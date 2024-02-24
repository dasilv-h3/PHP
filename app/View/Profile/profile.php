
<div class="container mt-7 d-flex flex-column justify-content-center align-items-center">
    <div class="mx-auto d-flex flex-column align-items-center">
        <h2>Profile</h2>
        <div class="container d-flex flex-column align-items-start gap-3">
            <div>
                <label for="">Username:</label>
                <input type="text" readonly="readonly" name="" id="" value="<?php echo $userProfile["username"] ?>">
            </div>
            <div>
                <label for="">Email:</label>
                <input type="email" readonly="readonly" name="" id="" value="<?php echo $userProfile["email"] ?>">
            </div>
        </div>
        <div class="register_form_item mt-3 btn_submit d-flex justify-content-evenly align-items-center">
            <a href="/home">Retour</a>
            <a class="btn btn-primary" href="/modify_profile">Modifier</a>
        </div>
    </div>
</div>