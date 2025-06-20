<?php
    $local = strpos($_SERVER['HTTP_HOST'],'localhost') !== false;
    define("BASE_URL", $local ? "/personal-blog/" : "/");
    
    if(isset($_GET['views'])){
        $url=explode("/", $_GET['views']);
    }else{
        $url=["home"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Personal Blog</title>
</head>
<body>
    <?php
    
    $vista = $url[0];

    if($vista === "home" || $vista === "article"){
        require_once(__DIR__."/app/views/".$vista."-view.php");
    } else if($vista === "admin" || $vista === "edit" || $vista === "new") {
        require_once(__DIR__."/app/security/security.php");
    } else {
        require_once(__DIR__."/app/views/404-view.php");
    }

    ?>
</body>
<script src="<?= BASE_URL ?>app/js/ajax.js"></script>
</html>