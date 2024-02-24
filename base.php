<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
        <link rel="stylesheet" href="app/asset/css/<?= $cssName ?>">
        <title><?= $pageTitle ?? "Document" ?></title>
    </head>
    <body>
        <?php require_once "app/View/header.php";?>
        <?= $content ?>
    </body>
    <script type="text/javascript" src="app/asset/js/message.js"></script>
</html>