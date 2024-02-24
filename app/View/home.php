<div class="container mt-7 p-5 d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid d-flex justify-content-evenly">
        <div>
            <p><a href="/add_img">Ajouter une image</a></p>
        </div>
        <div>
            <p><a href="/list_img">Liste des images</a></p>
        </div>
    </div>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="message" class="alert alert-success message" role="alert">
        <?php echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        ?>
        </div>
    <?php endif ?>
</div>