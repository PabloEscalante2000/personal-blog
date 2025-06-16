<?php

    require(__DIR__."/../other/isdate.php");

    if(isset($_POST["article_title"]) && isset($_POST["article_date"]) && isset($_POST["article_content"])){
        if( trim($_POST["article_title"]) !== "" &&  trim($_POST["article_content"]) && isdate($_POST["article_date"])){

            $id = uniqid();
            $title = $_POST["article_title"];
            $date = $_POST["article_date"];
            $content = $_POST["article_content"];

            $datos = [
                "id" => $id,
                "title" => $title,
                "date" => $date,
                "content" => $content
            ];

            $json = json_encode($datos, JSON_PRETTY_PRINT);

            $ruta = __DIR__."/../../DB/blogs/".$id."-blog.json";

            if(file_put_contents($ruta,$json)){
                $alert = [
                    "solution" => true,
                    "type" => "create"
                ];
            } else {
                $alert = [
                    "solution" => false,
                    "text" => "¡No se pudo crear el archivo!"
                ];
            }

        } else {
            $alert = [
            "solution" => false,
            "text" => "¡Hubo un error, los datos no cumplen con los requisitos!"
        ];
        }
    } else {
        $alert = [
            "solution" => false,
            "text" => "¡Hubo un error, no estan los datos completos!"
        ];
    }

    echo json_encode($alert)
?>