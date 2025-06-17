<?php
    $data = file_get_contents(__DIR__."/../../DB/data.json");
    $data = json_decode($data,true);
    $blogs = $data["blogs"];

    if(isset($_POST["id"])){
        $new_blogs = array_values(array_filter(
            $blogs,
            callback:function($blog){
                return $blog["id"] !== $_POST["id"];
            }
        ));

        if(count($new_blogs) !== count($blogs)){

            $res = ["blogs" => $new_blogs];
            file_put_contents(__DIR__."/../../DB/data.json",json_encode($res,JSON_PRETTY_PRINT));

            $archivo = __DIR__."/../../DB/blogs/".$_POST["id"]."-blog.json";

            if(file_exists($archivo)){
                if(unlink($archivo)){
                    $alert = [
                        "solution" => true
                    ];
                } else {
                    $alert = [
                        "solution" => false,
                        "text" => "Cannot delete file"
                    ];
                }
            } else {
                $alert = [
                    "solution" => false,
                    "text" => "File not found"
                ];
            }

        } else {
            $alert = [
            "solution" => false,
            "text" => "¡Hubo un error, id equivocado!"
        ];
        }
    } else {
        $alert = [
            "solution" => false,
            "text" => "¡Hubo un error, datos no encontrados!"
        ];
    }

    echo json_encode($alert)
?>