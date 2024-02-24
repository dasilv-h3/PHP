<div class="container mt-7 d-flex flex-column justify-content-center align-items-center">
    <div class="mx-auto">
        <h2>Ajouter une image</h2>
        <form action="/add_img" method="POST" enctype="multipart/form-data">
            <div class="preview mb-3">
                <img src="" alt="" id="input_img-preview">
            </div>
            <div class="mb-3 btn_choose">
                <a class="btn btn-secondary"  onclick="document.getElementById('image').click();">Choisir un fichier</a>
                <input type="file" accept="image/*" name="image" id="image" onchange="showPreview(event);" hidden>
            </div>
            <div class="register_form_item mb-3 btn_submit d-flex justify-content-evenly align-items-center">
                <a href="/home">Retour</a>
                <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
            </div>
            <?php 
                if (isset($message) && !empty($message)):
                    echo "<p class='text-center'>$message</p>";
                endif;
            ?>
        </form>
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
<script type="text/javascript" src="app/asset/js/add-img.js"></script>