
<div class="container mt-7 d-flex flex-column justify-content-center align-items-center">
    <div class="mx-auto d-flex flex-column align-items-center">
        <h2>Vos images</h2>
        <div class="container d-flex justify-content-center flex-wrap gap-3">
        <?php 
        if(isset($allImages)) {
            foreach ($allImages as $element): 
                $imageData = $element['bin'];
                $imageBase64 = base64_encode($imageData);
                echo "<img class='img_size' src='data:image/jpeg;base64," . $imageBase64 . "' />";
            endforeach;
        } else {
            echo "<p>Vous n'avez pas d'images</p>";
        }
        ?>
        </div>
        <a href="/home">Retour</a>
    </div>
</div>
<script type="text/javascript" src="app/asset/js/add-img.js"></script>