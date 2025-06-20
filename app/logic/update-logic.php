<?php

    require(__DIR__."/../other/isdate.php");

    if(isset($_POST["article_id"]) && isset($_POST["article_title"]) && isset($_POST["article_date"]) && isset($_POST["article_content"])){
        if( trim($_POST["article_title"]) !== "" &&  trim($_POST["article_content"]) && isdate($_POST["article_date"])){

            $id = $_POST["article_id"];
            $title = $_POST["article_title"];
            $date = $_POST["article_date"];
            $content = $_POST["article_content"];

            $datos = [
                "id" => $id,
                "title" => $title,
                "date" => $date,
                "content" => $content
            ];

            // ? Obtener datos de data.json

            $json = file_get_contents(__DIR__."/../../DB/data.json");
            $data = json_decode($json,true);
            $blogs = $data["blogs"];

            // * Ruta del blog 
            $ruta = __DIR__."/../../DB/blogs/".$id."-blog.json";

            if(file_exists($ruta)){
                // * Actualizar archivo data.json
                foreach($blogs as &$blog){
                    if($blog["id"] === $id){
                        $blog["title"] = $title;
                        $blog["date"] = $date;
                        $blog["content"] = $content;
                    }
                }

                // * Respuesta a actualizar en data.json
                $res = ["blogs" => $blogs];

                file_put_contents(__DIR__."/../../DB/data.json",json_encode($res,JSON_PRETTY_PRINT));

                // * Actualizar archivo del blog
                file_put_contents($ruta,json_encode($datos,JSON_PRETTY_PRINT));

                $alert = [
                    "solution" => true,
                    "type" => "update"
                ];

            } else {
                $alert = [
                    "solution" => false,
                    "text" => "¡No se encontró el archivo!"
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