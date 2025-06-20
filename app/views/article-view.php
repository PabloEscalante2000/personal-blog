<?php

    $id = $url[1];

    $ruta = __DIR__."/../../DB/blogs/".$id."-blog.json";
    if(!file_exists($ruta)){
        echo "<div class='m-auto py-5'>Artículo no encontrado</div>";
        exit;
    } 

    $data = file_get_contents(__DIR__."/../../DB/blogs/".$id."-blog.json");
    $data = json_decode($data,true);

?>
<div class="py-5 bg-blue-500 text-white w-full">
    <div class="w-full max-w-[1000px] mx-auto px-5 flex justify-between items-center">
        <h1 class="text-4xl font-bold">
            Personal Blog
        </h1>
    </div>
</div>
<div class="max-w-[1000px] w-full p-5 mx-auto space-y-5">
    <h1 class="font-bold text-2xl"><?= $data["title"] ?></h1>
    <p class="text-lg opacity-90"><?= $data["date"] ?></p>
    <p class="text-xl whitespace-pre-line break-all"><?= $data["content"] ?></p>
</div>
